<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo ($basic["keywords"]); ?>" />
<meta name="description" content="<?php echo ($basic["description"]); ?>" />
<link rel="Shortcut Icon" href="/Public/images/favicon.ico">
<link rel="Bookmark" href="/Public/images/favicon.ico">
<title><?php echo ($basic["title"]); ?></title>
<link href="/Public/css/bootstrap.css" rel='stylesheet'/>
<link href="/Public/css/header.css" rel='stylesheet'/>
<script src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/home/header.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript"> 
window.location.href="http://www.blcyw.com/browser"; 
</script> 
<![endif]-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?8f52653d7b1e35be45146bf0f19ea3dd";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>
<body>
<div class="container-fluid header-top">
    <div class="container">
        <img id="loginImg" style="background:#87DB47;height:21px;width:21px;overflow:hidden;display:none" class="btn img-responsive" data-toggle="modal" data-target="#myModal4" src="/Public/images/login.jpg">
        <div id="userinImg" style="display:none" class="dropdown">
        <img class="btn dropdown-toggle" src="/Public/images/userin.jpg" data-toggle="dropdown" style="background:#87DB47;height:21px;width:21px;overflow:hidden">
          <ul class="dropdown-menu">
            <li>
              <a href="/user/index.html"><i class="fa fa-fw fa-user"></i> 个人信息</a>
            </li>
            <li>
              <a href="/user/updpas.html"><i class="fa fa-fw fa-user"></i> 修改密码</a>
            </li>            
            <li>
              <a href="/product/cartDetail.html"><i class="fa fa-fw fa-user"></i> 购物车</a>
            </li>
            <li>
              <a href="/product/orderDetail.html"><i class="fa fa-fw fa-user"></i> 我的订单</a>
            </li>               
            <li class="divider"></li>
            <li>
              <a href="/user/loginout.html"><i class="fa fa-fw fa-power-off"></i> 退出</a>
            </li>
          </ul>
        </div>       
        <img class="btn" data-toggle="modal" data-target="#myModal2" style="background:#87DB47;height:21px;width:21px" src="/Public/images/wx.png">
        <img class="btn" data-toggle="modal" data-target="#myModal3" style="background:#87DB47;height:21px;width:21px" src="/Public/images/wx.jpg">
    </div>
</div>
<nav class="navbar navbar-default top-header" role="navigation">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
            <a id ="logo" class="navbar-brand" href="#"><img src="/Public/images/logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
        	<li class="logo"><img src="/Public/images/logo.png"></li>
			<li><a href="/index.html">首页</a></li>
			<li><a href="/news/index.html">e络软件</a></li>
			<li><a href="/news/index.html">技术博客</a></li>	
			<li><a href="/product/index.html">e络杂谈</a></li>
			<li><a href="/franchisee/index.html">环境大全</a></li>
			<li><a href="/partener/index.html">框架大全</a></li>
			<li><a href="/contact/index.html">模块大全</a></li> 
      <li><a href="/contact/index.html">e络教学</a></li> 
        </ul>
    </div>
    </div>
</nav>
<script type="text/javascript" src="/Public/js/jQuery.asyncLoading.js"></script>
<style type="text/css">
.product{
    font-size: 1em; 
    margin-bottom: 1em;
}
.product .col-md-3{
    margin-bottom: 1em;
}
.product a{
    color: black;
}
#myTab li{
    padding-left: 15px;
}
#myTab .active a{
    background: #d10101;
}
#myTab li a{
    background: url(/Public/images/icons29.png) repeat;
    color: white;
}
.scrollLoading{
    height: 292px;
    margin: 0 auto;
}
#myTabContent h4{
    height: 2em;
}
#myTabContent .col-md-3{
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    margin-bottom: 0;
}
#hide-left{
    position: fixed;
    z-index: 99;
    transition: left 2s;
    -moz-transition: left 2s; /* Firefox 4 */
    -webkit-transition: left 2s; /* Safari 和 Chrome */
    -o-transition: left 2s; /* Opera */    
}
#myTab{
    float: left;
    height: 500px;
    overflow: scroll;
}
.hide-left-cls{
    left: -300px;
}
.show-left-cls{
    left: 0;
}
#hide-left img{
    float: left;
    margin-top: 100%;
    cursor: pointer;
}
#show-left-img{
    position: fixed;
    z-index: 99;
    left: -50px;
    margin-top: 220px;   
    transition: left 5s;
    -moz-transition: left 5s; /* Firefox 4 */
    -webkit-transition: left 5s; /* Safari 和 Chrome */
    -o-transition: left 5s; /* Opera */      
}

