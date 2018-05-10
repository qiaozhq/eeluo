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
    <title>e络工作室-后台管理系统</title>
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
    
    <a class="navbar-brand" >e络工作室-官网后台</a>
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
      <li <?php echo setActive('menu');?> >
        <a href="/menu.htm"><i class="fa fa-fw fa-bar-chart-o"></i> 分类管理</a>
      </li>
      <li <?php echo setActive('main');?> >
        <a href="/main.htm"><i class="fa fa-fw fa-bar-chart-o"></i> 数据管理</a>
      </li>
      <li <?php echo setActive('push');?> >
        <a href="/push.htm"><i class="fa fa-fw fa-bar-chart-o"></i> 推荐管理</a>
      </li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
			  <ol class="breadcrumb">
			    <li>
			      <i class="fa fa-dashboard"></i>基本管理
			    </li>
			    <li class="active">
			      <i class="fa fa-table"></i>配置
			    </li>
			  </ol>
			</div>
		</div>
		<!-- /.row -->

		<div class="row">
			<div class="col-lg-6">

				<form class="form-horizontal" id="singcms-form">
					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">站点标题:</label>
						<div class="col-sm-5">
							<input type="text" name="title" value="<?php echo ($basic["title"]); ?>" class="form-control" id="title" placeholder="请填写站点标题">
						</div>
					</div>

					<div class="form-group">
						<label for="keywords" class="col-sm-2 control-label">站点关键词:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" value="<?php echo ($basic["keywords"]); ?>" name="keywords" id="keywords" placeholder="请填写站点关键词">
						</div>
					</div>
					<div class="form-group">
						<label for="description" class="col-sm-2 control-label">站点描述:</label>
						<div class="col-sm-5">
							<textarea class="form-control" rows="3" name="description" id="description"><?php echo ($basic["description"]); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="version" class="col-sm-2 control-label">版本管理:</label>
						<div class="col-sm-5">
							<input type="text" name="version" value="<?php echo ($basic["version"]); ?>" class="form-control" id="version" placeholder="请填写站点版本">
						</div>
					</div>
		            <div class="form-group">
		              <label for="inputname" class="col-sm-2 control-label">顶部图片:</label>
		              <div class="col-sm-5">
		                <input id="file_upload"  type="file" multiple="true" >
		                <img id="upload_org_code_img" width="300" height="135" src="<?php echo ($basic["thumb"]); ?>">
		                <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="<?php echo ($basic["thumb"]); ?>">
		              </div>
		            </div>
					<div class="form-group">
						<label for="computer" class="col-sm-2 control-label">公司介绍:</label>
						<div class="col-sm-5">
							<textarea class="form-control" rows="3" name="computer" id="computer"><?php echo ($basic["computer"]); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="team" class="col-sm-2 control-label">团队描述:</label>
						<div class="col-sm-5">
							<textarea class="form-control" rows="3" name="team" id="team"><?php echo ($basic["team"]); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">地址:</label>
						<div class="col-sm-5">
							<input type="text" name="address" value="<?php echo ($basic["address"]); ?>" class="form-control" id="address" placeholder="请填写联系我们的地址信息">
						</div>
					</div>
					<div class="form-group">
						<label for="zipcode" class="col-sm-2 control-label">邮编:</label>
						<div class="col-sm-5">
							<input type="text" name="zipcode" value="<?php echo ($basic["zipcode"]); ?>" class="form-control" id="zipcode" placeholder="请填写联系我们的邮编信息">
						</div>
					</div>	
					<div class="form-group">
						<label for="tel" class="col-sm-2 control-label">电话:</label>
						<div class="col-sm-5">
							<input type="text" name="tel" value="<?php echo ($basic["tel"]); ?>" class="form-control" id="tel" placeholder="请填写联系我们的电话信息">
						</div>
					</div>
					<div class="form-group">
						<label for="fax" class="col-sm-2 control-label">传真:</label>
						<div class="col-sm-5">
							<input type="text" name="fax" value="<?php echo ($basic["fax"]); ?>" class="form-control" id="fax" placeholder="请填写联系我们的传真信息">
						</div>
					</div>
					<div class="form-group">
						<label for="mail" class="col-sm-2 control-label">E-mail:</label>
						<div class="col-sm-5">
							<input type="text" name="mail" value="<?php echo ($basic["mail"]); ?>" class="form-control" id="mail" placeholder="请填写联系我们的E-mail信息">
						</div>
					</div>
					<div class="form-group">
						<label for="service" class="col-sm-2 control-label">服务:</label>
						<div class="col-sm-5">
							<input type="text" name="service" value="<?php echo ($basic["service"]); ?>" class="form-control" id="service" placeholder="请填写联系我们的服务关键词">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
						</div>
					</div>
				</form>


			</div>

		</div>
		<!-- /.row -->

	</div>
	<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript" src="/Public/js/admin/form.js"></script>
<!-- /#wrapper -->
<script src="/Public/js/admin/image.js"></script>
<script>
	var SCOPE = {
		'save_url' : '/basic/save.htm',
		'jump_url' : '/basic.htm',
	    'ajax_upload_image_url' : '/image/ajaxuploadimage.htm',
    	'ajax_upload_swf' : '/Public/js/party/uploadify.swf',
	};
</script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>