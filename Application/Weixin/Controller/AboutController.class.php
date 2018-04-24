<?php
namespace Weixin\Controller;
use Think\Controller;
use Think\Exception;
/*
**关于我们
*/
class AboutController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        //取得文件中设置的数据
        $basic = D("Basic")->select();
        $this->assign('basic', $basic);   
        $this->display();
    }

}