</style>
<!-- <div class="container product">
    <img id="show-left-img" src="/Public/images/icons11.png">  
    <div id="hide-left" class="show-left-cls">
    <ul id="myTab" class="nav nav-tabs nav-stacked">
        <?php if(is_array($result['productCats'])): $i = 0; $__LIST__ = array_slice($result['productCats'],0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="active">
            <a href="#<?php echo ($vo["product_cat_id"]); ?>" data-toggle="tab"><?php echo ($vo["product_cat_name"]); ?></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($result['productCats'])): $i = 0; $__LIST__ = array_slice($result['productCats'],1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <a href="#<?php echo ($vo["product_cat_id"]); ?>" data-toggle="tab"><?php echo ($vo["product_cat_name"]); ?></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>        
    </ul>
    <img id="hide-left-img" class="img-responsive" src="/Public/images/icons10.png" alt="">  
    </div>
     <p id="addtoCartP" class="btn" data-toggle="modal" data-target="#myModal5" style="display:none"></p>
    <div id="myTabContent" class="tab-content">
        <?php if(is_array($result['productCats'])): $i = 0; $__LIST__ = $result['productCats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == 1): ?><div class="tab-pane fade in active" id="<?php echo ($vo["product_cat_id"]); ?>">
        <?php else: ?>
        <div class="tab-pane fade in" id="<?php echo ($vo["product_cat_id"]); ?>"><?php endif; ?>
            <?php if(is_array($result['products'])): $i = 0; $__LIST__ = $result['products'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i; if(($vo["product_cat_id"]) == $po["catid"]): ?><div class="col-md-3" attrid="<?php echo ($po["product_id"]); ?>">
                        <a name="linkdetail" linkid="<?php echo ($po["product_id"]); ?>"><img class="img-responsive scrollLoading" data-url="<?php echo ($po["thumb"]); ?>" name="thumb" src="/Public/images/load.gif"/></a>
                        <h4><a name="linkdetail" linkid="<?php echo ($po["product_id"]); ?>"><?php echo ($po["product_name"]); ?></a></h4>
                        <div>
                        <p style="display:inline-block;margin-bottom:0">单价：¥<span name="productprice" style="display:inline-block;color:red;height:100%"><?php echo ($po["product_price"]); ?></span></p>
                        <img class="addtoCart" attrid="<?php echo ($po["product_id"]); ?>" style="padding-left:0;height:100%;cursor: pointer;" src="/Public/images/gouwuche.jpg">
                        </div>
                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>        
    </div>
</div> -->
<div class="container product">
    <img id="show-left-img" src="/Public/images/icons11.png">  
    <div id="hide-left" class="show-left-cls">
    <ul id="myTab" class="nav nav-tabs nav-stacked">
        <li class="active">
            <a href="#999" data-toggle="tab">热销商品</a>
        </li>
        <?php if(is_array($result['productCats'])): $i = 0; $__LIST__ = $result['productCats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <a href="#<?php echo ($vo["product_cat_id"]); ?>" data-toggle="tab"><?php echo ($vo["product_cat_name"]); ?></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>        
    </ul>
    <img id="hide-left-img" class="img-responsive" src="/Public/images/icons10.png" alt="">  
    </div>
     <p id="addtoCartP" class="btn" data-toggle="modal" data-target="#myModal5" style="display:none"></p>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="999">
        <?php if(is_array($result['rxproducts'])): $i = 0; $__LIST__ = $result['rxproducts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i;?><div class="col-md-3" attrid="<?php echo ($po["product_id"]); ?>">
                <a name="linkdetail" linkid="<?php echo ($po["product_id"]); ?>"><img class="img-responsive scrollLoading" data-url="<?php echo ($po["thumb"]); ?>" name="thumb" src="/Public/images/load.gif"/></a>
                <h4><a name="linkdetail" linkid="<?php echo ($po["product_id"]); ?>"><?php echo ($po["product_name"]); ?></a></h4>
                <div>
                <p style="display:inline-block;margin-bottom:0">单价：¥<span name="productprice" style="display:inline-block;color:red;height:100%"><?php echo ($po["product_price"]); ?></span></p>
                <img class="addtoCart" attrid="<?php echo ($po["product_id"]); ?>" style="padding-left:0;height:100%;cursor: pointer;" src="/Public/images/gouwuche.jpg">
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>  
        <?php if(is_array($result['productCats'])): $i = 0; $__LIST__ = $result['productCats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tab-pane fade in" id="<?php echo ($vo["product_cat_id"]); ?>">
            <?php if(is_array($result['products'])): $i = 0; $__LIST__ = $result['products'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i; if(($vo["product_cat_id"]) == $po["catid"]): ?><div class="col-md-3" attrid="<?php echo ($po["product_id"]); ?>">
                        <a name="linkdetail" linkid="<?php echo ($po["product_id"]); ?>"><img class="img-responsive scrollLoading" data-url="<?php echo ($po["thumb"]); ?>" name="thumb" src="/Public/images/load.gif"/></a>
                        <h4><a name="linkdetail" linkid="<?php echo ($po["product_id"]); ?>"><?php echo ($po["product_name"]); ?></a></h4>
                        <div>
                        <p style="display:inline-block;margin-bottom:0">单价：¥<span name="productprice" style="display:inline-block;color:red;height:100%"><?php echo ($po["product_price"]); ?></span></p>
                        <img class="addtoCart" attrid="<?php echo ($po["product_id"]); ?>" style="padding-left:0;height:100%;cursor: pointer;" src="/Public/images/gouwuche.jpg">
                        </div>
                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>        
    </div>
</div>
<!-- 模态框（Modal） 购物车-->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel5">加入购物车</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    <img class="img-responsive" id="modthumb" src="">
                </div>
                <div class="col-md-6" style="text-align:left" id="productmodl">
                    <p id="productid" style="display:none"></p>
                    <p class="productinfo">【产品名称】 <span name="name">车载用品04</span></p>
                    <p class="productinfo" >【产品价格】 ¥<span name="price">466</span></p>   
                    <p class="productinfo" style="display:inline-block">【购买数量】</p>
                    <input id="amount" style="IME-MODE: disabled; WIDTH: 60px;" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" value=1 maxlength="5" size="14" name="amount" type="text" />
                    <button class="btn" style="display:block" type="button" onclick="product.cart()">确定</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script src="/Public/js/home/product.js"></script>
<style type="text/css">
.contact-block {
    background-color: #e3e4e5;
    margin-top: 10px;
    font-size: 0.8rem;  
    padding-top: 10px;
}
.contact-block li{
	padding: 0;
	margin-bottom:0px;
}
.contact-block img{
    width: 22px;
    padding: 0;
}

.contact-bottom a{
	color: white;
}
.contact-bottom a:hover{
	text-decoration: none;
}
#myModal{
	color: black;
}
.modal-dialog,.modal-content,.modal-body{
	width: 100%;
	height: 100%;
}
.btn-link{
	color: white;
}
.btn-link:hover{
	text-decoration: none;
	color: white;
}
#myModal2{
	width: 400px;
	height: 300px;
	margin: 0 auto;
	overflow-y: hidden;
}
#myModal3{
	width: 400px;
	height: 400px;
	margin: 0 auto;
	overflow-y: hidden;
}
@media (max-width: 400px) {
	#myModal2,#myModal3{
		width: 100%;
	}
}
.modal-body {
    text-align: center;
}
#allmap label{
	max-width:none;
}
#myModal4 .modal-dialog{
    text-align: center;
}
#myModal4 .modal-content{
    display: inline-block;
    width: auto;
    height: auto;
}
#myModal4 .modal-body {
    display: inline-block;
}
#myModal4 form{
	display: inline-block;
}
.productinfo{
	text-align: left;
}
#myModal5 .modal-dialog{
    text-align: center;
}
#myModal5 .modal-dialog .modal-content{
    display: inline-block;
    width: auto;
    height: auto;
    padding-bottom: 10px;
}
#myModal5 .modal-header{
	text-align: center;
}
#loginbutton{
    /*background-color: #e60000;*/
	margin-top: 10px;
}
.validate{
    width: 50%;
    float: left;
}
.validateimg{
	height: 34px;
}
.validateimg:hover{
	cursor: pointer;
}
</style>

