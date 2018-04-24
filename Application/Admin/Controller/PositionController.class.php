<?php
/**
 * 推荐位分类管理
 */
namespace Admin\Controller;
use Think\Controller;
class PositionController extends CommonController {
    //推荐位分类首页
    public function index()
    {
        $data['status'] = array('neq',-1);
        $positions = D("Position")->select($data);
        $this->assign('positions',$positions);
        $this->display();
    }

    //添加/修改推荐位分类
    public function add() {
        if(IS_POST) {
            if(!isset($_POST['name']) || !$_POST['name']) {
                return show(0, '推荐位名称为空');
            }
            if($_POST['id']) {
                return $this->save($_POST);
            }
            try {
                $id = D("Position")->insert($_POST);
                if($id) {
                    return show(1,'新增成功',$id);
                }
                return show(0,'新增失败',$id);
            }catch(Exception $e) {
                return show(0, $e->getMessage());
            }
            return show(0, '新增失败',$newsId);
        }else {
            $this->display();
        }
    }

    //读取要修改的推荐位分类数据
    public function edit() {
        $data = array(
            'status' => array('neq',-1),
        );
        $id = $_GET['id'];
        $position = D("Position")->find($id);
        $this->assign('vo', $position);
        $this->display();
    }

    //修改推荐位分类数据
    public function save($data) {
        $id = $data['id'];
        unset($data['id']);
        try {
            $result = D("Position")->updateById($id,$data);
            if($result === false) {
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
        }catch (Exception $e) {
            return show(0,$e->getMessage());
        }
    }

    //启用/禁用推荐位 status=1 正常 0关闭 -1删除
    public function setStatus() {
        return parent::setStatus($_POST,'Position');
    }    
}