<?php
/**
 * 产品管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class ProductController extends CommonController {
    //产品管理首页
    public function index() {
        $conds = array();
        $title = trim($_GET['title']);
        if($title) {
            $conds['title'] = $title;
        }
        if($_GET['catid']) {
            $conds['catid'] = intval($_GET['catid']);
        }        
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $products = D("Product")->getAdminProducts($conds,$page,$pageSize);
        $productsCount = D("Product")->getAdminProductsCount($conds);
        $productCats = D("ProductCat")->getALLProductCats();
        $res = new \Think\Page($productsCount, $pageSize);
        $pageRes = $res->show();
        if($_GET['catid']){
            $this->assign('catid', $_GET['catid']);
        }
        if($title){
            $this->assign('title', $title);
        }        
        $this->assign('pageRes', $pageRes);
        $this->assign('products',$products);
        $this->assign('productCats',$productCats);
    	$this->display();
    }

    //添加/修改产品信息
    public function add(){
        if($_POST) {
            if(!isset($_POST['catid']) || !$_POST['catid']) {
                return show(0,'分类名不能为空');
            }
            if(!isset($_POST['product_name']) || !$_POST['product_name']) {
                return show(0,'商品名不能为空');
            }         
            if(!isset($_POST['product_price']) || !$_POST['product_price']) {
                return show(0,'零售价格不能为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']) {
                return show(0,'商品大图必须上传');
            }
            if($_POST['product_id']) {
                return $this->save($_POST);
            }
            $productId = D("Product")->insert($_POST);
            if($productId) {
                return show(1,'新增成功',$productId);
            }
            return show(0,'新增失败',$productId);
        }else {
            $productCats = D("ProductCat")->getALLProductCats();
            $this->assign('productCats',$productCats);  
            $this->display();
        }
    }

    //修改产品数据
    public function save($data) {
        $id = $data['product_id'];
        unset($data['product_id']);
        try {            
            $result = D("Product")->updateProductById($id, $data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }

   //读取要修改的产品数据
    public function edit() {
        $id = $_GET['id'];
        $productCats = D("ProductCat")->getALLProductCats();
        $product = D("Product")->find($id);
        $thumbsubs=explode('##',$product['thumbsub']); 
        $this->assign('productCats',$productCats);
        $this->assign('thumbsubs',$thumbsubs);
        $this->assign('product', $product);
        $this->display();
    }

    //推送产品止首页
    public function push() {
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $positonId = intval($_POST['position_id']);
        $newsId = $_POST['push'];
        if(!$newsId || !is_array($newsId)) {
            return show(0, '请选择推荐的商品');
        }
        if(!$positonId) {
            return show(0, '没有选择推荐位');
        }
        try {
            $news = D("Product")->getNewsByNewsIdIn($newsId);
            if (!$news) {
                return show(0, '没有相关内容');
            }
            foreach ($news as $new) {
                //禁用了不能推荐
                $partener = D("Product")->find($new['product_id']);
                if($partener['status']!=1){
                    return show(0, '已经禁用不能被推荐');
                }    
            }                
            foreach ($news as $new) {
                $data = array(
                    'position_id' => $positonId,
                    'news_id' => $new['product_id'],
                    'name' => $new['product_name'],
                    'description' => $new['description'],
                    'thumb' => $new['thumb'],
                    'status' => 1,
                    'create_time' => $new['create_time'],
                );
                $position = D("PositionContent")->insert($data);
            }
            $news = D("Product")->setPStatusByNewsIdIn($newsId);
        }catch(Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(1, '推荐成功',array('jump_url'=>$jumpUrl));
    }
    
    //启用/禁用产品 status=1 正常 0关闭 -1删除
    public function setStatus() {
        //推荐了不改修改状态
        $result = D("Product")->find($_POST['id']);
        if($result['pstatus']==1){
            return show(0, '取消推荐后再操作');
        }            
        return parent::setStatus($_POST,'Product');
    }        

    //产品排序处理
    public function listorder() {
        return parent::listorder('Product');
    }
}