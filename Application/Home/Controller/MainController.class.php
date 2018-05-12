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
        if($categoryname[0]['parentid']!='0'){
            $parentcategoryname = D("Menu")->getCategoryname($categoryname[0]['parentid']); 
        }
        $categoryname = $parentcategoryname[0]['name'].">".$categoryname[0]['name'];
        $main = D("Main")->getSubCategoryData($category);
        $submenus = D("Menu")->findsubcat($category); 
        $this->assign('result', array(
            'categoryname' => $categoryname,
            'main' => $main,
            'submenus' => $submenus,
        ));
        $this->display("Main/index");
    }
}