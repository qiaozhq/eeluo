<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 推荐管理控制器
 * @author  Alexander
 */
class PushController extends CommonController {
    //推荐信息首页
    public function index() {
        $mains = D("Main")->getAdminData('main', 'main_id');
        $this->assign('mains',$mains);
        $menus = D("Menu")->getAdminData('menu', 'menu_id');
        $this->assign('menus',$menus);
        $this->display();
    }
    
    //添加/修改推荐信息
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
                return $this->save($_POST);
            }
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

    //取得要修改的推荐信息
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

    //修改推荐信息
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

    //启用/禁用
    public function setStatus() {
        return parent::setStatus($_POST,'Main','main','main_id');
    }

    //排序
    public function listorder() {
        return parent::listorder('Main','main','main_id');
    }
}