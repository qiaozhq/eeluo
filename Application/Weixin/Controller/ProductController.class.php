<?php
namespace Weixin\Controller;
use Think\Controller;
use Think\Exception;
/*
**超值购物
*/
class ProductController extends Controller {
    public function __construct() {
        parent::__construct();
    }    

    public function index() {    
        $productCats = D("ProductCat")->getHomeProductCats();
        $products = D("Product")->getHomeProducts();  
        $rxproducts = D("Product")->getHomeRxProducts();   
        $this->assign('result', array(
            'productCats' => $productCats,
            'products' => $products,
            'rxproducts' => $rxproducts,
        )); 
        $this->display("Product/index");
    }

    //商品明细
    public function detail(){
        $id = $_GET['id'];
        $product = D("Product")->find($id); 
        $thumbsubs=explode('##',$product['thumbsub']); 
        $this->assign('thumbsubs',$thumbsubs);         
        $this->assign('product',$product);  
        $this->display();
    }

    //将商品放入购物车
    public function addToCart(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        //判断是不是代理商，取出对应的价格
        // $product = D("Product")->find($id); 
        // if($_SESSION['userweixin']['level']=='D'){
        //     $price = $product['member_price'];
        // }else{
        //     $price = $product['product_price'];
        // }
        $price = $_POST['price'];  
        $amount = $_POST['amount'];
        $thumb = $_POST['thumb'];      
        if(!trim($amount)) {
            return show(0,'产品数量不能为空');
        }
        //购物车是空的，第一次点击添加购物车
        if(!isset($_SESSION["gwc"]) || empty($_SESSION["gwc"]))
        {
             $arr = array(
                array("user_id"=>$_SESSION["userweixin"]['user_id'],"product_id"=>$id,"product_name"=>$name,"buy_price"=>$price,"buy_amount"=>$amount,"thumb"=>$thumb)
             );
             $_SESSION["gwc"]=$arr;
        }else{
            //购物车不是空的，判断购物车中是否存在该商品
            $arr = $_SESSION["gwc"]; //先存一下
            $chuxian = false;
            foreach($arr as $v)
            {
                if($v['product_id']==$id)
                {
                    $chuxian = true;
                }
            }
            if($chuxian)//如果购物车中有该商品
            {
                for($i=0;$i<count($arr);$i++)
                {
                    if($arr[$i]['product_id']==$id)
                    {
                      $arr[$i]['buy_amount']+=$amount;//数量累加
                    }
                }
                //重设购物车缓存
                $_SESSION["gwc"] = $arr;
            }else{//如果购物车中没有该商品
                //重设购物车缓存
                $_SESSION["gwc"][] = array("user_id"=>$_SESSION["userweixin"]['user_id'],"product_id"=>$id,"product_name"=>$name,"buy_price"=>$price,"buy_amount"=>$amount,"thumb"=>$thumb);
            }
        }
        return show(1,'放入购物车成功');        
    }

    //查看购物车
    public function cartDetail(){
        $cartProducts = $_SESSION["gwc"];
        $this->assign('cartProducts',$cartProducts);  
        $this->display("Product/cart");
    }

    //查看订单
    public function orderDetail(){
        $id = $_SESSION["userweixin"]["user_id"];
        $orderdtl = D("Order")->find($id); 
        $order = D("Order")->findorder($id); 
        $this->assign('orderdtl',$orderdtl);  
        $this->assign('order',$order);          
        $this->display("Product/order");
    }  

    //删除购物车中一个商品
    public function delOnProduct(){
        $id = $_GET['id'];
        $arr = $_SESSION["gwc"];
        foreach($arr as $k=>$v)
        {
            if($v['product_id']==$id)
            {
                unset($_SESSION["gwc"][$k]);
            }
        }
        $cartProducts = $_SESSION["gwc"];
        $this->assign('cartProducts',$cartProducts);  
        $this->display("Product/cart");    
    }

    //清空购物车，删除所有商品
    public function clearCart(){
        $_SESSION["gwc"] ="";
        $cartProducts = $_SESSION["gwc"];
        $this->assign('cartProducts',$cartProducts);  
        $this->display("Product/cart");  
    }

    //生成订单
    public function generateOrder(){
        if(!isset($_SESSION["gwc"]) || empty($_SESSION["gwc"])){
            return show(0,'购物车中没有商品'); 
        }
        foreach($_SESSION["gwc"] as $v)
        {
            //内存中数据进入数据库
            $orderId = D("Order")->insert($v);
            if(!$orderId){
                return show(0,'生成订单失败'); 
            }
            //更新ordernumber
            if(!isset($_SESSION["order_number"]) or empty($_SESSION["order_number"])){
                $_SESSION["order_number"] = strval($orderId).strval(rand(10000,99999));
            }
            $data['order_number'] = $_SESSION["order_number"];
            D("Order")->updateOrderNumberById($orderId,$data);           
        }
        $_SESSION["gwc"] ="";
        $_SESSION["order_number"] ="";   
        return show(1,'生成订单成功');   
    }
 
    //取得open id
    public function getBaseInfo(){
        //1 获取到code
        $appid = C('APPID');
        $redirect_uri = urlencode(C('SERVERIP')."weixin.php?c=product&a=getUserOpenId");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=zyxy#wechat_redirect";
        header('location:'.$url);
    }
    public function getUserOpenId(){
        //2 获取到网页授权的accesstoken
        $appid = C('APPID');
        $appSecret = C('APPSECRET');
        $code = $_GET['code'];
        $url ="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appSecret."&code=".$code."&grant_type=authorization_code";
        //3 获取用户的openid 
        $res = $this->http_curl($url,'get');
        $openid = $res['openid'];
        // $_SESSION['openid'] = $res['openid'];
        // if(!isset($_SESSION['writeflg'])){//本次session的第一次进入
            // $data['create_time'] =time();
            // $_SESSION['writeflg'] = "true";
            //取得用户信息
        if(empty($openid)){
            return show(0,'程序异常，请刷新下试试！'); 
        }
        $ret = D("User")->getUserByOpenId($openid);
        if(!$ret){//如果该用户不在数据库中
            $data['openid'] = $openid;
            $data['lastlogintime'] = time();
            $user_id = D("User")->insert($data);
            if(!$user_id){
             return show(0,'用户id异常'); 
            }
            $ret = D("User")->getUserByOpenId($openid);
        }else{
            D("User")->updateByUserId($ret['user_id'],array('lastlogintime'=>time()));
        }
        session('userweixin', $ret); 
        $this->index("Product/index");
    } 

    public function http_curl($url,$type='get',$res='json',$arr){
        //1 初始化curl
        $ch = curl_init();
        //2 设置curl的参数
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//true也可以，将采集数据返回
        if($type=='post'){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        }
        //3 采集
        $output = curl_exec($ch);
        //4 关闭
        curl_close($ch);
        if($res=='json'){
            if(curl_errno($ch)){
                return curl_error($ch);
            }else{//0为假 0为成功
                return json_decode($output,true);
            }
            
        }
        
    }    
}