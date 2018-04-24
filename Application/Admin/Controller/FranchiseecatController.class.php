<?php
/**
 * 加盟商分类管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class FranchiseecatController extends CommonController {
    //加盟商分类管理首页
    public function index() {
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $franchiseecats = D("FranchiseeCat")->getFranchiseecats($page,$pageSize);
        $franchiseecatsCount = D("FranchiseeCat")->getFranchiseecatsCount();
        $res = new \Think\Page($franchiseecatsCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('franchiseecats',$franchiseecats);
        $this->display();
    }

    //添加/修改加盟商分类信息
    public function add(){
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'分类名不能为空');
            }           
            if($_POST['franchisee_cat_id']) {
                return $this->save($_POST);
            }
            $franchiseecatId = D("FranchiseeCat")->insert($_POST);
            if($franchiseecatId) {
                return show(1,'新增成功',$franchiseecatId);
            }
            return show(0,'新增失败',$franchiseecatId);

        }else {
            $this->display();
        }
    }

    //编辑修改加盟商分类页面
    public function edit() {
        $id = $_GET['id'];
        $franchiseecat = D("FranchiseeCat")->find($id);
        $this->assign('franchiseecat', $franchiseecat);
        $this->display();
    }

    //修改加盟商分类信息
    public function save($data) {
        $id = $data['franchisee_cat_id'];
        unset($data['franchisee_cat_id']);
        try {
            $ret = D("Franchisee")->findByCatId($id);
            foreach ($ret as $value) {
                if($value['pstatus']!=1){
                   $result = D("Franchisee")->updateStatusById($value['franchisee_id'],$data['status']);
                }
            }         
            $result = D("FranchiseeCat")->updateFranchiseecatById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用加盟商分类
    public function setStatus() {
        return parent::setStatus($_POST,'FranchiseeCat');
    }

    //加盟商分类排序处理
    public function listorder() {
        return parent::listorder('FranchiseeCat');
    }
}