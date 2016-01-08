<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    
    <meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
    <link rel="icon" href="/Public/style/default/images/favicon.png" type="image/png" />
    <link rel="shortcut icon" href="/Public/style/default/images/favicon.png" type="image/png" />
    <title><?php echo ($sys["sys_title"]); ?></title>
	<meta name="keywords" content="<?php echo ($sys["sys_key"]); ?>">
	<meta name="description" content="<?php echo ($sys["sys_des"]); ?>">
	
    <link href="/Public/style/default/css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="/Public/style/default/css/style.css" type="text/css" rel="stylesheet" />
	<link href="/Public/style/default/css/prettyPhoto.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Public/style/default/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.quicksand.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/superfish.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/hoverIntent.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.hoverdir.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.tweet.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/smoothscroll.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.ui.totop.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/main.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/ajax-mail.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/accordion.settings.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.flexslider-min.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>


<header id="header">
    <div id="top-menu">
		<span class="span3" style="line-height:30px;">欢迎进入厦门庆典指定官网</span>
    </div>
    <div class="container">
        <div class="row" >
            <div class="logo" >
                <a href="./index.html"><img src="/Public/style/default/images/logo.png" alt="logo" /></a>
            </div>

        </div>
    </div>
</header>
<section id="main-menu">
    <nav class="container" id="menu">
        <ul>
            <li><a href="<?php echo U('index');?>" class="current">网站首页</a></li>
			<?php if(is_array($arr)): foreach($arr as $key=>$v): ?><li>
			
			<?php if($v["column_type"] == 1): ?><a style="cursor:pointer">
			<?php elseif($v["column_type"] == 2): ?>
			<a href="<?php echo ($v["column_address"]); ?>">
			<?php else: endif; ?>
			
			<?php echo ($v["column_name"]); ?>
			</a>
                <ul>
					<?php if(is_array($v["sub"])): foreach($v["sub"] as $key=>$k): ?><li><a href="/list/<?php echo ($k["c_id"]); ?>"><?php echo ($k["column_name"]); ?></a></li>
                    <!--<li class="last"><a href="./services.html">Our Services</a></li>--><?php endforeach; endif; ?>
                </ul>
            </li><?php endforeach; endif; ?>
        </ul>
    </nav>
</section>

<div class="copyrights">Collect from <a href=""  title="厦门庆典">厦门庆典</a></div>
<section id="slider">
    <div class="flexslider">
        <ul class="slides">
			<?php if(is_array($plug_ad)): foreach($plug_ad as $key=>$v): ?><li>
                <img src="/Public/<?php echo ($v["plug_ad_pic"]); ?>" />
            </li><?php endforeach; endif; ?>
        </ul>
    </div>
</section>
<section id="welcome">
    <h1>欢迎进入 <span class="color2">净悦庆典 </span>让我们来指引您更好的了解我们的网站 .
    </h1>

    <p class="color3"> – 时尚高端婚礼品牌强势入驻，联手打造专业，品质一流的行业高度 –</p>
    <!--Button group goes here-->
    <span class="read-buttons"><button class="btn btn-more" type="button">服务项目</button><em> -or- </em><button class="btn btn-more" type="button">成功案例</button></span>
</section>
<section id="container">
    <div class="container">
        <!--Recent Projects Block-->
        <div class="row">
            <div class="span3">
                <h3>成功案例</h3>
                <p class="hidden-phone">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;厦门净悦庆典有限公司成立于2012年，是一家致力于为企业提供公关活动、品牌推广、年会庆典、模特礼仪、商业演出、会展服务为一体的专业化综合传媒机构。<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成立两年来以迅速的发展和行业的口碑的传播，已服务超过200家企业和品牌。
                </p>
                <a class="read-more hidden-phone" href="#">Read More...</a>
            </div>
            <div class="span9">
                <div class="carousel btleft" id="latest-work">
                    <div class="carousel-wrapper">
                        <ul class="da-thumbs" style="width: 1800px; display: block; margin-left: 0px;">
						
						<?php if(is_array($case)): foreach($case as $key=>$v): ?><li style="margin-right: 30px; width: 270px;">
                                <img src="/Public/<?php echo ($v["news_img"]); ?>" />
                                <div style="display: block;" class="da-animate da-slideFromLeft">
                                    <a data-rel="prettyPhoto" class="p-view" href="/Public/<?php echo ($v["news_img"]); ?>" rel="prettyPhoto"></a>
                                </div>
                            </li><?php endforeach; endif; ?>

                        </ul>
                    </div>
                    <div class="es-nav"><span class="es-nav-prev" style="opacity: 0.5;">Previous</span><span class="es-nav-next" style="opacity: 1;">Next</span></div></div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#latest-work').elastislide({
                            imageW  : 270,
                            margin  : 30
                        });
                    });
                </script>
            </div>
        </div>
        <div class="divider">
            <img alt="" src="/Public/style/default/images/div-bg.jpg" />
        </div>
        <!--3 columns block-->
        <div class="row bottom30">
            <div class="span4 features-block">
                <img class="im-bottom" src="/Public/style/default/images/icon1a.png" />
                <img class="im-top" src="/Public/style/default/images/icon1.png" />
                <h3>我们的设备</h3>

                <p>Pellentesque vel augue sit amet dui pharetra convallis. Pellentesque habitant morbi tristique
                    senectus et netus et malesuada fames ac turpis egestas.</p>
                <button class="btn btn-read" type="button">更多>></button>
            </div>
            <div class="span4 features-block">
