<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends CommonController {
    public function index(){ 
        $componyNews = D("News")->getComponyNews();
        $industryNews = D("News")->getIndustryNews();    
        $this->assign('result', array(
            'componyNews' => $componyNews,
            'industryNews' => $industryNews,
        ));
        $this->display();
    }
    public function detail(){
        $id = $_GET['id'];
        $new = D("News")->find($id); 
        $this->assign('new',$new);  
        $this->display();
    }
}