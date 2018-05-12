<?php
namespace Home\Controller;
use Think\Controller;
class MainController extends CommonController {
    public function index(){
        $category = $_GET['cat'];
        $categoryname = D("Menu")->getMenuName($category); 
        //取得对应分类数据
        $main = D("Main")->getCategoryData($category);
        //取得分类对应子分类
        $submenus = D("Menu")->getSubMenus($category); 
        $this->assign('result', array(
            'categoryname' => $categoryname[0]['name'],
            'main' => $main,
            'submenus' => $submenus,
        ));
        $this->display();
    }

    public function subCategory(){
        $category = $_GET['cat'];
        //根据子分类取得子分类名
        $subcatname = D("Menu")->getMenuName($category);
        //根据子分类的父分类id取得父分类名
        $catname = D("Menu")->getMenuName($subcatname[0]['parentid']); 
        $categoryname = $catname[0]['name'].">".$subcatname[0]['name'];
        //取得对应子分类数据
        $main = D("Main")->getSubCategoryData($category);
        //取得分类对应子分类
        $submenus = D("Menu")->getSubMenus($category); 
        $this->assign('result', array(
            'categoryname' => $categoryname,
            'main' => $main,
            'submenus' => $submenus,
        ));
        $this->display("Main/index");
    }

    public function detail(){
        $id = $_GET['id'];
        //根据id取得对应数据
        $data = D("Main")->find('main', $id, 'main_id');
        //更新浏览次数
        D("Main")->updateCountById('main', $id, $data['count'], 'main_id');
        //根据数据取得大小分类名
        $catname = D("Menu")->getMenuName($data['category']);
        $subcatname = D("Menu")->getMenuName($data['sub_category']);
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