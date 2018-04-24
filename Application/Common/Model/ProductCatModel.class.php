<?php
namespace Common\Model;
use Think\Model;

class ProductCatModel extends  Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('product_cat');
    }

    //使用模块：weixin home
    public function getHomeProductCats() {
        $data['status'] = array('eq',1);
        $list = $this->_db->where($data)->order('listorder desc,product_cat_id desc')->select();
        return $list;
    }

    //使用模块：admin
    public function getAdminProductCats() {
        $data['status'] = array('neq',-1);
        $list = $this->_db->where($data)->order('listorder desc,product_cat_id desc')->select();
        return $list;
    }

    //使用模块：admin
    public function getALLProductCats() {
        $data['status'] = array('neq',-1);
        $list = $this->_db->where($data)->order('listorder desc,product_cat_id desc')->select();
        return $list;
    } 

    //使用模块：admin 
    public function getProductCatsCount($data= array()) {
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }

    //使用模块：admin
    public function find($id){
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('product_cat_id='.$id)->find();
    }

    //使用模块：admin
    public function updateMenuById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('product_cat_id='.$id)->save($data);
    }

    //使用模块：admin
    public function updateStatusById($id, $status) {
        if(!is_numeric($id) || !$id) {
            throw_exception("ID不合法");
        }
        if(!is_numeric($status) || !$status) {
            throw_exception("状态不合法");
        }
        $data['status'] = $status;
        return $this->_db->where('product_cat_id='.$id)->save($data);
     }

    //使用模块：admin
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //使用模块：admin
    public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('product_cat_id='.$id)->save($data);
    }
}