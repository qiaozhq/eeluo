<?php
namespace Home\Controller;
use Think\Controller;
class FranchiseeController extends CommonController {
    public function index(){
        $franchiseeCats = D("FranchiseeCat")->getHomeFranchiseeCats();
        $franchisees = D("Franchisee")->getHomeFranchisees(); 
        $this->assign('result', array(
            'franchiseeCats' => $franchiseeCats,
            'franchisees' => $franchisees,
        ));    
        $this->display();
    }

    public function detail(){
        $id = $_GET['id'];
        $franchisee = D("Franchisee")->find($id); 
        $this->assign('franchisee',$franchisee);  
        $this->display();
    }      
}