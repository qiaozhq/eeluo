<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 分类信息控制器
 * @author  Alexander
 */
class MenuController extends CommonController {
    //分类信息首页
    public function index() {
        $menus = D("Menu")->getAdminData('menu', 'menu_id');
        $this->assign('menus',$menus);
        $this->display();
    }

    //添加/修改分类信息
    public function add(){
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'分类名不能为空');
            }
            if($_POST['menu_id']) {
                return $this->save($_POST);
            }
            $id = D("Menu")->insert('menu',$_POST);
            if($id) {
                return show(1,'新增成功',$id);
            }
            return show(0,'新增失败',$id);
        }else {
            $menus = D("Menu")->getBarMenus();
            $this->assign('menus',$menus);
            $this->display();
        }
    }

    //取得要修改的分类信息
    public function edit() {
        $id = $_GET['id'];
        $menu = D("Menu")->find('menu', $id, 'menu_id');
        $this->assign('menu', $menu);
        $menus = D("Menu")->getBarMenus();
        $this->assign('menus',$menus);
        $this->display();
    }

    //修改分类信息
    public function save($data) {
        $id = $data['menu_id'];
        unset($data['menu_id']);
        try {
            $result = D("Menu")->updateDataById('menu', $id, $data, 'menu_id');
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用
    public function setStatus() {
        return parent::setStatus($_POST,'Menu','menu','menu_id');
    }

    //排序
    public function listorder() {
        return parent::listorder('Menu','menu','menu_id');
    }
}