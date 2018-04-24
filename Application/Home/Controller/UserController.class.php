<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        if(session('user')) {
            $basic = D("Basic")->select();
            $this->assign('basic', $basic);  
            $user = session('user');
            $this->assign('user', $user);
            $this->display();
        }else{
           $this->redirect('/index.php');
        }
    }

    public function updpas(){
        if(session('user')) {
            $basic = D("Basic")->select();
            $this->assign('basic', $basic);  
            $user = session('user');
            $this->assign('user', $user);
            $this->display();
        }else{
           $this->redirect('/index.php');
        }
    }

    public function check() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $validate = $_POST['validate'];
        if(!trim($username)) {
            return show(0,'用户名不能为空');
        }
        if(!trim($password)) {
            return show(0,'密码不能为空');
        }
        if(!trim($validate)) {
            return show(0,'验证码不能为空');
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
        D("User")->updateByUserId($ret['user_id'],array('lastlogintime'=>time()));
        session('user', $ret);
        return show(1,'登录成功');
    }

    public function loginout() {
        session('user', null);
        $_SESSION["gwc"] ="";
        $this->redirect('/index.php?c=index');
    }

    public function getlonginSts(){
        if(isset($_SESSION['user']) && $_SESSION['user']){
            echo "yes";
        }else{
            echo "no";
        }
    }

    public function save() {
        $user = session('user');
        if(!$user) {
            return show(0,'用户不存在');
        }
        $data['realname'] = $_POST['realname'];
        $data['phone'] = $_POST['tel'];
        $data['email'] = $_POST['email'];
        try {
            $id = D("User")->updateByUserId($user['user_id'], $data);
            if($id === false) {
                return show(0, '配置失败');
            }
            $ret = D('User')->getUserByUserId($user['user_id']);
            session('user', $ret);
            return show(1, '配置成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }    

    public function chgpas() {
        $user = session('user');
        if(!$user) {
            return show(0,'用户不存在');
        }
        $oldpas = getMd5Password($_POST['oldpas']);
        if($oldpas!=$user['password']){
            return show(0, '密码错误');
        }
        $newpas = $_POST['newpas'];
        $newpas2 = $_POST['newpas2'];
        if($newpas!=$newpas2){
            return show(0, '两次输入的新密码不一致');
        }
        $data['password']=getMd5Password($newpas);
        try {
            $id = D("User")->updateByUserId($user['user_id'], $data);
            if($id === false) {
                return show(0, '密码修改失败');
            }
            $ret = D('User')->getUserByUserId($user['user_id']);
            session('user', $ret);
            return show(1, '密码修改成功');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    } 
}