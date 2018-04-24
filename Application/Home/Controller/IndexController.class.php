<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class IndexController extends CommonController {
    public function index($type=''){
        $positionProducts = D("PositionContent")->select(array('status'=>1,"position_id"=>1));
        $positionFranchisees = D("PositionContent")->select(array('status'=>1,"position_id"=>2));
        $positionParteners = D("PositionContent")->select(array('status'=>1,"position_id"=>3));
        $this->assign('positionProducts', $positionProducts);
        $this->assign('positionFranchisees', $positionFranchisees);
        $this->assign('positionParteners', $positionParteners);
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