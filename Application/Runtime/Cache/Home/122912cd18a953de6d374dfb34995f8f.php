<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
    
    <meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
    <link rel="icon" href="/Public/style/default/images/favicon.png" type="image/png" />
    <link rel="shortcut icon" href="/Public/style/default/images/favicon.png" type="image/png" />
    <title><?php echo ($column_find["column_name"]); ?>_<?php echo ($sys["sys_name"]); ?></title>
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
    <script type="text/javascript" src="/Public/style/default/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.tweet.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/smoothscroll.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/jquery.ui.totop.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/main.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/ajax-mail.js"></script>
    <script type="text/javascript" src="/Public/style/default/js/accordion.settings.js"></script>
    <!--Le Google Web Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,500' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Andada' rel='stylesheet' type='text/css' />
	<style>
	.news_content{ font-size:14px; color:#333333; line-height:25px;}
	.news_content p{ font-size:14px; color:#333333; line-height:25px;}
	
	.list_nav span{}
	.list_nav a{background-color:#fd9090; color:#FFFFFF;margin-right:30px; padding:5px 10px 5px 10px;}
	.list_nav a:hover{background-color:#e44848; color:#FFFFFF;}
	.list_nav a.active{background-color:#e44848; color:#FFFFFF;}
	
	</style>
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
<!--breadcrumbs -->
<div class="container breadcrumbs">
<h1>
<div class="list_nav">
<?php if(is_array($column_list)): foreach($column_list as $key=>$t): ?><a href="<?php echo U('news_list',array('c_id'=>$t['c_id']));?>" <?php if($t['c_id'] == $column_find['c_id']): ?>class="active"<?php endif; ?>><span><?php echo ($t["column_name"]); ?></span></span><?php endforeach; endif; ?>
</div>
</h1>
    <div>你当前的位置: <a href="#">首页</a> &nbsp/&nbsp <?php echo ($column_find["column_name"]); ?></div>
</div>
<!--container-->
<section id="container">
    <div class="container">
        <div class="row">
            <section id="page-sidebar" class="alignleft span9">
                <hr />

<?php if($column_find['column_type'] == 5): ?><div class="news_content">
		<?php echo (htmlspecialchars_decode($column_find["column_content"])); ?>
	</div>

<?php elseif($column_find['column_type'] == 3): ?>
				<?php if(is_array($news_list)): foreach($news_list as $key=>$v): ?><article class="blog-post">
                    <h2><a href="/con/<?php echo ($v["n_id"]); ?>" target="_blank"><?php echo ($v["news_title"]); ?></a></h2>
                    <ul class="meta clearfix">
                        <li><?php echo (date('Y-m-d',$v["news_time"])); ?></li>
                        <li>文章来源: <?php echo ($v["news_source"]); ?></li>
                        <li>作者:<?php echo ($v["news_auto"]); ?></li>
                    </ul>
                    <p>
                        <?php echo ($v["news_scontent"]); ?>
                    </p>
                    <a href="<?php echo U('news_content',array('n_id'=>$v['n_id']));?>" class="read-more">查看更多 ...</a>
                </article><?php endforeach; endif; ?>
				
				 <hr/>
				 
				<div class="pagination pagination-centered">
                    <?php echo ($page); ?>
                </div>
<?php elseif($column_find['column_type'] == 4): ?>
<section class="row da-thumbs portfolio filtrable clearfix">

			<?php if(is_array($news_list)): foreach($news_list as $key=>$y): ?><article data-id="id-1" data-type="javascript html" class="span3">
                <img src="/Public<?php echo ($y["news_img"]); ?>" alt="photo" />
                <div>
                    <a href="/Public<?php echo ($y["news_img"]); ?>" class="p-view" data-rel="prettyPhoto" title="<?php echo ($y["news_title"]); ?>"></a>
                </div>
            </article><?php endforeach; endif; ?>
			 <hr/>
				 
				<div class="pagination pagination-centered">
                    <?php echo ($page); ?>
                </div>

			 </section>
<?php else: ?>
4<?php endif; ?>
				


            </section>
            <!--sidebar-->
            <aside id="sidebar" class="alignright span3">

                <section class="post-widget">
                    <div class="title-divider">
                        <div class="divider-arrow"></div>                               
                        <h4>热门图文</h4>             
                    </div>
                    <ul class="clearfix">
					
					<?php if(is_array($news_pichot)): foreach($news_pichot as $key=>$t): ?><li>
                            <a href="<?php echo U('news_content',array('n_id'=>$t['n_id']));?>" target="_blank"><img src="/Public/<?php echo ($t["news_img"]); ?>" alt="photo" width="60" height="60" /></a>
                            <a href="<?php echo U('news_content',array('n_id'=>$t['n_id']));?>" target="_blank"><?php echo ($t["news_title"]); ?></a>
                            <p>阅读：<?php echo ($t["news_hits"]); ?></p>
                            <div class="clear"></div>
                        </li><?php endforeach; endif; ?>

                    </ul>
                </section>

            </aside>
        </div>
    </div>
</section>

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