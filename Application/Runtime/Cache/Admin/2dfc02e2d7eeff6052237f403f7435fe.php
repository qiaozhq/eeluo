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
    <title>众赢新业大连总店-后台管理系统</title>
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
    
    <a class="navbar-brand" >众赢新业-后台管理系统</a>
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
  <script src="/Public/js/kindeditor/kindeditor-all-min.js"></script>
  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>新闻管理
            </li>
            <li class="active">
              <i class="fa fa-edit"></i> 添加
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-6">

          <form class="form-horizontal" id="singcms-form">
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label">分类:</label>
              <div class="col-sm-5">
                <select class="form-control" name="catid">
                  <option value='' >==请选择分类==</option>
                    <option value="1">公司新闻</option>
                    <option value="2">行业动态</option>
                </select>
              </div>
            </div>            
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label">标题:</label>
              <div class="col-sm-5">
                <input type="text" name="title" class="form-control" id="inputname" placeholder="请填写新闻标题">
              </div>
            </div>              
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label">简介:</label>
              <div class="col-sm-5">
                <input type="text" name="description" class="form-control" id="inputname" placeholder="请填写新闻简介">
              </div>
            </div> 
                                                    
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label">缩图:</label>
              <div class="col-sm-5">
                <input id="file_upload"  type="file" multiple="true" >
                <img id="upload_org_code_img" width="150" height="150">
                <input id="file_upload_image" name="thumb" type="hidden" multiple="true">
              </div>
            </div>
<!--             <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">内容:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="content" id="inputPassword3" placeholder="请填写新闻内容" >
              </div>
            </div> -->
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">内容:</label>
              <div class="col-sm-5">
                <textarea class="input js-editor" id="editor_singcms" name="content" rows="20" ></textarea>
              </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">状态:</label>
                <div class="col-sm-5">
                    <input type="radio" name="status" id="optionsRadiosInline1" value="1" checked> 开启
                    <input type="radio" name="status" id="optionsRadiosInline2" value="0" > 关闭
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
<script>
  var SCOPE = {
    'save_url' : '/admin.php?c=news&a=add',
    'jump_url' : '/admin.php?c=news',
    'ajax_upload_image_url' : '/admin.php?c=image&a=ajaxuploadimage',
    'ajax_upload_swf' : '/Public/js/party/uploadify.swf',
  };

</script>
<!-- /#wrapper -->
<script src="/Public/js/admin/image.js"></script>
<script>
  // 6.2
  KindEditor.ready(function(K) {
    window.editor = K.create('#editor_singcms',{
      uploadJson : '/admin.php?c=image&a=kindupload',
      afterBlur : function(){this.sync();}, //
    });
  });
</script>
<script>
  var thumb = "<?php echo ($news["thumb"]); ?>";
  if(thumb) {
    $("#upload_org_code_img").show();
  }
</script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>