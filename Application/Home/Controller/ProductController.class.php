<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends CommonController {
    public function index() {
        $productCats = D("ProductCat")->getHomeProductCats();
        $products = D("Product")->getHomeProducts();  
        $rxproducts = D("Product")->getHomeRxProducts();  
        $this->assign('result', array(
            'productCats' => $productCats,
            'products' => $products,
            'rxproducts' => $rxproducts,
        ));    
    	$this->display();
    }

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
        // if($_SESSION['user']['level']=='D'){
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
                array("user_id"=>$_SESSION["user"]['user_id'],"product_id"=>$id,"product_name"=>$name,"buy_price"=>$price,"buy_amount"=>$amount,"thumb"=>$thumb)
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
                $_SESSION["gwc"][] = array("user_id"=>$_SESSION["user"]['user_id'],"product_id"=>$id,"product_name"=>$name,"buy_price"=>$price,"buy_amount"=>$amount,"thumb"=>$thumb);
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
        $id = $_SESSION["user"]["user_id"];
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
       
}