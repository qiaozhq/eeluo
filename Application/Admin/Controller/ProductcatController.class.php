<?php
/**
 * 产品分类管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class ProductcatController extends CommonController {
    //产品分类管理首页
    public function index() {
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $productCats = D("ProductCat")->getAdminProductCats($page,$pageSize);
        $productCatsCount = D("ProductCat")->getProductCatsCount();
        $res = new \Think\Page($productcatsCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('productCats',$productCats);
    	$this->display();
    }

    //添加/修改产品分类
    public function add(){
        if($_POST) {
            if(!isset($_POST['product_cat_name']) || !$_POST['product_cat_name']) {
                return show(0,'分类名不能为空');
            }
            if($_POST['product_cat_id']) {
                return $this->save($_POST);
            }
            $productcatId = D("ProductCat")->insert($_POST);
            if($productcatId) {
                return show(1,'新增成功',$productcatId);
            }
            return show(0,'新增失败',$productcatId);
        }else {
            $this->display();
        }
    }

    //读取要修改的产品分类数据
    public function edit() {
        $id = $_GET['id'];
        $productCat = D("ProductCat")->find($id);
        $this->assign('productCat', $productCat);
        $this->display();
    }

    //修改产品分类
    public function save($data) {
        $id = $data['product_cat_id'];
        unset($data['product_cat_id']);
        try {
            $ret = D("Product")->findByCatId($id);
            foreach ($ret as $value) {
                if($value['pstatus']!=1){
                   $result = D("Product")->updateStatusById($value['product_id'],$data['status']);
                }
            }           
            $result = D("ProductCat")->updateMenuById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用产品分类 status=1 正常 0关闭 -1删除
    public function setStatus() {
        return parent::setStatus($_POST,'ProductCat');
    }        

    //产品分类排序处理
    public function listorder() {
        return parent::listorder('ProductCat');
    }
}