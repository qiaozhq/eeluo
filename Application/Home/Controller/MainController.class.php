<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends CommonController {
    public function index(){
        $category = $_GET['cat'];
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
        $category = $_GET['cat'];
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

    public function detail(){
        $id = $_GET['id'];
        $data = D("Main")->find('main', $id, 'main_id');
        $catname = D("Menu")->getCategoryname($data['category']);
        $subcatname = D("Menu")->getCategoryname($data['sub_category']);
        if(empty($subcatname)) {
            $categoryname = $catname[0]['name'];
        }else{
            $categoryname = $catname[0]['name'].">".$subcatname[0]['name'];
        }
        $this->assign('data', $data);
        $this->assign('result', array(
            'categoryname' => $categoryname,
        ));
        $this->display();
    }
}