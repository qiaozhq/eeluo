<?php
/**
 * 后台Index相关
 */
namespace Weixin\Controller;
use Think\Controller;
class IndexController{
    
    //消息处理
    public function index(){   
        //1 连接检查
        if(isset($_GET['echostr'])){
            $nonce = $_GET['nonce'];
            $timestamp = $_GET['timestamp'];
            $echostr = $_GET['echostr'];
            $signature = $_GET['signature'];
            $token = "weixin";       
            
            $array =  array();
            $array = array($nonce,$timestamp,$token);
            sort($array);
            $str = sha1(implode($array));
            if($str == $signature){
                echo $echostr;
            }
        }else{
            $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
            // if (!empty($postStr)){
            // $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $postObj = simplexml_load_string($postStr);     
            $result = D("Weixin")->reposeMsg($postObj);
            echo $result;
        }
    }

    //创建微信菜单
    //目前微信接口的调用方式都是curl—get、post
    /*
     * $url 接口url string
     * $type 请求类型 string
     * $res 返回数据类型 string
     * $arr post请求参数 string
     */
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
    //取得accesstoken
    public function getWxAccessToken(){
        //将accesstoken存在session中
        if($_SESSION['access_token'] && $_SESSION['expire_time']>time()){
            return $_SESSION['access_token'];
        }else{
            //不存在或者已经过期 重新取得accesstoken
            $appid = C('APPID');
            $appSecret =C('APPSECRET');
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid ."&secret=".$appSecret;
            $res = $this->http_curl($url,'get','json');
            $access_token = $res['access_token'];
            //将重新取得的放入session
            $_SESSION['access_token']= $access_token;
            $_SESSION['expire_time'] = time()+7000;
            return $access_token;
        }

    }

    //创建菜单
    public function definedItem(){
        header('content-type:text/html;charset=utf-8');
        $access_token=$this->getWxAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $postArr = array(
            'button'=>array(
                array(
                    'name'=>urlencode('关于我们'),
                    'sub_button'=>array(
                        array(
                            'name'=>urlencode('公司介绍'),
                            'type'=>'view',
                            'url'=>C('SERVERIP').'weixin.php?c=about',
                        ),//第一个二级菜单
                        array(
                            'name'=>urlencode('公司官网'),
                            'type'=>'view',
                            'url'=>C('SERVERIP'),
                        ),//第二个二级菜单
                        array(
                            'name'=>urlencode('绑定用户'),
                            'type'=>'view',
                            'url'=>C('SERVERIP').'weixin.php?c=binder&a=getBaseInfo',
                        ),//第三个二级菜单                                              
                    ),
                ),//第一个一级菜单
                array(
                    'name'=>urlencode('超值购物'),
                    'type'=>'view',
                    'url'=>C('SERVERIP').'weixin.php?c=product&a=getBaseInfo',
                ),//第二个一级菜单
                array(
                    'name'=>urlencode('加盟合作'),
                    'type'=>'view',
                    'url'=>C('SERVERIP').'weixin.php?c=partener',
                )
            )
        );
        echo "<hr/>";
        var_dump($postArr);
        echo "<hr/>";
        $postJson = urldecode(json_encode($postArr));
        $res = $this->http_curl($url,'post','json',$postJson);
        echo "<hr />";
        var_dump($res);
    }


    //取得open id
    public function getBaseInfo(){
        //1 获取到code
        $appid = C('APPID');
        $redirect_uri = urlencode(C('SERVERIP')."weixin.php?c=index&a=getUserOpenId");
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
        $sid = session_id();
        $_SESSION['openid'] = $res['openid'];
        $url = C('SERVERIP')."weixin.php?c=product&sid=".$sid;
        header('location:'.$url);     
    }

        //取得open id
    public function getUserDetail(){
        //1 获取到code
        $appid = "wx72df501269b377f9";
        $redirect_uri = urlencode(C('SERVERIP')."weixin.php?c=product&a=getUserInfo");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_userinfo&state=zyxy#wechat_redirect";
        header('location:'.$url);
    }
    public function getUserInfo(){
        //2 获取到网页授权的accesstoken
        $appid = C('APPID');
        $appSecret = C('APPSECRET');
        $code = $_GET['code'];
        $url ="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appSecret."&code=".$code."&grant_type=authorization_code";
        //3 获取用户的openid 
        $res = $this->http_curl($url,'get');
        // $_SESSION['openid'] =  $res['openid'];  
        $access_token = $res['access_token'];
        $openid = $res['openid'];
        $url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
        $res = $this->http_curl($url,'get');
        var_dump($res);  
        // $url = "http://e-luo.xyz/weixin.php?c=product";
        // header('location:'.$url);    
    }       
}