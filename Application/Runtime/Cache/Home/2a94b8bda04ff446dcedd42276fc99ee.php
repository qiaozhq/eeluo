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
#carousel-example-generic{
	margin-bottom: 2rem;
}
.item img{
	width: 100%;
	min-height: 200px;
}
video{
  width: 100%;
}
.col-md-3{
    margin-bottom: 1em;
}
.carousel-caption {
	text-shadow:none;
}
#about-text{
	margin-top: 2rem;
  font-size: 1.5rem;  	
}
.index-product,.index-franchisee,.index-partener{
	margin-top: 2rem;	
  border: 1px solid rgba(0, 150, 136, 0.27);
}
.index-product .div_title,
.index-franchisee .div_title,
.index-partener .div_title
{  
    background: white;
    width: 50px;
    margin: 0 auto;
    margin-top: -10px;
}
.index-product h3,.index-franchisee h3,.index-partener h3{
	margin-top: -20px;
  margin-bottom: 1rem;
  opacity: 0.5;
  font-size: 1.5rem;
  font-weight: 600;
  text-align: center;
}

.service-box p {
    width: 56%;
}
.service-box p {
    width: 100%;
}
.service-box {
    margin-bottom: 2em;
}

.service-box h5{
  font-size: 1.4em;
  color: #252525;
  margin: 1em 0em 0.5em 0em;
}
.service-box p{
color: #999;
    font-size: 0.9em;
    line-height: 1.8em;
	margin: 0 auto;
    width: 84%;
}
.service-box h5 {
    font-size: 1.2em;
}
.service-box {
    margin-bottom: 2em;
}
.service-box .icon img {
  position: relative;
  z-index: 100;
  transition: all 0.3s ease 0s;
}
.service-box {
  background: none;
  border: none;
  box-shadow: none;
  border-radius: 0;
  /*padding: 0;*/
  overflow: visible;
  text-align: center;
}
.service-box .icon {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background:#dfdfdf;
  margin: 0 auto;
  text-align: center;
  position: relative;	
}
.service-box .icon:before {
  content: '';
  width: 102%;
  height: 102%;
  border-radius: 50%;
  background: #B8D29B;
  position: absolute;
  top: -1px;
  left: -1px;
  z-index: 10;
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);
  transform: scale(0);
  transition: all 0.3s ease 0s;
}
.service-box:hover .icon img {
  -webkit-transform: scale(0.9);
  -moz-transform: scale(0.9);
  -ms-transform: scale(0.9);
  -o-transform: scale(0.9);
  transform: scale(0.9);
}
.service-box:hover .icon:before {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
#about .glyphicon{
  position: relative;
  top: 33px;
  display: inline-block;
  font-style: normal;
  font-weight: normal;
  left: 0px;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  z-index:999;
}
.glyphicon-leaf,.glyphicon-edit:before {
    color:#fff;
    font-size:36px;
}
.glyphicon-hourglass:before{
	color:#fff;
  font-size:30px;
}
pre{
    border-style: none;
/*    width: 100%;
    height: 100%;*/
    white-space: pre-wrap;
    font-family: arial, 微软雅黑;
    font-size: 0.9em;
}
.lunbo-cont a.prev {
    display: block !important;
    position: absolute;
    left: -5%;
    top: 50%;
    margin-top: -17.5px;
    width: 35px;
    height: 35px;
    background: url("/Public/images/icons10.png") no-repeat;
    z-index: 10;
}
a {
    text-decoration: none !important;
}
.lunbo-cont{
  position: relative;
}
.lunbo-cont a.next {
    display: block !important;
    position: absolute;
    right: -5%;
    top: 50%;
    margin-top: -17.5px;
    width: 35px;
    height: 35px;
    background: url("/Public/images/icons11.png") no-repeat;
    z-index: 10;
}
.img{
    height: 292px;
    margin: 0 auto;
}
.row01{
   border:1px solid #006FFF;
}
.row01 .col-md-2{
  background-color: #006FFF;
  color: white;
  font-size: 2em;
  overflow: hidden;
}
.row01 .col-md-2 p:nth-child(1){
  text-align: left;
}
.row01 .col-md-2 p:nth-child(2){
  text-align: right;
} 
.row01 .col-md-10{
  color: #006FFF;
  font-size: 1.5em;
  margin-top: 1em;
}
.row02{
   border:1px solid #E7B63D;
}
.row02 .col-md-2{
  background-color: #E7B63D;
  color: white;
  font-size: 2em;
  overflow: hidden;
}
.row02 .col-md-2 p:nth-child(1){
  text-align: left;
}
.row02 .col-md-2 p:nth-child(2){
  text-align: right;
} 
.row02 .col-md-10{
  color: #E7B63D;
  font-size: 1.5em;
  margin-top: 1em;
  text-align: center;
}
.row03{
   border:1px solid #5DA327;
}
.row03 .col-md-2{
  background-color: #5DA327;
  color: white;
  font-size: 2em;
  overflow: hidden;
}
.row03 .col-md-2 p:nth-child(1){
  text-align: left;
}
.row03 .col-md-2 p:nth-child(2){
  text-align: right;
} 
.row03 .col-md-10{
  color: #5DA327;
  font-size: 1.5em;
  margin-top: 1em;
}
.syline01{
  color: #129AFF;
  font-size: 1.5em;
  text-align: center;

}
.syline02{
  height: 4px;
  background-color: #129AFF;
  margin-bottom: 0;
}
.vline{
  margin: 0;
  padding: 0;
  width: 3px;
  display: inline-block;
  height: 22px;
  background-color: #129AFF;
}
.syline03{
  background-color: #129AFF;
  color: white;
  font-size: 1.5em;
  display: inline-block;

}
.sjxx img{
  width: 100%;
}
.sjxx .col-md-6{
  margin-bottom: 1em;
}
.scqjline01_1,.scqjline01_2,.scqjline01_3{
  color: white;
  font-weight: bold;
  font-size: 2em;
  margin-bottom: 0;
  height: 3em;
  text-align: center;
  padding-top: 0.8em; 
}
.scqjline01_1{
  background-color: #87DB47;
}
.scqjline01_2{
  background-color: #FFB507;
}
.scqjline01_3{
  background-color: #EC1479;
}
.scqjline03{
  font-weight: bold;
}
table{
  width: 100%;
  max-width: 100%;
}
table tr{
  height: 3em;
}
table th{
  background-color: #399AFF;
  color: white;
  font-weight: bold;
  font-size: 1.5em;
  border: 1px solid white;
  text-align: center;
}
table td{
  background-color: #B3D1FF;
  border: 1px solid white;
  text-align: center;
  word-break: break-all;
}
.padd15{
  padding-left: 15px;
}
.marg15{
  margin-left: 15px;
}
.fuline01{
  color: #006FFF;
  font-weight: bold;
}
.fuline03{
  color: #006FFF;
}
.p10,.p20{
  width: 40%;
}
.p10{
  float: left;
}
.p20{
  float: right;
}
.p10-title,.p20-title{
  background-color: #000000;
  color:white;
  font-weight: bold;
  height: 2em;
}
.p10-context{
  color: white;
  font-weight: bold;
  background-color: #76D53B;
  height: 6em;
}
.p20-context{
  color: red;
  font-weight: bold;
  background-color: #76D53B;
  height: 6em;
}
</style>
<!--首页广告区-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/Public/images/gg01.jpg">
      <div class="carousel-caption">
        <h3><?php echo ($basic["adv01title"]); ?></h3>
        <p><?php echo ($basic["adv01description"]); ?></p>
      </div>
    </div>
    <div class="item">
      <img src="/Public/images/gg02.jpg">
      <div class="carousel-caption">
        <h3><?php echo ($basic["adv02title"]); ?></h3>
        <p><?php echo ($basic["adv02description"]); ?></p>
      </div>      
    </div>  
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--公司介绍-->
<div class="container" id="about">
	<div class="col-md-4 service-box" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		<figure class="icon">
			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		</figure>
		<h4><?php echo ($basic["point01title"]); ?></h4>
		<p><?php echo ($basic["point01description"]); ?></p>
	</div>
	<div class="col-md-4 service-box wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		<figure class="icon">
			<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span>
		</figure>
    <h4><?php echo ($basic["point02title"]); ?></h4>
    <p><?php echo ($basic["point02description"]); ?></p>
	</div>
	<div class="col-md-4 service-box wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
		<figure class="icon">
			 <span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>						
		</figure>
    <h4><?php echo ($basic["point03title"]); ?></h4>
    <p><?php echo ($basic["point03description"]); ?></p>
	</div>
