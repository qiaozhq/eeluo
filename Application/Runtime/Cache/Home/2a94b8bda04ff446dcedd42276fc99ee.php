<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo ($basic["description"]); ?>">
  <meta name="author" content="大连久诚卓慧有限公司">
  <meta name="keywords" content="<?php echo ($basic["keywords"]); ?>">
  <link rel="shortcut icon" href="/Public/images/favicon.ico">
  <link rel="Bookmark" href="/Public/images/favicon.ico">
  <title><?php echo ($basic["title"]); ?></title>
  <link href="/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="/Public/css/home/animate.css?version=<?php echo ($basic["md5version"]); ?>" rel="stylesheet">
  <link href="/Public/css/home/main.css?version=<?php echo ($basic["md5version"]); ?>" rel="stylesheet">
  <link href="/Public/css/home/job.css?version=<?php echo ($basic["md5version"]); ?>" rel="stylesheet">
</head>
<body style="">
<!-- 导航区域开始 -->
<div class="navbar regular">
	<div class="container">
		<div class="navbar-logo-w">
			<img src="/Public/images/home/pc_logo_s.png" class="animated fadeInDown">
		</div>
		<div class="navbar-logo">
			<img src="/Public/images/home/pc_logo_b.png" class="animated fadeInDown">
		</div>
		<ul class="navbar-items">
			<li class="">
				<div class="led"></div>
				<a href="#hero">首页</a>
			</li>
			<li class="">
				<div class="led"></div>
				<a href="#contact">公司介绍</a>
			</li>
			<li class="">
				<div class="led"></div>
				<a href="#apps">产品服务</a>
			</li>
			<li class="">
				<div class="led"></div>
				<a href="#job">招聘信息</a>
			</li>
			<li class="">
				<div class="led"></div>
				<a href="#cooperation">联系我们</a>
			</li>
		</ul>
	</div>
</div>
<a href="#" class="collapse-button">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
<div class="snap-drawers">
<!-- 模态框（Modal） -->
<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?><div class="modal fade" id="<?php echo ($product["product_id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					<?php echo ($product["title"]); ?>
				</h4>
			</div>
			<div class="modal-body">
				<?php echo ($product["content"]); ?>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<div class="snap-drawer snap-drawer-right">
		<div>
			<ul class="navbar-items">
				<li>
					<a href="#hero">首页</a>
				</li>
				<li>
					<a href="#contact">公司介绍</a>
				</li>
				<li>
					<a href="#apps">产品服务</a>
				</li>
				<li>
					<a href="#job">招聘信息</a>
				</li>
				<li>
					<a href="#cooperation">联系我们</a>
				</li>
			</ul>
			<div style="position:absolute; bottom:0">
				<p>久诚卓慧有限公司</p>
			</div>
		</div>
	</div>
