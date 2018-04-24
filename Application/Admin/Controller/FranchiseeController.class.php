<?php
/**
 * 加盟商管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class FranchiseeController extends CommonController {
    //加盟商管理首页
    public function index() {
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $franchisees = D("Franchisee")->getFranchisees($page,$pageSize);
        $count = D("Franchisee")->getFranchiseesCount();
        $franchiseeCats = D("FranchiseeCat")->getALLFranchiseeCats();
        $res  =  new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        $positions = D("Position")->getNormalPositions();
        $this->assign('pageres',$pageres);
        $this->assign('franchisees',$franchisees);
        $this->assign('franchiseeCats',$franchiseeCats);
        $this->assign('positions', $positions);
        $this->display();
    }

    //添加/修改加盟商
    public function add(){
        if($_POST) {
            if(!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0,'分类名不能为空');
            }
            if(!isset($_POST['franchisee_name']) || !$_POST['franchisee_name']) {
                return show(0,'加盟商名不能为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']) {
                return show(0,'加盟商封面图不能为空');
            }            
            if($_POST['franchisee_id']) {
                return $this->save($_POST);
            }
            $franchiseeId = D("Franchisee")->insert($_POST);
            if($franchiseeId) {
                return show(1,'新增成功',$franchiseeId);
            }
            return show(0,'新增失败',$franchiseeId);
        }else {
            $franchiseeCats = D("FranchiseeCat")->getALLFranchiseeCats();
            $this->assign('franchiseeCats',$franchiseeCats);  
            $this->display();
        }
    }

    //修改加盟商页面
    public function edit() {
        $franchiseeid = $_GET['id'];
        $franchiseeCats = D("FranchiseeCat")->getALLFranchiseeCats();
        $franchisee = D("Franchisee")->find($franchiseeid);
        $this->assign('franchiseeCats',$franchiseeCats);
        $this->assign('franchisee', $franchisee);
        $this->display();
    }

    //修改加盟商
    public function save($data) {
        $franchiseeId = $data['franchisee_id'];
        unset($data['franchisee_id']);
        try {
            $result = D("Franchisee")->updateFranchiseeById($franchiseeId, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用加盟商
    public function setStatus() {
        //推荐了不改修改状态
        $result = D("Franchisee")->find($_POST['id']);
        if($result['pstatus']==1){
            return show(0, '取消推荐后再操作');
        }          
        return parent::setStatus($_POST,'Franchisee');
    }

    //加盟商排序处理
    public function listorder() {
        return parent::listorder('Franchisee');
    }

    //加盟商推荐
    public function push() {
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $positonId = intval($_POST['position_id']);
        $newsId = $_POST['push'];
        if(!$newsId || !is_array($newsId)) {
            return show(0, '请选择推荐的合作商');
        }
        if(!$positonId) {
            return show(0, '没有选择推荐位');
        }
        try {
            $news = D("Franchisee")->getNewsByNewsIdIn($newsId);
            if (!$news) {
                return show(0, '没有相关内容');
            }
            foreach ($news as $new) {
                //禁用了不能推荐
                $partener = D("Franchisee")->find($new['franchisee_id']);
                if($partener['status']!=1){
                    return show(0, '已经禁用不能被推荐');
                }    
            }            
            foreach ($news as $new) {
                $data = array(
                    'position_id' => $positonId,
                    'news_id' => $new['franchisee_id'],
                    'name' => $new['franchisee_name'],
                    'description' => $new['description'],
                    'thumb' => $new['thumb'],
                    'status' => 1,
                    'create_time' => $new['create_time'],
                );
                $position = D("PositionContent")->insert($data);
            }
            $news = D("Franchisee")->setPStatusByNewsIdIn($newsId);
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(1, '推荐成功',array('jump_url'=>$jumpUrl));
    }
}