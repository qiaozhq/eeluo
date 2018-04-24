<?php
/**
 * 推荐位管理
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
class PositioncontentController extends CommonController {
    //推荐位管理首页
    public function index(){
        $positions = D("Position")->getNormalPositions();
        $data['status'] = array('neq', -1);
        $contents = D("PositionContent")->select($data);
        $this->assign('positions', $positions);
        $this->assign('contents', $contents);
        $this->display();
    }

    //删除推荐位
    public function setStatus() {
        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
        );
        $position = D("PositionContent")->find($_POST['id']);
        if(intval($_POST['status'])==-1){//删除推荐位，关联数据删除
            try {
                switch ($position['position_id']) {
                    case 1:
                        D("Product")->updatePStatusById($position['news_id'], 0);
                        break;
                     case 2:
                        D("Franchisee")->updatePStatusById($position['news_id'], 0);
                        break;
                     case 3:
                        D("Partener")->updatePStatusById($position['news_id'], 0);
                        break;              
                    default:
                        break;
                }
            }catch(Exception $e) {
                return show(0, $e->getMessage());
            }
        }
        return parent::setStatus($data, 'PositionContent');
    }

    //推荐位排序处理
    public function listorder() {
        return parent::listorder("PositionContent");
    }
}