<div class="container-fluid contact-block">
	<div class="contact-bottom">	
		<ul class="list-inline text-center">
		 <li>Copyright &copy; 2018 e络工作室 All rights reserved&nbsp;|&nbsp;辽ICP备17008595号-1</li>		 		 	 
		</ul>	
	</div>	
</div>

<!-- 模态框（Modal） 分享到微信朋友圈-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel2">分享到微信朋友圈</h4>
            </div>
            <div class="modal-body">
				<img src="/Public/images/qrcode.png">
				<p>打开微信，点击底部的“发现”，使用 “扫一扫” 即可将网页分享到我的朋友圈。</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 模态框（Modal） 关注众赢新业公众号-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel3">关注众赢新业公众号</h4>
            </div>
            <div class="modal-body">
				<img src="/Public/images/gzqrcode.jpg">
				<p>打开微信，点击底部的“发现”，使用 “扫一扫” 即可关注。</p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 模态框（Modal） 用户登录-->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">用户登录</h4>
            </div>
            <div class="modal-body">
			    <form class="form-signin" method="post">
			      <label class="sr-only">用户名</label>
			      <input type="text"  class="form-control" name="username" placeholder="请填写用户名" required autofocus>
			      <br />
			      <label  class="sr-only">密码</label>
			      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
			      <br />
		          <label class="sr-only">验证码</label>
		          <input type="text" class="form-control validate" name="validate" placeholder="验证码"  required autofocus>
		          <img class="validateimg" title="点击刷新" src='/validate/doimg.html'
		          onclick="this.src='/validate/doimg/'+Math.random();"></img>
			      <button id="loginbutton" class="btn btn-lg btn-primary btn-block" type="button" onclick="login.check()">登录</button>
			    </form>			
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script src="/Public/js/home/footer.js"></script>
<script src="/Public/js/home/common.js"></script>
<script src="/Public/js/home/login.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
</body>
</html>