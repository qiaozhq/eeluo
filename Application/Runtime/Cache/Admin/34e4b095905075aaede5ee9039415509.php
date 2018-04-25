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
  <div id="page-wrapper">

    <div class="container-fluid" >

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">

          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>商品管理
            </li>
            <li class="active">
              <i class="fa fa-table"></i>商品列表
            </li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
      <div >
        <button  id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>添加 </button>
      </div>
      <div class="row">
        <form action="/admin.php" method="get">
          <div class="col-md-3">
            <div class="input-group">
              <span class="input-group-addon">分类</span>
              <select class="form-control" name="catid">
                <option value='' >全部分类</option>
                <?php if(is_array($productCats)): foreach($productCats as $key=>$sitenav): if(($sitenav["product_cat_id"]) == $catid): ?><option value="<?php echo ($sitenav["product_cat_id"]); ?>" selected><?php echo ($sitenav["product_cat_name"]); ?></option>
                  <?php else: ?>
                    <option value="<?php echo ($sitenav["product_cat_id"]); ?>" ><?php echo ($sitenav["product_cat_name"]); ?></option><?php endif; endforeach; endif; ?>
              </select>
            </div>
          </div>
          <input type="hidden" name="c" value="product"/>
          <input type="hidden" name="a" value="index"/>
          <div class="col-md-3">
            <div class="input-group">
              <input class="form-control" name="title" type="text" value="<?php echo ($title); ?>" placeholder="商品名" />
                <span class="input-group-btn">
                  <button id="sub_data" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3></h3>
          <div class="table-responsive">
            <form id="singcms-listorder">
              <table class="table table-bordered table-hover singcms-table">
                <thead>
                <tr>
                  <th id="singcms-checkbox-all" width="10"><input type="checkbox"/></th>
                  <th>推荐</th>
                  <th width="14">排序</th><!--6.7-->
                  <th>id</th>
                  <th>分类</th>
                  <th>商品名</th>
                  <th>零售价格</th>
                  <th>大图</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?><tr>
                    <td><input type="checkbox" name="pushcheck" value="<?php echo ($product["product_id"]); ?>"></td>
                    <td style="color:red" id="<?php echo ($product["product_id"]); ?>" data-value="<?php echo ($product["pstatus"]); ?>">
                    <?php if($product['pstatus'] == 1): ?>推荐<?php else: endif; ?>
                    </td>
                    <td><input size=4 type='text'  name='listorder[<?php echo ($product["product_id"]); ?>]' value="<?php echo ($product["listorder"]); ?>"/></td><!--6.7-->
                    <td><?php echo ($product["product_id"]); ?></td>
                    <?php if(is_array($productCats)): foreach($productCats as $key=>$pc): if(($pc["product_cat_id"]) == $product["catid"]): ?><td><?php echo ($pc["product_cat_name"]); ?></td><?php endif; endforeach; endif; ?>
                    <td><?php echo ($product["product_name"]); ?></td>
                    <td><?php echo ($product["product_price"]); ?></td>
                    <td><img width="150px" src="<?php echo ($product["thumb"]); ?>"></td>
                    <td><span  attr-status="<?php if($product['status'] == 1): ?>0<?php else: ?>1<?php endif; ?>"  attr-id="<?php echo ($product["product_id"]); ?>" class="sing_cursor singcms-on-off" id="singcms-on-off" ><?php echo (status($product["status"])); ?></span></td>
                    <td><span class="sing_cursor glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($product["product_id"]); ?>" ></span>
                      <a href="javascript:void(0)" id="singcms-delete"  attr-id="<?php echo ($product["product_id"]); ?>"  attr-message="删除">
                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                      </a>

                    </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </tbody>
              </table>
              <nav>
                  <ul class="pagination">
                      <?php echo ($pageRes); ?>
                  </ul>
              </nav>
              <div>
                <button  id="button-listorder" type="button" class="btn btn-primary dropdown-toggle" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"></span>更新排序</button>
                <button id="singcms-push" type="button" class="btn btn-primary">推送至热销商品</button>              
              </div>            
            </form>
 <input type="hidden" id="select-push" value="1">            
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
    'edit_url' : '/admin.php?c=product&a=edit',
    'add_url' : '/admin.php?c=product&a=add',
    'set_status_url' : '/admin.php?c=product&a=setStatus',
    'sing_news_view_url' : '/index.php?c=view',
    'listorder_url' : '/admin.php?c=product&a=listorder',
    'push_url' : '/admin.php?c=product&a=push',
  }
</script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>