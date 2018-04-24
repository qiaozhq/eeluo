<?php
namespace Weixin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function __construct() {
        parent::__construct();
    }  

    public function index() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $validate = $_POST['validate'];
        $openid = $_POST['openid'];
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        if(!trim($password)) {
            return show(0,'密码不能为空');
        }
        if(!trim($validate)) {
            return show(0,'验证码不能为空');
        }
        if(!trim($openid)) {
            return show(0,'请从微信登录');
        }        
        if(trim($validate)!=$_SESSION['authnum_session']) {
            return show(0,'验证码不正确');
        }    
        $ret = D('User')->getUserByUsername($username);
        if(!$ret) {
            return show(0,'该用户不存在');
        }
        if($ret['status'] !=1) {
            return show(0,'该用户未激活');
        }
        if($ret['password'] != getMd5Password($password)) {
            return show(0,'密码错误');
        }
        //已经绑定了不能再绑
        if(!empty($ret['openid'])){
           return show(0,'已经绑定了'); 
        }

        $resByOpenId = D("User")->getUserByOpenId($openid);
        // 取出username对应user_id:$ret['user_id']
        // 更新order表user_id
           //通过 $resByOpenId['user_id']从order表中取出所有
           $resOrder = D("Order")->find($resByOpenId['user_id']);
           //逐条更新order表
           foreach ($resOrder as $value) {
               $value['user_id'] = $ret['user_id'];
               $result = D("Order")->updateOrderNumberById($value['order_id'],$value);
               if($result === false) {
                return show(0,'用户邦定失败36601');
               }
           }
        // 更新user表openid lastlogintime
        $data = array(
            "openid" => $openid,
            "lastlogintime" => time(),
        );
        $result = D("User")->updateByUserId($ret['user_id'],$data);
        if($result === false) {
            return show(0,'用户邦定失败36602');
        }
        // 删除user表openid对应数据
        $result = D("User")->updateStatusById($resByOpenId['user_id'],-1);
        if($result === false) {
            return show(0,'用户邦定失败36603');
        }
        D("User")->updateByUserId($ret['user_id'],array('lastlogintime'=>time()));
        session('user', $ret);
        return show(1,'用户邦定成功');
    }
    
}