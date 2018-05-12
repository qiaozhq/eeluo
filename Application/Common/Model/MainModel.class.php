<?php
namespace Common\Model;
use Think\Model;

/**
 * 数据信息操作
 * @author  Alexander
 */
class MainModel extends CommonModel {
    private $_db = '';
    
    public function __construct() {
        $this->_db = M('main');
    }
    
    //共通以外操作写在下面
    public function updatePushById($_db, $idval, $status, $idname='id') {
        if(!is_numeric($status)) {
            throw_exception('status不能为非数字');
        }
        if(!$idval || !is_numeric($idval)) {
            throw_exception('id不合法');
        }
        $data['push'] = $status;
        return M($_db)->where($idname.'='.$idval)->save($data);
    }

    public function getCountData($_db, $id='id') {
        $data = array(
            'status' => array('eq',1),
            'category' => $id,
        );
        $list = M($_db)->where($data)->select();
        return count($list);
    }

    public function getPushData($_db, $id='id') {
        $data = array(
            'status' => array('neq',-1),
            'push' => 1,
        );
        $list = M($_db)->where($data)->order('pushorder desc,'.$id.' desc')->select();
        return $list;
    }

    public function getCategoryData($Category) {
        $data = array(
            'status' => array('neq',-1),
            'category' => $Category,
        );
        $list = $this->_db->where($data)->order('listorder desc, main_id desc')->select();
        return $list;
    }

    public function getSubCategoryData($Category) {
        $data = array(
            'status' => array('neq',-1),
            'sub_category' => $Category,
        );
        $list = $this->_db->where($data)->order('listorder desc, main_id desc')->select();
        return $list;
    }

    public function updatePushorderById($_db, $idval, $listorder, $idname='id') {
        if(!$idval || !is_numeric($idval)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'pushorder' => intval($listorder),
        );
        return M($_db)->where($idname.'='.$idval)->save($data);
    }

    public function updateCountById($_db, $idval, $count, $idname='id') {
        if(!$idval || !is_numeric($idval)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'count' => intval($count)+1,
        );
        return M($_db)->where($idname.'='.$idval)->save($data);
    }
}