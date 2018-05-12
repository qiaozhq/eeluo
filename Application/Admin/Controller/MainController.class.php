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

    //推荐信息首页
    public function poidx() {
        $mains = D("Main")->getAdminData('main', 'main_id');
        $this->assign('mains',$mains);
        $menus = D("Menu")->getAdminData('menu', 'menu_id');
        $this->assign('menus',$menus);
        $this->display();
    }
    
    //添加/修改数据信息
    public function add(){
        if($_POST) {
           if(!isset($_POST['category']) || !$_POST['category']) {
                return show(0,'必须选择分类');
            }
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'标题不能为空');
            }
            if(!isset($_POST['content']) || !$_POST['content']) {
                return show(0,'内容不能为空');
            }
            if(!isset($_POST['count'])) {
                return show(0,'浏览次数不能为空');
            }
            if(!eregi('^[0-9]+$',$_POST['count'])) {
                return show(0,'浏览次数不正确');
            }
            if($_POST['main_id']) {
                //更新时间
                $_POST['update_time']=create_time(time());
                return $this->save($_POST);
            }
            //做成时间
            $_POST['create_time']=create_time(time());
            $_POST['update_time']=$_POST['create_time'];
            $id = D("Main")->insert('main',$_POST);
            if($id) {
                return show(1,'新增成功',$id);
            }
            return show(0,'新增失败',$id);
        }else {
            $menus = D("Menu")->getAdminData('menu', 'menu_id');
            $this->assign('menus',$menus);
            $this->display();
        }
    }

    //取得要修改的数据信息
    public function edit() {
        $id = $_GET['id'];
        $main = D("Main")->find('main', $id, 'main_id');
        $this->assign('main', $main);
        $menus = D("Menu")->getAdminData('menu', 'menu_id');
        $this->assign('menus',$menus);
        $subMenus = D("Menu")->findsubcat($main['category']);
        $this->assign('subMenus', $subMenus);
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

    //根据第一分类取得第二分类
    public function subcat() {
        $category = $_GET['category'];
        $subMenus = D("Menu")->findsubcat($category);
        return show(1,'',$subMenus);
    }

    //推荐/推荐取消
    public function setPush() {
        try {
            if ($_POST) {
                $id = $_POST['id'];
                $push = $_POST['push'];
                if (!$id) {
                    return show(0, 'ID不存在');
                }
                $res = D('Main')->updatePushById('main', $id, $push, 'main_id');
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }
            }
            return show(0, '没有提交的内容');
        }catch(Exception $e) {
            return show(0, $e->getMessage());
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