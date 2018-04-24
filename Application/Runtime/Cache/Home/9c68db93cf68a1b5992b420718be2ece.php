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
    margin-top: 1em;
    margin-bottom: 1em;  
}
.partener .col-md-3{
    margin-bottom: 1em;
}
.partener p.text-danger{
    opacity: 0.5;
    font-size: 1.5rem;
    font-weight: 600;
    border-bottom: 1px solid #a4a5aa;
}
.text-danger {
    color: #a94442;
}
.padd15{
    padding-right: 15px;
    padding-left: 15px;
    max-width: 1035px;
}
.text-danger1 {
    width: 50%;
    border-bottom: 1px solid #a4a5aa;
}
</style>
<div class="container partener">
<p class="text-danger">合作品牌</p>
<div class="col-md-12">
    <img class="img-responsive" src="/Public/images/partener.jpg"/>
</div> 
<p class="text-danger">死店盘活，活店转旺</p> 
<p class='padd15'> N+N超值购异业联盟，资源整合。</p>
<p class='padd15'> 你有店吗？有店就可以嫁接赚钱！我公司推广的资源整合项目，洗车行，汽车美容店，汽车维修店，干洗店，礼品店，烟酒店，超市，发廊，理疗，按摩，足疗，洗浴，瑜伽，汗蒸，健身房，服装店，药房，饭店，烧烤店，火锅店，酒吧，房屋中介机构，KTV，学前教育机构，等店，加盟合作，死店盘活，零风险，保利润，只要能够在店里腾出一个小地方与我公司合作，免费培训，免费加盟，免费传授独家公司盈利模式，在现有店面利润基础上每年增加收入20-50万</p>    
</div>
<?php if(is_array($result['partenerCats'])): $i = 0; $__LIST__ = $result['partenerCats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="container partener">
        <p class="text-danger"><?php echo ($vo["name"]); ?></p>
        <?php if(is_array($result['parteners'])): $i = 0; $__LIST__ = $result['parteners'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i; if(($vo["partener_cat_id"]) == $po["catid"]): ?><div class="col-md-3">
                    <a href="/partener/detail/id/<?php echo ($po["partener_id"]); ?>.html"><img class="img-responsive" src="<?php echo ($po["thumb"]); ?>"/></a>
                    <h4><a href="/partener/detail/id/<?php echo ($po["partener_id"]); ?>.html"><?php echo ($po["partener_name"]); ?></a></h4>
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
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