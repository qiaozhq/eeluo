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
<style type="text/css">
.partener{
    position: relative;
    padding: 0;
}
.partener img{
    width: 100%;
}
.lasted-box-01 {
    position: absolute;
    height: 60px;
    width: 12%;
    background: url(/Public/images/icons31.png) repeat;
    bottom: -1px;
    left: 0;
}
.lasted-box-02 {
    color: white;
    padding-left: 1em;
    position: absolute;
    height: 60px;
    width: 88%;
    left: 12%;
    bottom: -1px;
    background: url(/Public/images/icons41.png) repeat;
}
.lasted-box-02 span{
    font-size: 0.8em;
}
</style>
<div class="container ">
    <div class="col-md-5 partener">
        <img class="img-responsive" layout="None" src="/Public/images/20158262024554723800.jpg">
        <div class="lasted-box-01"></div>
        <div class="lasted-box-02">
            <p>大连众赢新业企业管理有限公司</p>
            <span>大连市西岗区鞍山路29-19号</span>
        </div> 
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-3">
        <p>邮 编： 116000</p> 
        <p>邮 箱： zhangq@zyxy88.com</p>
        <p>电 话： 0411-65838877</p>
        <p>传 真： 0411-65838877</p>
    </div>       
</div>
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