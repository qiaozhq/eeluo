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
}