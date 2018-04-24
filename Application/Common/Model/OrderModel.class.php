<?php
namespace Common\Model;
use Think\Model;

class OrderModel extends  Model {
    private $_db = '';
    public function __construct() {
        $this->_db = M('order');
    }

    //使用模块：weixin home
    public function insert($data = array()) {
        if(!$data || !is_array($data)) {
            return 0;
        }
        $data['create_time']=time();
        return $this->_db->add($data);
    }

    //使用模块：weixin home
    public function find($id){
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('user_id='.$id)->field("*,buy_price*buy_amount as bug_kingaku")->order('order_id asc')->select();
    }

    //使用模块：admin 查找某个订单下所有明细
    public function findOneDetail($order_number){
        $data = array(
                'status' => array('neq',-1),
                'order_number' =>$order_number
            );
        return $this->_db->where($data)->field("*,buy_price*buy_amount as kingaku")->order('order_id asc')->select();
    }

    //使用模块：admin 查找某个订单
    public function findOne($order_number){
        $data = array(
                'status' => array('neq',-1),
                'order_number' =>$order_number
            );
        return $this->_db->where($data)->find();
    }

    //使用模块：admin 查找某个订单的情况
    public function findAll(){
        return M('order as a')->join('zyxy_user  as  b  on b.user_id = a.user_id')->where('a.status  <>  -1')->group("a.order_number")->field("a.order_number,max(b.username) as username,max(b.openid) as openid,max(a.create_time) as create_time,sum(a.buy_price*a.buy_amount) as kingaku,min(paystatus) as paystatus,max(a.instruc) as instruc")->order('a.create_time desc')->select();
        // return M('order as a')->join('cms_user  as  b  on b.user_id = a.user_id')->where('a.status  <>  -1')->group("order_number")->field("order_number,min(paystatus) as paystatus,sum(buy_price*buy_amount) as kingaku")->order('order_number asc')->select();
    }

    //使用模块：weixin home 
    public function findorder($id){
        if(!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('user_id='.$id)->group("order_number")->field("order_number,min(paystatus) as paystatus,sum(buy_price*buy_amount) as kingaku")->order('create_time desc')->select();
    }

    //使用模块：weixin  home
    public function updateOrderNumberById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('order_id='.$id)->save($data);
    }

    //使用模块：admin
    public function updateMenuById($id, $data) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)) {
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('order_id='.$id)->save($data);
    }    
}