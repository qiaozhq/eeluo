<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 前台用共通控制器
 * @author  Alexander
 */
class CommonController extends Controller {
    
    public function __construct() {
        header("Content-type: text/html; charset=utf-8");
        parent::__construct();
        $basic = D("Basic")->select();
        $service = explode('|',$basic['service']); 
        $this->assign('basic', $basic);
        $this->assign('service', $service); 
        $menus = D("Menu")->getBarMenus();
        foreach ($menus as $i=>$menu){
            $count = D("Main")->getCountData('main', $menu['menu_id']);
            $menus[$i]['count'] = $count;
        }
        $this->assign('menus',$menus);
    }

    public function _empty(){//方法不存在的时候
        header("HTTP/1.0 404 Not Found");
        $this->display("Index/error");
    }    
}