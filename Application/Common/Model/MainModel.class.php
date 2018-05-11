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
}