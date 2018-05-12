<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 首页控制器
 * @author  Alexander
 */
class IndexController extends CommonController {
    public function index(){
        //取得首页用的推荐信息
        $push = D("Main")->getPushData('Main', 'main_id');
        $this->assign('push',$push);
        $this->display();
    }
}