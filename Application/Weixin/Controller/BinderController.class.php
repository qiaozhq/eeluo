<?php
namespace Weixin\Controller;
use Think\Controller;
use Think\Exception;
/*
**用户邦定
*/
class BinderController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // 取出openid
        $appid = C('APPID');
        $appSecret = C('APPSECRET');
        $code = $_GET['code'];
        $url ="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$appSecret."&code=".$code."&grant_type=authorization_code";
        //3 获取用户的openid 
        $res = $this->http_curl($url,'get');      
        $openid = $res['openid']; 
        $this->assign('openid',$openid);  
        $this->display();
    }

    //取得open id
    public function getBaseInfo(){
        //1 获取到code
        $appid = C('APPID');
        $redirect_uri = urlencode(C('SERVERIP')."weixin.php?c=binder&a=index");
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=bnd#wechat_redirect";
        header('location:'.$url);
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