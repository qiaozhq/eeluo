<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class IndexController extends CommonController {
    public function index($type=''){
        $category = $_GET['id']; 
        $main = D("Main")->getMainByCategory($category);   
        $this->assign('result', array(
            'main' => $main,
        ));
        // $this->display();
        /**
         * 生成页面静态化
         */
        if($type == 'buildHtml') {
            $this->buildHtml('index',HTML_PATH,'Index/index');
        }else {
            $this->display();
        }
    }

    public function build_html() {
        $this->index('buildHtml');
        return show(1, '首页缓存生成成功');
    }
}