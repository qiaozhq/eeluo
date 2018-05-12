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
        $main = D("Main")->getHomeData('Main', 'main_id');
        $this->assign('result', array(
            'main' => $main,
        ));
        $this->display();
    }
}