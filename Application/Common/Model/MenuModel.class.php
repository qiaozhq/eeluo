<?php
namespace Common\Model;
use Think\Model;

/**
 * 分类信息操作
 * @author  Alexander
 */
class MenuModel extends CommonModel {
    private $_db = '';
    
    public function __construct() {
        $this->_db = M('menu');
    }
    
    //共通以外操作写在下面
    public function getBarMenus() {
        $data = array(
            'status' => 1,
            'parentid' => 0,
        );
        $res = $this->_db
            ->where($data)
            ->order('listorder desc,menu_id desc')
            ->select();
        return $res;
    }

    public function getSubMenus($id){
        $data = array(
            'status' => array('neq',-1),
            'parentid' => $id,
        );
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where($data)->select();
    }

    public function getMenuName($id){
        $data = array(
            'status' => array('neq',-1),
            'menu_id' => $id,
        );
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where($data)->select();
    }
   
}