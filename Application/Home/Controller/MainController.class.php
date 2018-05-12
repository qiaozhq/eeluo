<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends CommonController {
    public function index(){
        $category = $_GET['id'];
        $categoryname = D("Menu")->getCategoryname($category); 
        $main = D("Main")->getCategoryData($category);
        $submenus = D("Menu")->findsubcat($category); 
        $this->assign('result', array(
            'categoryname' => $categoryname[0]['name'],
            'main' => $main,
            'submenus' => $submenus,
        ));
        $this->display();
    }

    public function subCategory(){
        $category = $_GET['id'];
        $categoryname = D("Menu")->getCategoryname($category); 
        $main = D("Main")->getSubCategoryData($category);
        $submenus = D("Menu")->findsubcat($category); 
        $this->assign('result', array(
            'categoryname' => $categoryname[0]['name'],
            'main' => $main,
            'submenus' => $submenus,
        ));
        $this->display("Main/index");
    }
}