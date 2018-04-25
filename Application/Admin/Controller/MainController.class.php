<?php
/**
 * 新闻管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class MainController extends CommonController {
    
    //数据管理首页
    public function index() {
        $main = D("Main")->getMain();
        $this->assign('main',$main);
        $this->display();
    }

    //添加/修改数据
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
            if(!isset($_POST['count']) || !$_POST['count']) {
                return show(0,'浏览次数不能为空');
            }
            if(!eregi('^[0-9]+$',$_POST['count'])) {
                return show(0,'浏览次数不正确');
            }
            $_POST['count'] = (int)$_POST['count'];
            if($_POST['id']) {
                return $this->save($_POST);
            }
            $id = D("Main")->insertMain($_POST);
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

    //取得要修改的数据
    public function edit() {
        $id = $_GET['id'];
        $menus = D("Menu")->getBarMenus();
        $this->assign('menus',$menus);
        $main = D("Main")->find($id);
        $this->assign('main', $main);
        $this->display();
    }

    //修改数据
    public function save($data) {
        $id = $data['id'];
        unset($data['id']);
        try {
            $result = D("Main")->updateMainById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用数据
    public function setStatus() {
        return parent::setStatus($_POST,'Main');
    }

    //分类排序处理
    public function listorder() {
        return parent::listorder('Main');
    }
}