</div>
<div class="container about-text">
	<div class="col-md-6">
	 <p><?php echo (str_replace('\"','',$basic["compintro"])); ?></p>
	</div>
	<div class="col-md-6">
    <img class="img-responsive" src="/Public/images/about.jpg"/>
	</div>
</div>
<!--N+N超值购详解-->
<div class="container">
  <h3 style="text-align:center">N+N超值购详解</h3>
  <p class="padd15" style="background:#12A7D2;color:white;font-size:2em">O2O+F2C跨界等额消费服务平台！衣食住用行一站式，卖多少送多少；让消费者消费更实惠、让加盟商经营更轻松。</p>
</div>
<!--N+N超值购服务内容-->
<div class="container">
  <h3 style="text-align:center;">N+N超值购服务内容</h3>
  <div class="row">
    <div class="col-md-5">
      <p class="fuline01">保险业务</p>
      <p class="fuline02">同样的保单、同样的保费、同样的售后；不一样的实惠！</p>
      <div class="fuline03">
        <p class="fuline03-1"><img src="/Public/images/point.jpg" alt="">保险公司及险种选择</p>
        <p class="fuline03-2"><img src="/Public/images/point.jpg" alt="">保险系统报价</p>
        <p class="fuline03-3"><img src="/Public/images/point.jpg" alt="">付款出保单</p>
        <p class="fuline03-4"><img src="/Public/images/point.jpg" alt="">凭保单领等值赠品</p>
      </div>
    </div>
    <div class="col-md-5">
      <img class="img-responsive" src="/Public/images/funr01.jpg" alt="">
    </div>
  </div>
  <div class="row">
  <div class="col-md-5">
    <p class="fuline01">跨界商业联盟 共赢协作互利</p>
    <p class="fuline02">在品牌林立的当下，企业如何脱颖而出？除了自身产品素质过硬以外，更需要优良的增值服务。
    </p>
    <p class="fuline02">众赢新业目前已与保险、零售、旅游等诸多行业领军品牌合作，互赢互助，为品牌企业提供完备的服务，让合作伙伴们在商场上纵横驰骋，无后顾之忧。
    </p>
    <p class="fuline02">公司引进了先进的管理模式，充分调动了各战略合作伙伴的资源，布局全国，给客户带来完善的服务体验，让客户尊享优质服务和名牌商品。
    </p>    
  </div>
  <div class="col-md-5">
    <img class="img-responsive" src="/Public/images/funr03.jpg" alt="">
  </div>
  </div>

