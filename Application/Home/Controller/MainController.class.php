<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends CommonController {
    public function index(){
        $category = $_GET['id']; 
        $main = D("Main")->getCategoryData($category);
        $submenus = D("Menu")->findsubcat($category); 
        $this->assign('result', array(
            'main' => $main,
            'submenus' => $submenus,
        ));
        $this->display();
    }
}