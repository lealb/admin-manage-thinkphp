<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>通用后台管理</title>
		<meta name="description" content="通用 后台" />
		<!--响应式布局 设备-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/Public/Admin/css/bootstrap/bootstrap.min.css" />
		<link rel="stylesheet" href="/Public/Admin/css/awesome/font-awesome.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="/Public/Admin/css/ace/ace-fonts.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="/Public/Admin/css/ace/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="/Public/Common/css/index.css" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/Public/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
	</head>
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default navbar-collapse">
			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="<?php echo U('Index/index');?>" class="navbar-brand">
						<small><i class="fa fa-leaf"></i>
							Adminmanage
						</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
						<!--当前登录的用户信息，头像也应该动态绑定-->
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/Public/Admin/images/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo ($_SESSION['admin_username']); ?>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<!--用户相关操作-->
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										个人设置
									</a>
								</li>
								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										会员中心
									</a>
								</li>
								<!--分隔符-->
								<li class="divider"></li>
								<li>
									<a href="javascript:void(0);" id="logout">
										<i class="ace-icon fa fa-power-off"></i>
										注销
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
<script src="/Public/Common/js/jquery/jquery.min.js"></script>
<script src="/Public/Common/js/bootstrap/bootstrap.js"></script>
<script src="/Public/Common/js/jquery/jquery.form.js"></script>

<!-- <script src="/Public/assets/js/ace-extra.js"></script> -->
<script src="/Public/layer/layer.js"></script>

<!-- page specific plugin scripts -->
<!-- ace scripts -->
<script src="/Public/assets/js/maxlength.js"></script>
<!-- <script src="/Public/assets/js/ace/ace.js"></script>
<script src="/Public/assets/js/ace/ace.sidebar.js"></script>
<script src="/Public/assets/js/ace/ace.submenu-hover.js"></script> -->
<!--自定义处理js-->
<script src="/Public/Admin/page/Common/header.js">></script>
<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<!--[if lte IE 9]>
  <link rel="stylesheet" href="/Public/assets/css/ace-ie.css" />