</div>
<!--N+N超值购定位-->
<div class="container" style="font-weight:bold">
  <h3 style="text-align:center;">N+N超值购定位</h3>
    <div class="row row01">
      <div class="col-md-2">
        <p>01</p>
        <p>平台</p>
      </div>
      <div class="col-md-10">
        <p>O2O+F2C跨界等额消费服务平台！</p>
      </div>
    </div>

   <div class="row row02"> 
    <div class="col-md-10">
      <p>衣食住行用、360行全搞定！</p>
    </div>
    <div class="col-md-2">
      <p>02</p>
      <p>整合</p>
    </div>
    </div>

    <div class="row row03">
    <div class="col-md-2">
      <p>03</p>
      <p>多赢</p>
    </div>
    <div class="col-md-10">
      <p>让消费者消费更划算、让加盟商经营
    更轻松、让产品销售更容易！</p>
    </div>  
    </div>
</div>
<!--N+N超值购商业模式-->
<div class="container" style="font-weight:bold">
  <h3 style="text-align:center;">N+N超值购商业模式</h3>
  <p class="syline01">10余个品类+50余个品牌+1000款单品</p>
  <hr class="syline02"/>
  <div style="text-align:center;height: 22px;"><p class="vline"></p></div>
  <div style="text-align:center;margin-bottom:2em;"><p class="syline03">厂家直采&nbsp;低价供应</p></div>
  <p class="syline01">旅游+教育+酒店+汽车后市场+房产+生活服务</p>
  <hr class="syline02"/>
  <div style="text-align:center;height: 22px;"><p class="vline"></p></div>
  <div style="text-align:center"><p class="syline03">跨界联盟&nbsp;多重收益</p></div>    
