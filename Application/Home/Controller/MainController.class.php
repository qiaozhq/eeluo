<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends CommonController {
    public function index(){
        $category = $_GET['id']; 
        $main = D("Main")->getMainByCategory($category);
        $menus = D("Menu")->findsubcat($category); 
        $this->assign('result', array(
            'main' => $main,
            'menus' => $menus,
        ));
        $this->display();
    }
}