<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/Public/images/favicon.ico">
    <link rel="Bookmark" href="/Public/images/favicon.ico">
    <title>大连久诚卓慧-后台管理系统</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/css/admin/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/admin/common.css" />
    <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>

</head>

    



<body>
<div id="wrapper">

  <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >大连久诚卓慧-官网后台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getLoginUsername()?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/adminuser/per.htm"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="/adminuser/pas.htm"><i class="fa fa-fw fa-user"></i> 修改密码</a>
        </li>       
        <li class="divider"></li>
        <li>
          <a href="/login/loginout.htm"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
     <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo setActive('basic');?> >
        <a href="/basic.htm"><i class="fa fa-fw fa-bar-chart-o"></i> 基本管理</a>
      </li>
      <li <?php echo setActive('user');?> >
        <a href="/user.htm"><i class="fa fa-fw fa-bar-chart-o"></i> 团队成员</a>
      </li>
      <li <?php echo setActive('product');?> >
        <a href="/product.htm"><i class="fa fa-fw fa-bar-chart-o"></i> 产品服务</a>
      </li>
      <li <?php echo setActive('job');?> >
        <a href="/job.htm"><i class="fa fa-fw fa-bar-chart-o"></i> 招聘信息</a>
      </li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
  <div id="page-wrapper">

    <div class="container-fluid" >

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>产品服务
            </li>
            <li class="active">
              <i class="fa fa-table"></i>列表
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      <div >
        <button  id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加 </button>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3></h3>
          <div class="table-responsive">
            <form id="singcms-listorder">
              <table class="table table-bordered table-hover singcms-table">
                <thead>
                <tr>
                  <th width="14">排序</th>
                  <th>标题</th>
                  <th>封面图</th>                              
                  <th>简介</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><tr>                   
                    <td><input size=4 type='text'  name='listorder[<?php echo ($new["product_id"]); ?>]' value="<?php echo ($new["listorder"]); ?>"/></td><!--6.7-->
                    <td><?php echo ($new["title"]); ?></td>
                    <td><img width="150px" src="<?php echo ($new["thumb"]); ?>"></td>
                    <td><?php echo ($new["description"]); ?></td>
                    <td><span  attr-status="<?php if($new['status'] == 1): ?>0<?php else: ?>1<?php endif; ?>"  attr-id="<?php echo ($new["product_id"]); ?>" class="sing_cursor singcms-on-off" id="singcms-on-off" ><?php echo (status($new["status"])); ?></span></td>
                    <td><span class="sing_cursor glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($new["product_id"]); ?>" ></span>
                      <a href="javascript:void(0)" id="singcms-delete"  attr-id="<?php echo ($new["product_id"]); ?>"  attr-message="删除">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                      </a>
                      <span class="sing_cursor glyphicon  glyphicon-pencil" aria-hidden="true" id="singcms-edit2" attr-id="<?php echo ($new["product_id"]); ?>" ></span>
                    </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
              </table>
              <div>
                <button  id="button-listorder" type="button" class="btn btn-primary dropdown-toggle" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span>更新排序</button>
              </div>
            </form>    
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script>
  var SCOPE = {
    'edit_url' : '/product/edit.htm',
    'edit2_url' : '/product/editcontent.htm',
    'add_url' : '/product/add.htm',
    'set_status_url' : '/product/setStatus.htm',
    'listorder_url' : '/product/listorder.htm',
  }
</script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>