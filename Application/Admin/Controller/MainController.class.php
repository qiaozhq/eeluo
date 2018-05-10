<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 数据管理控制器
 * @author  Alexander
 */
class MainController extends CommonController {
    //数据信息首页
    public function index() {
        $mains = D("Main")->getAdminData('main', 'main_id');
        $this->assign('mains',$mains);
        $menus = D("Menu")->getAdminData('menu', 'menu_id');
        $this->assign('menus',$menus);
        $this->display();
    }

    //添加/修改数据信息
    public function add(){
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'分类名不能为空');
            }
            if($_POST['main_id']) {
                return $this->save($_POST);
            }
            $id = D("Main")->insert('main',$_POST);
            if($id) {
                return show(1,'新增成功',$id);
            }
            return show(0,'新增失败',$id);
        }else {
            $this->display();
        }
    }

    //取得要修改的数据信息
    public function edit() {
        $id = $_GET['id'];
        $main = D("Main")->find('main', $id, 'main_id');
        $this->assign('main', $main);
        $this->display();
    }

    //修改数据信息
    public function save($data) {
        $id = $data['main_id'];
        unset($data['main_id']);
        try {
            $result = D("Main")->updateDataById('main', $id, $data, 'main_id');
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
        return parent::setStatus($_POST,'Main','main','main_id');
    }

    //排序
    public function listorder() {
        return parent::listorder('Main','main','main_id');
    }
}