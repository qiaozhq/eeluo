<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, minimum-scale=1,user-scalable=no, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php echo ($basic["description"]); ?>">
  <meta name="author" content="e络工作室">
  <meta name="keywords" content="<?php echo ($basic["keywords"]); ?>">
  <link rel="shortcut icon" href="/Public/images/favicon.ico">
  <link rel="Bookmark" href="/Public/images/favicon.ico">
  <title><?php echo ($basic["title"]); ?></title>
  <link href="/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/Public/css/home/style(1).css?version=<?php echo ($basic["md5version"]); ?>" type="text/css">
  <link rel="stylesheet" href="/Public/css/home/style.css?version=<?php echo ($basic["md5version"]); ?>" type="text/css">
</head>
<body class="archive category category-phones category-3 custom-background wp-custom-logo">
<div id="wrapper">
  <header id="header" class="site-header" role="banner">
   <div class="container">
     <div id="navbar" class="navbar islemag-sticky">
      <nav id="site-navigation" class="navigation main-navigation" role="navigation">
       <div class="menu-main-menu-container">
         <ul id="primary-menu" class="nav-menu" aria-expanded="false">
          <li id="menu-item-91" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-91">
          <img src="/Public/images/logo.png" class="logo" alt="">
          </li>
          <li id="menu-item-91" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-91"><a href="/index.html">首页</a>
           </li>
          <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li id="menu-item-91" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-91"><a href="/main.html?cat=<?php echo ($menu["menu_id"]); ?>"><?php echo ($menu["name"]); ?></a>
           </li><?php endforeach; endif; else: echo "" ;endif; ?>
       </ul>
     </div>       
   </nav><!-- #site-navigation -->
 </div><!-- #navbar -->
</div>
<style>
.logo{
  height: 55px;
}
</style>
</header><!-- End #header -->
<div class="site-content container">
	<div class="container">
		<div class="row">
			<div class="islemag-content-left col-md-8">
				<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><div class="islemag-section
				2	">
				<h2 class="title-border title-bg-line  mb30">
					<span><?php echo ($menu["name"]); ?></span>
				</h2>
				<div class="post-section islemag-template2">
					<div class="row">
						<?php if(is_array($push)): $i = 0; $__LIST__ = $push;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo['category']) == $menu["menu_id"]): ?><div class="col-sm-6">
								<article class="entry entry-overlay entry-block eb-small">
									<div class="entry-media">
										<a href="/main/detail.html?id=<?php echo ($vo["main_id"]); ?>" class="category-block" ><?php echo getParentMenuName($vo['category'],$menus);?></a>
										<figure>
											<a href="/main/detail.html?id=<?php echo ($vo["main_id"]); ?>">
												<img src="<?php echo ($vo["thumb"]); ?>" alt="">
											</a>
										</figure> <!-- End figure -->
									</div> <!-- End .entry-media -->

									<h3 class="entry-title"><a href="/main/detail.html?id=<?php echo ($vo["main_id"]); ?>"><?php echo ($vo["title"]); ?></a></h3>
									<div class="entry-meta">
										<span class="entry-overlay-date"><i class="fa fa-calendar-o"></i><?php echo ($vo["update_time"]); ?></span>
										<span class="entry-separator">|</span>
										<a href="/main/detail.html?id=<?php echo ($vo["main_id"]); ?>" class="entry-comments"><i class="fa fa-comment-o"></i><?php echo ($vo["count"]); ?></a>
									</div> <!-- End .entry-meta -->
								</article> <!-- End .entry-block -->
							</div> <!-- End .col-sm-6 --><?php endif; endforeach; endif; else: echo "" ;endif; ?>

					</div> <!-- End .row -->
				</div> <!-- End .post-section -->
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="reviewzine-pagination"></div>		
		</div><!-- End .islemag-content-left -->

		<aside class="sidebar islemag-content-right col-md-4" role="complementary">
	<div id="categories-3" class="widget widget_categories">
		<h3 class="title-border dkgreen title-bg-line">
			<span>Categories</span>
		</h3>		
		<ul>
			<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="cat-item cat-item-6"><a href="/main.html?cat=<?php echo ($menu["menu_id"]); ?>"><?php echo ($menu["name"]); ?></a> <?php echo ($menu["count"]); ?>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div id="tag_cloud-2" class="widget widget_tag_cloud">
		<h3 class="title-border dkgreen title-bg-line">
			<span>Tags</span>
		</h3>
		<div class="tagcloud">
			<a href="#" class="tag-cloud-link tag-link-16 tag-link-position-1" style="font-size: 8pt;" aria-label="dangerous (1 item)">dangerous</a>
		</div>
	</div>
</aside><!-- #secondary -->
</div><!-- End .row -->
</div><!-- End .container -->
</div><!-- #content -->
<!-- 联系我们 -->
<div class="section" id="cooperation" style="padding:50px">
	<div class="col-md-3"></div>
	<div class="col-xs-12 col-md-3">
		<h3>关于</h3>
	</div>
	<div class="col-xs-12 col-md-3">
		<h3>Tags</h3>
		<?php if(is_array($service)): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><p><?php echo ($s); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="col-md-3"></div>				
</div>
</div>
<script src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/home/main.js?version=<?php echo ($basic["md5version"]); ?>"></script>
</body>
</html>