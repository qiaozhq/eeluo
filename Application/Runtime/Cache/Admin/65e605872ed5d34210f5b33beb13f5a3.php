<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="Shortcut Icon" href="/Public/images/favicon.ico">
    <link rel="Bookmark" href="/Public/images/favicon.ico">
    <title>e络工作室-后台管理系统</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/sing/common.css" />
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

  <?php
 $navs = D("Menu")->getAdminMenus(); $username = getLoginUsername(); foreach($navs as $k=>$v) { if($v['c'] == 'admin' && $username != 'admin') { unset($navs[$k]); } if($v['c'] == 'menu' && $username != 'admin') { unset($navs[$k]); } if($v['c'] == 'position' && $username != 'admin') { unset($navs[$k]); } } $index = 'index'; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >e络工作室-后台管理系统</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getLoginUsername()?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/admin.php?c=analysis"><i class="fa fa-fw fa-dashboard"></i> 统计</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navo): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($navo["c"])); ?>>
        <a href="<?php echo (getAdminMenuUrl($navo)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i> <?php echo ($navo["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>

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
              <i class="fa fa-dashboard"></i>用户管理
            </li>
            <li class="active">
              <i class="fa fa-table"></i>用户列表
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
                  <th>id</th>
                  <th>用户名</th>
                  <th>微信id</th>
                  <th>分类</th>
                  <th>注册时间</th>                                 
                  <th>最后登陆ip</th>                 
                  <th>最后登陆时间</th>
                  <th>电话</th>
                  <th>邮箱</th>              
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr>                   
                    <td><?php echo ($user["user_id"]); ?></td>
                    <td><?php echo ($user["username"]); ?></td>
                    <td><?php echo ($user["openid"]); ?></td>
                    <td><?php echo (level($user["level"])); ?></td>
                    <td><?php echo (create_time($user["create_time"])); ?></td>                    
                    <td><?php echo ($user["lastloginip"]); ?></td>
                    <td><?php echo (create_time($user["lastlogintime"])); ?></td>
                    <td><?php echo ($user["phone"]); ?></td>
                    <td><?php echo ($user["email"]); ?></td>        
                    <td><span class="sing_cursor glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($user["user_id"]); ?>" ></span>
                      <a href="javascript:void(0)" id="singcms-delete"  attr-id="<?php echo ($user["user_id"]); ?>"  attr-message="删除">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                      </a>
                    </td>

                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
              </table>
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
    'edit_url' : '/admin.php?c=user&a=edit',
    'add_url' : '/admin.php?c=user&a=add',
    'set_status_url' : '/admin.php?c=user&a=setStatus',
    'listorder_url' : '/admin.php?c=user&a=listorder',
    'push_url' : '/admin.php?c=user&a=push',
  }
</script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>