<style>
.index_news{ width:100%; height:85px;}
.index_news ul{ margin-top:20px;}
.index_news ul li{ line-height:30px;}
</style>
                <img class="im-bottom" src="/Public/style/default/images/icon2a.png" />
                <img class="im-top" src="/Public/style/default/images/icon2.png" />
                <h3>行业新闻</h3>
				<div class="index_news">
				<ul>
				<?php if(is_array($news_3)): foreach($news_3 as $key=>$v): ?><li><a href="/con/<?php echo ($v["n_id"]); ?>" target="_blank"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
				</ul>
				</div>
                <button class="btn btn-read" type="button">更多>></button>
            </div>
            <div class="span4 features-block">

                <img class="im-bottom" src="/Public/style/default/images/icon3a.png" />
                <img class="im-top" src="/Public/style/default/images/icon3.png" />
                <h3>我们的服务</h3>

                <p>Pellentesque vel augue sit amet dui pharetra convallis. Pellentesque habitant morbi tristique
                    senectus et netus et malesuada fames ac turpis egestas.</p>
                <button class="btn btn-read" type="button">更多>></button>
            </div>
        </div>

</div></section>

<!--footer-->

<!--footer-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h3>业务范围</h3>
               <ul class="menu-widget">
                   <li><a>About</a></li>
                   <li><a>Elements</a></li>
                   <li><a>Blog</a></li>
                   <li><a>Portfolio</a></li>
                   <li><a>Contacts</a></li>
               </ul>

            </div>
            <div class="span3">
                <h3>友情链接</h3>
             <!--   <ul class="flickr clearfix"></ul>  -->
                <ul class="menu-widget">
                    <li><a href="http://www.baidu.com" target="_blank" class="follow-widget">百度</a></li>
                </ul>
            </div>
            <div class="span3">
                <h3>在线留言</h3>

                <form id="contact" class="form-horizontal" method="post" action="/Home/Index/plug_sug_runadd"/>
                    <div class="control-group">
                        <label class="control-label" for="inputName">标题</label>

                        <div class="controls">
                            <input type="text" id="plug_sug_title" placeholder="标题" name="plug_sug_title" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">邮箱</label>

                        <div class="controls">
                            <input type="text" id="plug_sug_email" placeholder="邮箱" name="plug_sug_email" />
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputMessage"></label>

                        <div class="controls">
                            <textarea rows="3" id="plug_sug_content" name="plug_sug_content"></textarea>
                        </div>
                    </div>
             
                   <button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
							 提交留言
					</button>
                    
                </form>
            </div>
            <div class="span3">
                <h3>联系方式</h3>
                <address>
                    Companyname inc.<br />
                    London, Baker Street, 90210<br />
                    <i class="myicon-phone"></i>(123) 456-7890<br />
                    <i class="myicon-mail"></i>info@dxthemes.com
                </address>
                Ut eu nulla eget massa blandit eleifend vel sedis lacus. Sed at viverra nulla. Fusce vel adipisci odio.
                Phasellus commodo, mauris eget pharetra scelerisque, est justo lacinia tortor.
            </div>
        </div>
    </div>
</footer>

<!--footer menu-->
<section id="footer-menu">
    <div class="container">
        <div class="row">
            <p class="span6 pull-left">Copyright &copy; 2016.Company name All rights reserved.<br>
版权所有：厦门市净悦庆典有限公司&nbsp;&nbsp;备案号：闽ICP备15026889号-1&nbsp;&nbsp;制作维护：龙岩顺网</p>
            <p class="offset6 span2 pull-right"></span></p>

        </div>
    </div>
</section>


	<script type="text/javascript" src="/Public/assets/js/jquery.form.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide"
        });
    });
</script>
<script>

$(function(){
	$('#contact').ajaxForm({
		beforeSubmit: checkForm,
		success: complete,
		dataType: 'json'
	});
	
	function checkForm(){
		if( '' == $("#plug_sug_title").val()){
		    layer.alert('留言标题不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#plug_sug_title').focus(); 
			});
			return false;
		}
	
		if( '' == $.trim($('#plug_sug_email').val())){
			layer.alert('邮箱不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#plug_sug_email').focus(); 
			});
			return false;
		}

		if( '' == $.trim($('#plug_sug_content').val())){
			layer.alert('留言内容不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#plug_sug_content').focus(); 
			});
			return false;
		}
}	

	function complete(data){
		if(data.status==1){
			layer.alert(data.info, {icon: 6}, function(index){
 			layer.close(index);
			window.location.href=data.url;
			});
		}else{
			layer.alert(data.info, {icon: 6}, function(index){
 			layer.close(index);
			window.location.href=data.url;
			});
			return false;	
		}
	}
 
});
</script>

</body>
</html>