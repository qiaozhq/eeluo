<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 推荐管理控制器
 * @author  Alexander
 */
class PushController extends CommonController {
    //推荐信息首页
    public function index() {
        $mains = D("Main")->getPushData('main', 'main_id');
        $this->assign('mains',$mains);
        $menus = D("Menu")->getBarMenus();
        $this->assign('menus',$menus);
        $this->display();
    }


    //排序
    public function pushorder() {
        $listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = array();
        try {
            if ($listorder) {
                foreach ($listorder as $id => $v) {
                    // 执行更新
                    $id = D('Main')->updatePushorderById('main', $id, $v, 'main_id');
                    if ($id === false) {
                        $errors[] = $id;
                    }
                }
                if ($errors) {
                    return show(0, '排序失败-' . implode(',', $errors), array('jump_url' => $jumpUrl));
                }
                return show(1, '排序成功', array('jump_url' => $jumpUrl));
            }
        }catch (Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(0,'排序数据失败',array('jump_url' => $jumpUrl));
    }
}