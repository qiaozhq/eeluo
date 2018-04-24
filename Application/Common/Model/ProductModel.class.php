<?php
namespace Common\Model;
use Think\Model;

class ProductModel extends  Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('product');
    }

    //使用模块：weixin home
    public function getHomeProducts() {
        $data['status'] = array('eq',1);
        $list = $this->_db->where($data)->order('listorder desc,product_id desc')->select();
        return $list;    
    }

    //使用模块：weixin home
    public function getHomeRxProducts() {
        $data['status'] = array('eq',1);
        $data['pstatus'] = array('eq',1);
        $list = $this->_db->where($data)->order('listorder desc,product_id desc')->select();
        return $list;    
    }

    //使用模块：admin  
    public function getAdminProducts($data,$page,$pageSize=10) {
        $conditions = $data;
        if(isset($data['title']) && $data['title']) {
            $conditions['product_name'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['catid']) && $data['catid'])  {
            $conditions['catid'] = intval($data['catid']);
        }
        $conditions['status'] = array('neq',-1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($conditions)
            ->order('listorder desc ,product_id desc')
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }

    //使用模块：admin
    public function getAdminProductsCount($data= array()) {
        $conditions = $data;
        if(isset($data['title']) && $data['title']) {
            $conditions['product_name'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['catid']) && $data['catid'])  {
            $conditions['catid'] = intval($data['catid']);
        }
        $conditions['status'] = array('neq',-1);
        return $this->_db->where($conditions)->count();        
    }

    //使用模块：admin
    public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('product_id='.$id)->save($data);
    }

    //使用模块：weixin admin home
    public function find($id){
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('product_id='.$id)->find();
    }

    //使用模块：admin
    public function findByCatId($id) {
        if(!$id || !is_numeric($id)) {
            return array();
        }
        $data = array(
            'catid' => $id,
            'status' => array('neq',-1),
        );  
        return $this->_db->where($data)->select();
    }
    
    //使用模块：admin
    public function getNewsByNewsIdIn($newsIds) {
        if(!is_array($newsIds)) {
            throw_exception("参数不合法");
        }
        $data = array(

            'product_id' => array('in',implode(',', $newsIds)),
        );
        return $this->_db->where($data)->select();
    }

    //使用模块：admin
    public function setPStatusByNewsIdIn($newsIds) {
        if(!is_array($newsIds)) {
            throw_exception("参数不合法");
        }
        $data = array(

            'product_id' => array('in',implode(',', $newsIds)),
        );
        $save = array(
            'pstatus' => 1,
        );     
        return $this->_db->where($data)->save($save);
    }

    //使用模块：admin
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //使用模块：admin
    public function updateProductById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('product_id='.$id)->save($data);
    }

    //使用模块：admin
    public function updateStatusById($id, $status) {
        if(!is_numeric($id) || !$id) {
            throw_exception("ID不合法");
        }
        if(!is_numeric($status)) {
            throw_exception("状态不合法");
        }
        $data['status'] = $status;
        return $this->_db->where('product_id='.$id)->save($data);
     }

    //使用模块：admin
    public function updatePStatusById($id, $status) {
        if(!is_numeric($id) || !$id) {
            throw_exception("ID不合法");
        }
        if(!is_numeric($status)) {
            throw_exception("状态不合法");
        }
        $data['pstatus'] = $status;
        return $this->_db->where('product_id='.$id)->save($data);
     }
}