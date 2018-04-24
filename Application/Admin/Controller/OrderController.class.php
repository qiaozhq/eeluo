<?php
/**
 * 订单管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class OrderController extends CommonController {
    //订单管理首页
    public function index() {
        $orders = D("Order")->findAll(); 
        $this->assign('orders',$orders);           
        $this->display();
    }

    //订单管理明细页面
    public function detail() {
        $order_number = $_GET['id'];
        $orderDetails = D("Order")->findOneDetail($order_number); 
        $this->assign('orderDetails',$orderDetails);   
        $this->assign('order_number',$order_number);           
        $this->display();
    }

    //取得要修改的订单数据
    public function edit() {
        $order_number = $_GET['id'];
        $order = D("Order")->findOne($order_number);
        $this->assign('order',$order);            
        $this->display();
    }

    //修改订单
    public function save() {
        $order_number = $_POST['order_number'];
        try {
            //根据ordernumber取得该订单明细
            $orderDetails = D("Order")->findOneDetail($order_number);
            //取出id
            foreach ($orderDetails as  $value) {
                $id = $value['order_id'];
                $result = D("Order")->updateMenuById($id, $_POST);
            }
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch(Exception $e) {
            return show(0,$e->getMessage());
        }
    }
    // 数据下载
    public function down() {
        $postData = $_POST['postData'];
        $array=explode(',',$postData);
        $data = array();
        for ($i=0; $i < count($array);) { 
           $arr = array_slice($array,$i,7);
           $data[] = $arr;
           $i = $i+7;
        }
        $title=array("订单号","用户名","微信id","订单时间","订单金额","订单状态","备注");
        $filename='report';
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");  
        header("Content-Disposition:attachment;filename=".$filename.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
        if (!empty($title)){
            foreach ($title as $k => $v) {
                $title[$k]=iconv("UTF-8", "GB2312",$v);
            }
            $title= implode("\t", $title);
            echo "$title\n";
        }
        if (!empty($data)){
            foreach($data as $key=>$val){
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
                }
                $data[$key]=implode("\t ", $data[$key]);
                
            }
            echo implode("\n",$data);
        }
    }
    // 明细数据下载
    public function downdetail() {
        $postData = $_POST['postData'];
        $array=explode(',',$postData);
        $data = array();
        for ($i=0; $i < count($array);) { 
           $arr = array_slice($array,$i,4);
           $data[] = $arr;
           $i = $i+4;
        }
        $title=array("产品名","购买单价","购买数量","金额");
        $filename='detailreport';
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");  
        header("Content-Disposition:attachment;filename=".$filename.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
        if (!empty($title)){
            foreach ($title as $k => $v) {
                $title[$k]=iconv("UTF-8", "GB2312",$v);
            }
            $title= implode("\t", $title);
            echo "$title\n";
        }
        if (!empty($data)){
            foreach($data as $key=>$val){
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
                }
                $data[$key]=implode("\t ", $data[$key]);
                
            }
            echo implode("\n",$data);
        }
    }       
}