<![endif]-->
<!--[if lte IE 8]>
<script src="/Public/assets/js/html5shiv.js"></script>
<script src="/Public/assets/js/respond.js"></script>
<![endif]-->
<!-- ace settings handler -->



		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">

			<!-- #section:basics/sidebar -->

	<div id="sidebar" class="sidebar responsive">
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<!--四个毫无意义的按钮-->
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success"><i class="ace-icon fa fa-signal"></i></button>
			<button class="btn btn-info"><i class="ace-icon fa fa-pencil"></i></button>
			<button class="btn btn-warning"><i class="ace-icon fa fa-users"></i></button>
			<button class="btn btn-danger"><i class="ace-icon fa fa-cogs"></i></button>
		</div>
	</div>
	<ul class="nav nav-list">
		<?php use Common\Controller\AuthController; use Think\Auth; $auth_rule = M('auth_rule'); $menu = $auth_rule ->field("id,name,pid,title,css") ->where('status=1') ->order('sort') ->select(); $auth = new Auth(); foreach ($menu as $k=>$v){ if(!$auth->check($v['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($menu[$k]); } } $menu=getMenu($menu); ?>
		<?php if(is_array($menu)): foreach($menu as $key=>$vo): ?><li class="<?php if(CONTROLLER_NAME == $vo['name']): ?>active open<?php endif; ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="menu-icon fa <?php echo ($vo["css"]); ?>"></i>
					<span class="menu-text">
						<?php echo ($vo["title"]); ?>
					</span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<?php if(is_array($vo['child'])): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?><li class="<?php if(($_SESSION['se'] == $sub['id'])): ?>active<?php endif; ?>">
							<a href="<?php echo U($sub['name'],array('se'=>$sub['id']));?>">
								<i class="menu-icon fa fa-caret-right"></i>
								<?php echo ($sub["title"]); ?>
							</a>
							<b class="arrow"></b>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</li><?php endforeach; endif; ?>
	</ul>
	<!--收紧放缩>>处理-->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
</div>




			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">

                        
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<i class="ace-icon fa fa-check green"></i>
									为了您更好的使用本系统，建议屏幕分辨率1280*768以上，并且安装chrome谷歌浏览器 ——— <a href="<?php echo U('Help/soft');?>">进入软件下载专区</a>
								</div>

								<div class="col-sm-7 sl-indextop7">
										<!-- #section:pages/dashboard.infobox -->
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-folder"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo ($tonews_count); ?></span>
												<div class="infobox-content">今日普通文章数</div>
											</div>

											<!-- #section:pages/dashboard.infobox.stat -->
											<div class="stat <?php if($difday < 1): ?>stat-important<?php else: ?>stat-success<?php endif; ?>"><?php echo (round($difday,0)); ?>%</div>

											<!-- /section:pages/dashboard.infobox.stat -->
										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-user"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">11</span>
												<div class="infobox-content">今日增加会员</div>
											</div>

											<div class="badge badge-success">
												+32%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div>
										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">0</span>
												<div class="infobox-content">待定</div>
											</div>
											<div class="stat stat-important">0%</div>
										</div>


										<!-- /section:pages/dashboard.infobox -->
										<div class="space-6"></div>

										<!-- #section:pages/dashboard.infobox.dark -->
										<div class="infobox infobox-orange infobox-small infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-book"></i>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">总文章数</div>
												<div class="infobox-content"><?php echo ($news_count); ?></div>
											</div>
										</div>

										<div class="infobox infobox-green infobox-small infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>

											<!-- /section:pages/dashboard.infobox.sparkline -->
											<div class="infobox-data">
												<div class="infobox-content">总会员数</div>
												<div class="infobox-content">32,000</div>
											</div>
										</div>

										<div class="infobox infobox-orange2 infobox-small infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-download"></i>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">待定</div>
												<div class="infobox-content">0</div>
											</div>
										</div>
										
										<div class="infobox infobox-blue infobox-small infobox-dark">
											<!-- #section:pages/dashboard.infobox.sparkline -->
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
											</div>

											<!-- /section:pages/dashboard.infobox.sparkline -->
											<div class="infobox-data">
												<div class="infobox-content">待定</div>
												<div class="infobox-content">0</div>
											</div>
										</div>
										<!-- /section:pages/dashboard.infobox.dark -->
										
										
									<div class="widget-box sl-indextop10">
											<div class="widget-header">
												<h5 class="widget-title"><span style="font-size:14px; font-family:Microsoft YaHei">系统版本：开发信息</span></h5>

											</div>

											<div class="widget-body">
												<div class="widget-main">
													<p class="alert alert-info sl-line-height25">
														框架版本：ThinkPHP<?php echo ($info["ThinkPHPTYE"]); ?>&nbsp;&nbsp;上传附件限制：<?php echo ($info["ONLOAD"]); ?><br />
														系统版本：<?php echo ($info["RUNTYPE"]); ?>&nbsp;&nbsp;MYSQL版本：<?php echo mysql_get_server_info();?><br />
													</p>
													<p class="alert alert-success">
														技术发开人员：slackck QQ:876902658<br />
													</p>
												</div>
											</div>
										</div>
									</div>








									<div class="col-xs-12 col-sm-5 widget-container-col">
										<div class="widget-box widget-color-blue">
											<!-- #section:custom/widget-box.options -->
											<div class="widget-header">
												<h5 class="widget-title bigger lighter sl-font14">
													<i class="ace-icon fa fa-table"></i>
													<span style="font-size:14px; font-family:Microsoft YaHei">本月热门文章排行</span>
												</h5>
											</div>

											<!-- /section:custom/widget-box.options -->
											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-striped table-bordered table-hover">
														<thead class="thin-border-bottom">
															<tr>
																<th width="68%">标题</th>

																<th width="17%"><em>点击数</em></th>
															</tr>
														</thead>

														<tbody>
														<?php if(is_array($news_list)): foreach($news_list as $key=>$v): ?><tr>
																<td height="25"><?php echo ($v["news_title"]); ?></td>
																<td><?php echo ($v["news_hits"]); ?></td>
															</tr><?php endforeach; endif; ?>
														</tbody>
													</table>
												</div>
											</div>
									</div><!-- /.span -->
								</div><!-- /.row -->















<style>
.font12{ font-size:14px;}
</style>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="hidden">

									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse menu-min">
										<ul class="nav nav-list">
											<li>
												<a href="<?php echo U('Index/index');?>">
													<o class="font12">欢迎使用slackck定制后台系统管理</o>
												</a>
											</li>
										</ul><!-- /.nav-list -->
									</div><!-- .sidebar -->
								</div>

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

	<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">lijiadongyue</span>
					通用后台管理系统 &copy; 2015-2016
			</span>
		</div>
	</div>
</div>


    
		</div><!-- /.main-container -->


	</body>
</html>