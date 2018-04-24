<?php
/**
 * 分类管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class MenuController extends CommonController {
    //分类管理首页
    public function index() {
        $data = array();
        if(isset($_REQUEST['type']) && in_array($_REQUEST['type'], array(0,1))) {
            $data['type'] = intval($_REQUEST['type']);
            $this->assign('type',$data['type']);
        }else{
            $this->assign('type',-100);
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $menus = D("Menu")->getMenus($data,$page,$pageSize);
        $menusCount = D("Menu")->getMenusCount($data);
        $res = new \Think\Page($menusCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('menus',$menus);
        $this->display();
    }

    //添加/修改分类
    public function add(){
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'分类名不能为空');
            }
            if(!isset($_POST['m']) || !$_POST['m']) {
                return show(0,'模块名不能为空');
            }
            if(!isset($_POST['c']) || !$_POST['c']) {
                return show(0,'控制器不能为空');
            }
            if(!isset($_POST['f']) || !$_POST['f']) {
                return show(0,'方法名不能为空');
            }
            if($_POST['menu_id']) {
                return $this->save($_POST);
            }
            $menuId = D("Menu")->insert($_POST);
            if($menuId) {
                return show(1,'新增成功',$menuId);
            }
            return show(0,'新增失败',$menuId);
        }else {
            $this->display();
        }
    }

    //修改分类数据取得
    public function edit() {
        $menuId = $_GET['id'];
        $menu = D("Menu")->find($menuId);
        $this->assign('menu', $menu);
        $this->display();
    }

    //修改分类
    public function save($data) {
        $menuId = $data['menu_id'];
        unset($data['menu_id']);

        try {
            $result = D("Menu")->updateMenuById($menuId, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用分类
    public function setStatus() {
        return parent::setStatus($_POST,'Menu');
    }

    //分类排序处理
    public function listorder() {
        return parent::listorder('Menu');
    }
}