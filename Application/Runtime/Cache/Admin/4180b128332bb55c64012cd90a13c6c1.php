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
		<link rel="stylesheet" href="/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/Public/Admin/css/font-awesome.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="/Public/assets/css/ace-fonts.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!-- inline styles related to this page -->
		<link rel="stylesheet" href="/Public/assets/css/slackck.css" />
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
<script src="/Public/assets/js/jquery.min.js"></script>
<script src="/Public/assets/js/bootstrap.js"></script>
<script src="/Public/assets/js/jquery.form.js"></script>

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
					
					

							<div class="row maintop">
								<div class="col-xs-12 col-sm-1">
								<a href="/Admin/Sys/admin_list_add">
								<button class="btn btn-xs btn-danger">
									<i class="ace-icon fa fa-bolt bigger-110"></i>
										添加管理员
								</button>
								</a>
								</div>
								
								<div class="col-xs-12 col-sm-3">
								<form name="admin_list_sea" class="form-search" method="post" action="/Admin/Sys/admin_list">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="ace-icon fa fa-check"></i>
										</span>
										<input type="text" name="val" id="val" class="form-control search-query admin_sea" value="<?php echo ($testval); ?>" placeholder="输入需查询的用户名" />
										<span class="input-group-btn">
											<button type="submit" class="btn btn-xs  btn-purple">
												<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
												搜索
											</button>
										</span>
									</div>
								</form>
								</div>
  <div class="input-group-btn">
  	<a href="/Admin/Sys/admin_list">
	<button type="button" class="btn btn-xs  btn-purple">
		<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
		显示全部
	</button>
	</a>
  </div>
								
								
							</div>

		

							<div class="row">
							    <div class="col-xs-12">
										<div>
                                        <form id="leftnav" name="leftnav" method="post" action="" >
                                        <input type="hidden" name="checkk" id="checkk" value="1" /><!--用于判断操作类型-->
											<table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
												<thead>
													<tr>
													  <th width="10%">登录用户名</th>
													  <th width="17%">邮箱</th>
													  <th width="10%">用户组</th>
													  <th width="11%">真实姓名</th>
													  <th width="12%">电话号码</th>
													  <th width="8%">登陆次数</th>
													  <th width="15%">IP地址</th>
													  <th width="9%">状态</th>
													  <th width="8%" style="border-right:#CCC solid 1px;">操作</th>
												  </tr>
												</thead>

												<tbody>
                                                
                                                <?php if(is_array($admin_list)): foreach($admin_list as $key=>$v): ?><tr>
														<td height="28" ><?php echo ($v["admin_username"]); ?></td>
														<td><?php echo ($v["admin_email"]); ?></td>
														<td><?php echo ($v["group"]); ?></td>
														<td><?php echo ($v["admin_realname"]); ?></td>
														<td><?php echo ($v["admin_tel"]); ?></td>
														<td><?php echo ($v["admin_hits"]); ?></td>
														<td><?php echo ($v["admin_ip"]); ?></td>
														<td>
														<?php if($v[admin_open] == 1): ?><a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["admin_id"]); ?>);" title="已开启">
														<div id="zt<?php echo ($v["admin_id"]); ?>"><button class="btn btn-minier btn-yellow">状态开启</button></div>
														</a>
														<?php else: ?>
														<a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["admin_id"]); ?>);" title="已禁用">
														<div id="zt<?php echo ($v["admin_id"]); ?>"><button class="btn btn-minier btn-danger">状态禁用</button></div>
														</a><?php endif; ?>
														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="<?php echo U('admin_list_edit',array('admin_id'=>$v['admin_id']));?>" title="修改">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>																</a>
																<a class="red" href="javascript:;" onclick="return del(<?php echo ($v["admin_id"]); ?>);" title="删除">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>																</a>															</div>														</td>
													</tr><?php endforeach; endif; ?>   
                                                  <tr>
													  <td height="50" colspan="10" align="left"><?php echo ($page); ?></td>
												  </tr>
												</tbody>
										  </table>
                                          </form>
							    		</div>
									</div>
								</div>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="hidden">

									<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse">
										<ul class="nav nav-list">
                                        
    <?php $m = M('auth_rule'); $dataaa = $m->where(array('pid'=>$_SESSION['se'],'status'=>1))->order('sort')->select(); foreach ($dataaa as $kkk=>$vvv){ if(!$auth->check($vvv['name'], $_SESSION['aid']) && $_SESSION['aid']!= 1){ unset($dataaa[$kkk]); } } ?>
    <?php if(is_array($dataaa)): foreach($dataaa as $key=>$k): ?><li>
												<a href="<?php echo U(''.$k['name'].'');?>">
													<o class="font12 <?php if((CONTROLLER_NAME.'/'.ACTION_NAME == $k['name'])): ?>rigbg<?php endif; ?>"><?php echo ($k["title"]); ?></o>
												</a>

												<b class="arrow"></b>
											</li><?php endforeach; endif; ?>


										</ul><!-- /.nav-list -->
									</div><!-- .sidebar -->
								</div>

							</div><!-- /.col -->
						</div><!-- /.row -->

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->


<script>
function del(id){
	if(id==1){
	layer.alert('超级管理员不可删除', {icon: 4});
	return false;
	}
	layer.confirm('你确定要删除吗？', {icon: 3}, function(index){
	layer.close(index);
	window.location.href="/Admin/Sys/admin_list_del/admin_id/"+id+"";
	});
}

function stateyes(val){
		  $.post('<?php echo U("admin_list_state");?>',
		  {x:val},
	function(data){
	var $v=val;
		if(data.status){
			if(data.info=='状态禁止'){
				var a='<button class="btn btn-minier btn-danger">状态禁用</button>'
				$('#zt'+val).html(a);
				layer.alert(data.info, {icon: 5});
			}else{
				var b='<button class="btn btn-minier btn-yellow">状态开启</button>'
				$('#zt'+val).html(b);
				layer.alert(data.info, {icon: 6});
			}
			
		}
	});
	return false;
}
</script>
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