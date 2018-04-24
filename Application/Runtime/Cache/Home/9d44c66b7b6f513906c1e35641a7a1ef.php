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
<script src="/Public/js/home/franchisee.js"></script>
<style type="text/css">
.franchisee{
    margin-top: 1rem;   
    margin-bottom: 1rem;
}
.franchisee .col-md-3{
    margin-bottom: 1rem;
}
.franchisee p.text-danger{
    opacity: 0.5;
    font-size: 1.5rem;
    font-weight: 600;
    border-bottom: 1px solid #a4a5aa;
}
.map{
    background: url(/Public/images/2016713101544997477.jpg);
}
.map h3 {
    font-size: 1.2em;
    color: #fff;
    font-weight: normal;
    margin: 0;
    position: absolute;
    top: 2em;
    left: 3em;
}  
.geo{
    margin: 0 auto;
}
.map-img01 {
    position: relative;
    width: 100%;
}
.icons-float {
    position: absolute;
}
.icons-float i {
    width: 0.8em;
    height: 1em;
    background: url(/Public/images/iconsss_03.png) no-repeat;
    display: block;
    cursor: pointer;
    position: relative;
    z-index: 9;
}
.maps-new-sy {
    right: 21em;
    bottom: 19.3em;
}
.icons-float dl {
    padding: 10px 20px;
    background: url(/Public/images/icons18.png) repeat;
    margin: 0;
}
.icons-float dl dt {
    margin-bottom: 10px;
}
.icons-float dt {
    font-weight: bold;
}
.icons-float dt, .icons-float dd {
    line-height: 20px;
}
.icons-float dl dt img {
    width: 217px;
    height: 86px;
}
.maps-new-sy .mapbox {
    top: -158px;
    right: -42px;
}
.icons-float .mapbox {
    position: absolute;
    width: 283px;
    z-index: 999;
}
.mapbox {
    padding: 3px;
    border: 2px solid #cadded;
}
.padd15{
    padding-right: 15px;
    padding-left: 15px;
}
@media (max-width: 1200px) {
    .map{
        display: none;
    }  
} 
#BMapLib_sendToPhone0{
    display: none;
}
#BMapLib_search_bus_btn0{
    margin-right: 0;
}
.anchorBL{display:none;}
</style>
<!-- <div class="container">
    <div class="map col-md-12">
        <div class="map-img01">
            <img class="img-responsive geo" src="/Public/images/icons15.png">
            <h3>寻找最近的众赢新业</h3>
            <div class="icons-float maps-new-sy">
                <i></i>
                <div class="mapbox" style="display: none;">
                    <dl>
                        <dt>
                            <p>大连众赢新业企业管理有限公司</p>
                            <img src="/Public/images/2016321517469309869.jpg">
                        </dt>
                        <dd>
                            <strong>0411-65838877</strong><br>
                                大连市西岗区鞍山路29-19号<br>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container franchisee">
    <p class="text-danger" style="color:#ED2D2D">寻找最近的众赢新业N+N超值购门店</p>
   <div id="allcommap" style="height:600px;width:100%;">   
   </div>
</div>
<div class="container franchisee">
    <p class="text-danger">加盟支持</p> 
    <div class="col-md-2">
        <img class="img-responsive" src="/Public/images/sj.jpg"/>
    </div>
    <div class="col-md-5">
        <p style="color:blue">■免费装修图文设计</p>
        <p>门头、室内装修、货柜设计图；<br/>
宣传单页、海报、易拉宝设计；<br/>
媒体宣传内容及图文设计等····
</p>
    </div>
    <div class="col-md-5"></div>
    <div class="col-md-12" style="height:1em">
    </div>    
    <div class="col-md-2">
        <img class="img-responsive" src="/Public/images/px.jpg"/>
    </div>
    <div class="col-md-5">
        <p style="color:blue">■免费系统及培训</p>
        <p>OA、ERP系统支持；<br/>
商品培训、保险规则培训；<br/>
管理系统培训、店面运营培训；<br/>
收银机操作培训···
</p>
    </div>
    <div class="col-md-5"></div>    
    <div class="col-md-12" style="height:1em">
    </div>    
    <div class="col-md-2">
        <img class="img-responsive" src="/Public/images/sh.jpg"/>
    </div>
    <div class="col-md-5">
        <p style="color:blue">■免费售后支持及策划方案</p>
        <p>区域货品分发、调换货、出单；<br/>
