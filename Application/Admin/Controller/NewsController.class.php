<?php
/**
 * 新闻管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class NewsController extends CommonController {
    //新闻管理首页
    public function index() {
        $news = D("News")->getNews();
        $this->assign('news',$news);
        $this->display();
    }

    //添加/修改新闻
    public function add(){
        if($_POST) {
            if(!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0,'必须选择分类');
            }
            if(!isset($_POST['title']) || !$_POST['title']) {
                return show(0,'标题不能为空');
            }
            if(!isset($_POST['description']) || !$_POST['description']) {
                return show(0,'简介不能为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']) {
                return show(0,'新闻必须有缩略图');
            }
            if(!isset($_POST['content']) || !$_POST['content']) {
                return show(0,'内容不能为空');
            }            
            if($_POST['news_id']) {
                return $this->save($_POST);
            }
            $id = D("News")->insert($_POST);
            if($id) {
                return show(1,'新增成功',$id);
            }
            return show(0,'新增失败',$id);
        }else {
            $this->display();
        }
    }

    //取得要修改的新闻数据
    public function edit() {
        $id = $_GET['id'];
        $new = D("News")->find($id);
        $this->assign('new', $new);
        $this->display();
    }

    //修改新闻
    public function save($data) {
        $id = $data['news_id'];
        unset($data['news_id']);
        try {
            $result = D("News")->updateMenuById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用新闻
    public function setStatus() {
        return parent::setStatus($_POST,'News');
    }

    //分类排序处理
    public function listorder() {
        return parent::listorder('News');
    }
}