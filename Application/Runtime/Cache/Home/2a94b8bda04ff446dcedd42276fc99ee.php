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
<link rel="stylesheet" href="/Public/css/normalize.css" />
<link rel="stylesheet" href="/Public/css/default.css">
<link rel="stylesheet" href="/Public/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/Public/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="/Public/css/site.css"/>
<div class="container">
	<div class="col-xs-3 col-sm-3" >
		<ul class="nav nav-pills nav-stacked">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="#">SVN</a></li>
		  <li><a href="#">iOS</a></li>
		  <li><a href="#">VB.Net</a></li>
		  <li><a href="#">Java</a></li>
		  <li><a href="#">PHP</a></li>
		</ul>
	</div>
	<div class="col-xs-9 col-sm-9" >
		<?php if(is_array($result['main'])): $i = 0; $__LIST__ = $result['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="jumbotron">
		        <h1><?php echo ($vo["title"]); ?></h1>
		        <p><?php echo ($vo["content"]); ?></p>
		        <img class="img-responsive" src="<?php echo ($vo["thumb"]); ?>" />
		   </div><?php endforeach; endif; else: echo "" ;endif; ?>
   </div>
</div>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';"></div>
<script src="/Public/js/home/news.js"></script>
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