区域跨界商盟开发共享；<br/>
各类活动方案策划等···
</p>
    </div>     
    <div class="col-md-5"></div>
</div>

<?php if(is_array($result['franchiseeCats'])): $i = 0; $__LIST__ = $result['franchiseeCats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="container franchisee">
        <p class="text-danger"><?php echo ($vo["name"]); ?></p>
        <?php if(is_array($result['franchisees'])): $i = 0; $__LIST__ = $result['franchisees'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i; if(($vo["franchisee_cat_id"]) == $po["catid"]): ?><div class="col-md-3">
                    <a href="/franchisee/detail/id/<?php echo ($po["franchisee_id"]); ?>.html"><img class="img-responsive" src="<?php echo ($po["thumb"]); ?>"/></a>
                    <h4><a href="/franchisee/detail/id/<?php echo ($po["franchisee_id"]); ?>.html"><?php echo ($po["franchisee_name"]); ?></a></h4>
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
<script type="text/javascript">
// function addmap(){
//     console.log("addmap");
//     loadJScript();
// }
// //百度地图API功能
// function loadJScript() {
//     console.log("loadJScript");
//     var script = document.createElement("script");
//     script.type = "text/javascript";
//     script.src = "http://api.map.baidu.com/api?v=1.4&callback=init";
//     document.body.appendChild(script);
// }
function init1() {
    console.log("init1");
    var map1 = new BMap.Map('allcommap');
    var poi = new BMap.Point(121.61667,38.927461);
    map1.centerAndZoom(poi, 5);
    map1.enableScrollWheelZoom();
        // 添加带有定位的导航控件
    var navigationControl = new BMap.NavigationControl({
    // 靠左上角位置
    anchor: BMAP_ANCHOR_TOP_LEFT,
    // LARGE类型
    type: BMAP_NAVIGATION_CONTROL_LARGE,
    // 启用显示定位
    enableGeolocation: true
    });
    map1.addControl(navigationControl);
    var imgpath1 = '/Public/images/dl.jpg';
    var adr1 = '辽宁省大连市西岗区鞍山路29-19号';
    var phone1 = '0411-65838877';
    var phone2 = '13322223668';
    var cname1 = '众赢新业N+N超值购大连鞍山路店';
    var position1 =[121.61667,38.927461];
    addComponyRoot(cname1,imgpath1,adr1,phone1,phone2,position1)
    var imgpath2 = '/Public/images/sj01.jpg';
    var adr2 = '辽宁省庄河市城关街道,景源名郡17号楼6门市(鑫兴街11号)';
    var phone2 = '15566818833';
    var cname2 = '众赢新业N+N超值购庄河店';
    var position2 =[122.976055,39.683085];
    addCompony(cname2,imgpath2,adr2,phone2,position2);
    var imgpath3 = '/Public/images/liaoyang.jpg';
    var adr3 = '辽宁省辽阳市白塔区富虹4期(美福景对面北行60米)';
    var phone3 = '13314281117';
    var cname3 = '众赢新业N+N超值购辽阳店';
    var position3 =[123.159386,41.269243];
    addCompony(cname3,imgpath3,adr3,phone3,position3);  
    var imgpath4 = '/Public/images/jilinshi.jpg';
    var adr4 = '吉林省吉林市丰满区泰山路(如一坊中山公园南)';
    var phone4 = '13364419810';
    var cname4 = '众赢新业N+N超值购吉林市泰山路店';
    var position4 =[126.562539,43.830588];
    addCompony(cname4,imgpath4,adr4,phone4,position4);
    var imgpath5 = '/Public/images/shulan.jpg';
    var adr5 = '吉林省舒兰市六道街和谐家园对面';
    var phone = '0432-68701111';
    var phone1 = '13394326665';
    var cname5 = '众赢新业N+N超值购舒兰店';
    var position5 =[126.952556,44.408279];
    addComponyRoot(cname5,imgpath5,adr5,phone,phone1,position5);
    var imgpath6 = '/Public/images/mdj.jpg';
    var adr6 = '黑龙江省牡丹江市东安区东四条路与南市街路口';
    var phone6 = '18845332269';
    var cname6 = '众赢新业N+N超值购牡丹江店';
    var position6 =[129.639796,44.580865];
    addCompony(cname6,imgpath6,adr6,phone6,position6);              
    function addCompony(cname,imgpath,adr,phone,position){
        console.log("addCompony");
        var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                        '<img src="'+imgpath+'" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                        '地址：'+adr+'<br/>电话：'+phone+'</div>';   
        //创建检索信息窗口对象
        var searchInfoWindow = null;
        searchInfoWindow = new BMapLib.SearchInfoWindow(map1, content, {
                title  : cname,      //标题
                width  : 290,             //宽度
                height : 105,              //高度
                panel  : "panel",         //检索结果面板
                enableAutoPan : true,     //自动平移
                searchTypes   :[
                BMAPLIB_TAB_TO_HERE,  //到这里去
                ]
            });
        $("#BMapLib_search_bus_btn0").css('margin-right',0);
        var postion = new BMap.Point(position[0],position[1]);
        var marker1 = new BMap.Marker(postion); //创建marker对象
        marker1.addEventListener("click", function(e){
            searchInfoWindow.open(marker1);
            getpositon();
        })
        map1.addOverlay(marker1); //在地图中添加marker
    }
    function addComponyRoot(cname,imgpath,adr,phone,phone2,position){
        console.log("addCompony");
        var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                        '<img src="'+imgpath+'" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                        '地址：'+adr+'<br/>电话：'+phone+'<br/>手机：'+phone2+'</div>';   
        //创建检索信息窗口对象
        var searchInfoWindow = null;
        searchInfoWindow = new BMapLib.SearchInfoWindow(map1, content, {
                title  : cname,      //标题
                width  : 290,             //宽度
                height : 105,              //高度
                panel  : "panel",         //检索结果面板
                enableAutoPan : true,     //自动平移
                searchTypes   :[
                BMAPLIB_TAB_TO_HERE,  //到这里去
                ]
            });
        $("#BMapLib_search_bus_btn0").css('margin-right',0);
        var postion = new BMap.Point(position[0],position[1]);
        var marker1 = new BMap.Marker(postion); //创建marker对象
        marker1.addEventListener("click", function(e){
            searchInfoWindow.open(marker1);
            getpositon();
        })
        map1.addOverlay(marker1); //在地图中添加marker
    }  
    function getpositon(){
        // 定位对象
        var geoc = new BMap.Geocoder();
        var geolocation = new BMap.Geolocation();
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                var mk = new BMap.Marker(r.point);
                geoc.getLocation(r.point, function(rs){
                    var addComp = rs.addressComponents;
                    var result = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
                    $("input[id^=BMapLib_trans_text]").val(result);
                });
            }else {
            }
        },{enableHighAccuracy: true});
    }          
}  
// 百度地图API功能
$(document).ready(function(){
    console.log("ready");
    setTimeout(init1(),3000)
});
</script>
<style type="text/css">
    .BMapLib_SearchInfoWindow{font:12px arial,瀹嬩綋,sans-serif;position:absolute;border:1px solid #999;background-color:#fff;cursor:default}.BMapLib_SearchInfoWindow form,.BMapLib_SearchInfoWindow ul,.BMapLib_SearchInfoWindow li{margin:0;padding:0}.BMapLib_SearchInfoWindow img{border:0}.BMapLib_SearchInfoWindow ul{list-style:none}.BMapLib_SearchInfoWindow .BMapLib_bubble_top{border-bottom:1px solid #ccc;height:31px}.BMapLib_SearchInfoWindow .BMapLib_bubble_title{font-family: 'Microsoft Yahei' !important;
    font-size: 1em !important;font-weight: bold;line-height:30px;background-color:#f9f9f9;overflow:hidden;height:30px;padding:0 5px;font-size:12px}.BMapLib_SearchInfoWindow .BMapLib_bubble_tools{padding-right:5px;position:absolute;top:0;right:0;height:30px;width:64px;z-index:10000}.BMapLib_SearchInfoWindow .BMapLib_bubble_tools div{float:right;height:30px;width:22px;cursor:pointer;background-color:#f9f9f9;cursor:pointer;overflow:hidden}.BMapLib_SearchInfoWindow .BMapLib_bubble_close{background:url(/Public/images/iw_close.gif) no-repeat center center}.BMapLib_SearchInfoWindow .BMapLib_sendToPhone{background:url(phone.png) no-repeat center center}.BMapLib_SearchInfoWindow .BMapLib_bubble_center{z-index:3}.BMapLib_SearchInfoWindow .BMapLib_bubble_content{padding:3px 5px;overflow-x:auto;overflow-y:hidden}.BMapLib_SearchInfoWindow .BMapLib_bubble_bottom{display:block;z-index:2}.BMapLib_SearchInfoWindow .BMapLib_trans{z-index:5;position:absolute;bottom:-31px;*bottom:-32px}.BMapLib_SearchInfoWindow .BMapLib_nav{width:100%;height:75px;overflow:visibile;position:relative}.BMapLib_SearchInfoWindow .BMapLib_nav input{vertical-align:middle}.BMapLib_SearchInfoWindow .iw_bt,.BMapLib_SearchInfoWindow .iw_bt_down,.BMapLib_SearchInfoWindow .iw_bt_over{width:46px;height:26px;line-height:18px;cursor:pointer;border:0;padding:0;background:url('http://api.map.baidu.com/library/SearchInfoWindow/1.4/src/iw_bg.png') no-repeat 0 -87px;vertical-align:middle}.BMapLib_SearchInfoWindow .iw_bt_over{background-position:-52px -87px}.BMapLib_SearchInfoWindow .iw_bt_down{background-position:-104px -87px;font-weight:700}.BMapLib_search_text{width:100%;height:20px;line-height:20px;border:1px solid #a5acb2}.BMapLib_trans_text{width:100%;height:20px;line-height:20px;border:1px solid #a5acb2}.BMapLib_nav_tab{height:30px;width:100%;background:url('http://api.map.baidu.com/library/SearchInfoWindow/1.4/src/iw_bg.png') repeat-x 0 0}.BMapLib_nav_tab li{position:relative;float:left;width:114px;height:25px;padding-top:5px;text-align:center;border-left:1px solid #dadada;cursor:pointer;overflow:hidden;width:33%}.BMapLib_nav_tab .BMapLib_icon{display:inline-block;position:relative;width:10px;height:15px;top:3px;margin-right:7px;background:url('http://api.map.baidu.com/library/SearchInfoWindow/1.4/src/iw_bg.png') no-repeat 0 -136px}.BMapLib_nav_tab .BMapLib_icon_tohere{background-position:-15px -136px}.BMapLib_nav_tab .BMapLib_icon_nbs{width:14px;height:14px;background-position:-30px -136px}.BMapLib_nav_tab li.BMapLib_first{border-left:0}.BMapLib_nav_tab li:hover{text-decoration:none}.BMapLib_nav_tab li.BMapLib_current{color:#4d4d4d;cursor:default;background:url('http://api.map.baidu.com/library/SearchInfoWindow/1.4/src/iw_bg.png') repeat-x 0 -44px}.BMapLib_nav_tab_content li{padding:10px 0 0 0;position:relative;height:22px;font-family:"瀹嬩綋"}.BMapLib_sms_tab_container{height:35px;background:#fcfcfc;position:relative;z-index:20;font-size:12px;font-weight:bold;line-height:35px;padding-left:10px}.BMapLib_sms_pnl_phone{position:relative;z-index:10;padding:10px 15px 10px 15px;border-top:solid 1px #f2f2f2;font-size:12px}.BMapLib_ap{float:left;width:263px;height:172px;overflow-x:hidden;overflow-y:auto}.BMapLib_ap th{text-align:right;font-weight:normal}.BMapLib_mp{background:#f6f6f6;padding:10px;height:152px;overflow-x:hidden;overflow-y:auto}.BMapLib_mp_title{font-weight:bold;height:18px;line-height:18px;padding-bottom:5px}.BMapLib_msgContent{font-size:12px:line-height:16px;word-break:break-all;銆€銆€word-wrap:break-word}.BMapLib_popup_close{padding:10px;background:url(iw_close.gif) no-repeat center center transparent;border:0 none;cursor:pointer;height:13px;position:absolute;right:8px;top:8px;width:14px;z-index:50}.BMapLib_sms_input{ime-mode:disabled}.BMapLib_sms_input_l{width:90px}.BMapLib_sms_input_s{width:35px}.BMapLib_sms_declare_phone{color:#707070}#BMapLib_sms_tip{color:red;padding-left:20px}#BMapLib_success_tip{font-size:12px;text-align:center;padding:50px 0 20px 0;color:red}#BMapLib_activateTip{padding-left:5px;color:red}


</style>
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