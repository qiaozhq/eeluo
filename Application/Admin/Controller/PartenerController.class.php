<?php
/**
 * 合作商管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class PartenerController extends CommonController {
    //合作商管理首页
    public function index() {
        $conds = array();
        $title = $_GET['title'];
        if($title) {
            $conds['title'] = $title;
        }
        if($_GET['catid']) {
            $conds['catid'] = intval($_GET['catid']);
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $parteners = D("Partener")->getParteners($conds,$page,$pageSize);
        $count = D("Partener")->getPartenersCount($conds);
        $partenerCats = D("PartenerCat")->getALLPartenerCats();
        $res  =  new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        $positions = D("Position")->getNormalPositions();
        $this->assign('pageres',$pageres);
        $this->assign('parteners',$parteners);
        $this->assign('partenerCats',$partenerCats);
        $this->assign('positions', $positions);
        $this->display();
    }

    //添加/修改合作商
    public function add(){
        if($_POST) {
            if(!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0,'分类名不能为空');
            } 
            if(!isset($_POST['partener_name']) || !$_POST['partener_name']) {
                return show(0,'合作商名不能为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']) {
                return show(0,'合作商封面图不能为空');
            }                        
            if($_POST['partener_id']) {
                return $this->save($_POST);
            }
            $partenerId = D("Partener")->insert($_POST);
            if($partenerId) {
                return show(1,'新增成功',$partenerId);
            }
            return show(0,'新增失败',$partenerId);
        }else {
            $partenerCats = D("PartenerCat")->getALLPartenerCats();
            $this->assign('partenerCats',$partenerCats);  
            $this->display();
        }
    }

    //取得要修改的合作商数据
    public function edit() {
        $id = $_GET['id'];
        $partenerCats = D("PartenerCat")->getALLPartenerCats();
        $partener = D("Partener")->find($id);
        $this->assign('partenerCats',$partenerCats);
        $this->assign('partener', $partener);
        $this->display();
    }

    //修改合作商
    public function save($data) {
        $id = $data['partener_id'];
        unset($data['partener_id']);

        try {
            $result = D("Partener")->updatePartenerById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用合作商
    public function setStatus() {
        //推荐了不改修改状态
        $result = D("Partener")->find($_POST['id']);
        if($result['pstatus']==1){
            return show(0, '取消推荐后再操作');
        }    
        return parent::setStatus($_POST,'Partener');
    }

    //合作商排序处理
    public function listorder() {
        return parent::listorder('Partener');
    }

    //合作商推荐
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
            $news = D("Partener")->getNewsByNewsIdIn($newsId);
            if (!$news) {
                return show(0, '没有相关内容');
            }
            foreach ($news as $new) {
                //禁用了不能推荐
                $partener = D("Partener")->find($new['partener_id']);
                if($partener['status']!=1){
                    return show(0, '已经禁用不能被推荐');
                }    
            }
            foreach ($news as $new) {            
                $data = array(
                    'position_id' => $positonId,
                    'news_id' => $new['partener_id'],
                    'name' => $new['partener_name'],
                    'description' => $new['description'],
                    'thumb' => $new['thumb'],
                    'status' => 1,
                    'create_time' => $new['create_time'],
                );
                $position = D("PositionContent")->insert($data);
            }
            $news = D("Partener")->setPStatusByNewsIdIn($newsId);
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(1, '推荐成功',array('jump_url'=>$jumpUrl));
    }
}