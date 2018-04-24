<?php
namespace Home\Controller;
use Think\Controller;
class PartenerController extends CommonController {
    public function index(){
        $partenerCats = D("PartenerCat")->getHomePartenerCats();
        $parteners = D("Partener")->getHomeParteners();    
        $this->assign('result', array(
            'partenerCats' => $partenerCats,
            'parteners' => $parteners,
        ));    
        $this->display();
    }
    
    public function detail(){
        $basic = D("Basic")->select();
        $this->assign('basic', $basic);
        $id = $_GET['id'];
        $partener = D("Partener")->find($id); 
        $this->assign('partener',$partener);  
        $this->display();
    }      
}