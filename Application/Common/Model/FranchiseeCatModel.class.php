<?php
namespace Common\Model;
use Think\Model;
class FranchiseeCatModel extends  Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('franchisee_cat');
    }
    //使用模块：admin
    public function getALLFranchiseeCats() {
        $data['status'] = array('neq',-1);
        $list = $this->_db->where($data)->order('listorder desc,franchisee_cat_id desc')->select();
        return $list;
    } 

    //使用模块：admin
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    //使用模块：admin
    public function getFranchiseecats($page,$pageSize=10) {
        $data['status'] = array('neq',-1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)->order('listorder desc,franchisee_cat_id desc')->limit($offset,$pageSize)->select();
        return $list;
    }

    //使用模块：weixin home
    public function getHomeFranchiseeCats() {
        $data['status'] = array('eq',1);
        $list = $this->_db->where($data)->order('listorder desc,franchisee_cat_id desc')->select();
        return $list;     
    }  

    //使用模块：admin
    public function getFranchiseecatsCount($data= array()) {
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }

    //使用模块：admin
    public function find($id){
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('franchisee_cat_id='.$id)->find();
    }

    //使用模块：admin
    public function updateFranchiseecatById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('franchisee_cat_id='.$id)->save($data);
    }

    public function updateStatusById($id, $status) {
        if(!is_numeric($id) || !$id) {
            throw_exception("ID不合法");
        }
        if(!is_numeric($status) || !$status) {
            throw_exception("状态不合法");
        }
        $data['status'] = $status;
        return $this->_db->where('franchisee_cat_id='.$id)->save($data);
     }

    //使用模块：admin
    public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('franchisee_cat_id='.$id)->save($data);
    }
}