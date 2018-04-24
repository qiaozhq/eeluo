<?php
namespace Weixin\Controller;
use Think\Controller;
use Think\Exception;
/*
**商务合作
*/
class PartenerController extends Controller {
    public function __construct() {
        parent::__construct();
    }

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
        $id = $_GET['id'];
        $partener = D("Partener")->find($id); 
        $this->assign('partener',$partener);  
        $this->display();
    }     
}