<?php
/**
 * 统计页面
 */
namespace Admin\Controller;
use Think\Controller;
class AnalysisController extends CommonController {
    //统计页面首页
    public function index(){
        //今日登陆用户数
        $adminCount = D("User")->getTodayLoginUsers();
        //商品数
        $productCount = D("Product")->getAdminProductsCount();
        //加盟商数
        $franchiseeCount = D("Franchisee")->getFranchiseesCount();
        //合作商数
        $partenerCount = D("Partener")->getPartenersCount();
        $this->assign('admincount', $adminCount);
        $this->assign('productCount', $productCount);
        $this->assign('franchiseeCount', $franchiseeCount);
        $this->assign('partenerCount', $partenerCount);
        $this->display();
    }
}