</div>
<!--N+N超值购视觉形象-->
<div class="container sjxx">
  <h3 style="text-align:center;">N+N超值购-视觉形象</h3>
  <div class="col-md-6">
    <img id="sjxx01" class="img-responsive" src="" alt="">
  </div>
  <div class="col-md-6">
    <img id="sjxx02" class="img-responsive" src="" alt="">
  </div>
</div>
<div class="container sjxx">
  <div class="col-md-6">
    <img id="sjxx03" class="img-responsive" src="" alt="">
  </div>
  <div class="col-md-6">
    <img id="sjxx04" class="img-responsive" src="" alt="">
  </div>  
</div>
<div class="container sjxx">
  <div class="col-md-6">
    <img id="sjxx05" class="img-responsive" src="" alt="">
  </div>
  <div class="col-md-6">
    <img id="sjxx06" class="img-responsive" src="" alt="">
  </div>  
</div>
<!--N+N超值购市场前景-->
<div class="container">
  <h3 style="text-align:center;">N+N超值购-市场前景</h3>
  <p class="padd15">市场需求逐年递增！一站式跨界生活服务，更多增值服务嫁接，共同开启千亿级大市场。</p>
  <div class="col-md-6">
    <p class="scqjline01_1">车险业务</p>
    <img id="scqj01" style="width:100%" class="img-responsive" src="" alt="">
    <p class="scqjline03">汽车持有量不断攀升，车险业务需求旺盛</p>
    <p class="scqjline04">据公安部交管局统计,截至2015年底，全国机动车保有量达2.79亿辆。
全国有40个城市的汽车保有量超过百万辆，北京、成都、深圳、上海、重庆、天津、苏州、郑州、杭州广州、西安11个城市汽车保有量超过200万辆。
    </p>
  </div>
  <div class="col-md-6">
    <p class="scqjline01_2">本地商业联盟</p>
    <img id="scqj02" style="width:100%" class="img-responsive" alt="">
    <p class="scqjline03">本地生活服务市场前景可观，开发价值高</p>
    <p class="scqjline04">餐饮、旅游、酒店、电影、KTV、丽人、运动健身、医疗体检、母婴亲子、汽车服务、摄影写真、结婚家装、学习培训等本地服务，在当前消费市场需求旺盛。
    </p>
  </div>  
</div>

<!--N+N超值购市场前景-->
<div class="container">
  <img id="scqj04" style="width:100%" class="img-responsive" src="" alt="">
</div>
<script src="/Public/js/home/index.js"></script>

<script>
  
$(function(){
     //获取浏览器宽度
     var _width = $("div.row02").width(); 
     if(_width < 751){
        $("div.row02").children(".col-md-2").insertBefore($("div.row02").children(".col-md-10"));    //移动节点
     }
});
$(document).ready(function(){
  $('#sjxx01').attr("src","/Public/images/sj01.jpg"); 
  $('#sjxx02').attr("src","/Public/images/sj02.jpg"); 
  $('#sjxx03').attr("src","/Public/images/sj03.jpg"); 
  $('#sjxx04').attr("src","/Public/images/sj04.jpg"); 
  $('#sjxx05').attr("src","/Public/images/sj05.jpg"); 
  $('#sjxx06').attr("src","/Public/images/sj06.jpg"); 
  $('#sjxx07').attr("src","/Public/images/sj07.jpg");             
  $('#scqj01').attr("src","/Public/images/scqj01.jpg");  
  $('#scqj02').attr("src","/Public/images/scqj02.jpg");  
  $('#scqj03').attr("src","/Public/images/scqj03.jpg");  
  $('#scqj04').attr("src","/Public/images/scqj04.jpg");
});
</script>
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