</div>
<!-- 导航区域结束 -->
<div class="snap-content">
	<!-- 顶部区域 -->
	<div id="hero" style="background: url(<?php echo ($basic["thumb"]); ?>) no-repeat top center;">
		<div class="container">
			<div class="logo">
				<span class="animated zoomIn">大连久诚卓慧</span>
			</div>
			<h1 class="animated bounceInLeft delay05" style="margin-bottom:10%;">长久 诚信 卓越 智慧</h1>
			
			<div class="animated fadeIn delay2" style="width:100%;position:fixed;bottom:5%;text-align: center;color:#90A4AE;font-size: 1.2em;">
			</div>
		</div>
	</div>
	<!-- 公司介绍,团队介绍 -->
	<div class="section" id="contact">
		<div class="title">
			<h2>公司介绍</h2>
		</div>
		<p id="us" style="opacity:1;transition:all 0.2s linear;"><?php echo ($basic["computer"]); ?>
		</p>
	</div>
	<div class="section" id="team">
		<div class="title">
			<h2>我们的团队</h2>
			<p><?php echo ($basic["team"]); ?></p>
		</div>
		<div id="photo-wall">
			<ul>
				<?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><li class="team-list">
						<img class="photos img-responsive img-circle" src="<?php echo ($user["thumb"]); ?>">
						<h4 class="name"><?php echo ($user["name"]); ?></h4>
						<h5 class="job"><?php echo ($user["job"]); ?></h5>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<!-- 产品服务 -->
	<div id="apps">
		<ul>
			<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?><li class="<?php if($i%2==1): ?>text-first<?php else: ?>pic-first<?php endif; ?>">
					<div class="container">
						<div class="text">
							<h3 style="text-align: left;"><?php echo ($product["title"]); ?></h3>
							<?php echo ($product["description"]); ?>
						</div>
						<div class="pics animated" style="opacity: 1;">
							<img src="<?php echo ($product["thumb"]); ?>">
							<a class="readDetail" style="right:27%;"  data-toggle="modal" data-target="#<?php echo ($product["product_id"]); ?>">查看详情</a>
						</div>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<!-- 招聘信息 -->
	<?php if(is_array($jobs)): $i = 0; $__LIST__ = $jobs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jobs): $mod = ($i % 2 );++$i;?><div class="m-job" id="job">
			<div class="basic-info">
				<h2 class="job-title"><?php echo ($jobs["title"]); ?></h2>
				<span class="post-date">发布时间：<?php echo ($jobs["publishtime"]); ?></span>
				<table class="job-params">
					<colgroup>
					<col width="110">
					<col>
					<col width="110">
					<col>
				</colgroup>
				<tbody><tr>
					<th>职位类别：</th>
					<td><?php echo ($jobs["type"]); ?></td>
					<th>最低学历：</th>
					<td><?php echo ($jobs["education"]); ?></td>
				</tr>
				<tr>
					<th>工作地点：</th>
					<td><?php echo ($jobs["address"]); ?></td>
					<th>工作年限：</th>
					<td><?php echo ($jobs["workyears"]); ?></td>
				</tr>
				<tr>
					<th>招聘人数：</th>
					<td><?php echo ($jobs["number"]); ?></td>
					<th>工作类型：</th>
					<td><?php echo ($jobs["worktype"]); ?></td>
				</tr>
			</tbody></table>
		</div>
		<div class="detail-info">
			<div class="detail-section">
				<h3 class="section-title">岗位描述</h3>
				<div class="section-content"><?php echo (formatwork($jobs["workinfo"])); ?></div>
			</div>
			<div class="detail-section">
				<h3 class="section-title">岗位要求</h3>
				<div class="section-content"><?php echo (formatwork($jobs["workrequire"])); ?></div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!-- 联系我们 -->
		<div class="section" id="cooperation" style="padding:50px">
			<div class="col-md-3"></div>
			<div class="col-xs-12 col-md-3">
				<h3>关于</h3>
				<p>地址:<?php echo ($basic["address"]); ?></p>
				<p>邮编:<?php echo ($basic["zipcode"]); ?></p>
				<p>电话:<?php echo ($basic["tel"]); ?></p>
				<p>传真:<?php echo ($basic["fax"]); ?></p>
				<p>E-mail:<?php echo ($basic["mail"]); ?></p>
			</div>
			<div class="col-xs-12 col-md-3">
				<h3>服务</h3>
				<?php if(is_array($service)): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><p><?php echo ($s); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="col-md-3"></div>				
		</div>
	</div>
<script src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/home/vendor.js?version=<?php echo ($basic["md5version"]); ?>"></script>
<script src="/Public/js/home/main.js?version=<?php echo ($basic["md5version"]); ?>"></script>

<script type="text/javascript">
	$('a[href=#contact]').hover(function() {
		setTimeout(function() {
			$('#us').animate({
				opacity: '1'
			})
		}, 1200)
	})
	$('#contact').hover(function() {
		$('#us').animate({
			opacity: '1'
		});
	})
	$('#launcher1').hover(function() {
		$('#us').animate({
			opacity: '1'
		});
	})

	function c() {
		var a = $('h4').length
		var name = ''
		name += "<ol style='list-style-type:decimal'>"
		for(var i = 0; i < a; i++) {
			name += "<li>"
			name += $('h4').eq(i).html();
			name += "</li>"
		};
		name += "</ol>"
		$('#photo-wall').append(name);
		console.log(name);
	}
	$('#app-start').click(function() {
		$('a[href=#apps]').click();
	})
	$('#apps h3:nth-of-type(odd)').css('text-align', 'left');
</script>
</body>
</html>