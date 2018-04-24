<?php
namespace Weixin\Controller;
use Think\Controller;
use Think\Exception;
/*
**代理加盟
*/
class FranchiseeController extends Controller {
    public function __construct() {
        parent::__construct();
    }

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