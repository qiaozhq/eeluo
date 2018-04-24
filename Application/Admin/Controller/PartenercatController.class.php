<?php
/**
 * 合作商分类管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class PartenercatController extends CommonController {
    //合作上分类管理首页
    public function index() {
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $partenercats = D("PartenerCat")->getpartenercats($page,$pageSize);
        $partenercatsCount = D("PartenerCat")->getpartenercatsCount();
        $res = new \Think\Page($partenercatsCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('partenercats',$partenercats);
        $this->display();
    }

    //添加/修改合作商分类
    public function add(){
        if($_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0,'分类名不能为空');
            }           
            if($_POST['partener_cat_id']) {
                return $this->save($_POST);
            }
            $partenercatId = D("PartenerCat")->insert($_POST);
            if($partenercatId) {
                return show(1,'新增成功',$partenercatId);
            }
            return show(0,'新增失败',$partenercatId);
        }else {
            $this->display();
        }
    }

    //取得修改合作商分类数据
    public function edit() {
        $id = $_GET['id'];
        $partenerCat = D("PartenerCat")->find($id);
        $this->assign('partenerCat', $partenerCat);
        $this->display();
    }

    //修改合作商分类
    public function save($data) {
        $id = $data['partener_cat_id'];
        unset($data['partener_cat_id']);
        try {
            $ret = D("Partener")->findByCatId($id);
            foreach ($ret as $value) {
                if($value['pstatus']!=1){
                   $result = D("Partener")->updateStatusById($value['partener_id'],$data['status']);
                }          
            }              
            $result = D("PartenerCat")->updateMenuById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用合作商分类
    public function setStatus() {
        return parent::setStatus($_POST,'PartenerCat');
    }

    //合作商分类排序处理
    public function listorder() {
        return parent::listorder('PartenerCat');
    }

}