<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>网站后台系统管理</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/Public/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/Public/assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="/Public/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/Public/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/Public/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/Public/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->
        <link rel="stylesheet" href="/Public/assets/css/slackck.css" />
		<!-- ace settings handler -->
		<script src="/Public/assets/js/ace-extra.js"></script>
		<script src="/Public/assets/js/jquery.min.js"></script>
		<script src="/Public/assets/js/jquery.form.js"></script>
		<script src="/Public/layer/layer.js"></script>
		<!--<script src="/Public/assets/js/jquery.leanModal.min.js"></script>-->
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/Public/assets/js/html5shiv.js"></script>
		<script src="/Public/assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default    navbar-collapse">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="<?php echo U('Index/index');?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Slakck System
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->
					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons">
						<span class="sr-only">Toggle user menu</span>

						<img src="/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
					</button>

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
						<li class="transparent">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
							</a>

							<div class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active">
											<a data-toggle="tab" href="#navbar-tasks">
												Tasks
												<span class="badge badge-danger">4</span>
											</a>
										</li>

										<li>
											<a data-toggle="tab" href="#navbar-messages">
												Messages
												<span class="badge badge-danger">5</span>
											</a>
										</li>
									</ul><!-- .nav-tabs -->

									<div class="tab-content">
										<div id="navbar-tasks" class="tab-pane in active">
											<ul class="dropdown-menu-right dropdown-navbar dropdown-menu">
												<li class="dropdown-content">
													<ul class="dropdown-menu dropdown-navbar">
														<li>
															<a href="#">
																<div class="clearfix">
																	<span class="pull-left">Software Update</span>
																	<span class="pull-right">65%</span>
																</div>

																<div class="progress progress-mini">
																	<div style="width:65%" class="progress-bar"></div>
																</div>
															</a>
														</li>

													</ul>
												</li>

												<li class="dropdown-footer">
													<a href="#">
														See tasks with details
														<i class="ace-icon fa fa-arrow-right"></i>
													</a>
												</li>
											</ul>
										</div><!-- /.tab-pane -->

										<div id="navbar-messages" class="tab-pane">
											<ul class="dropdown-menu-right dropdown-navbar dropdown-menu">
												<li class="dropdown-content">
													<ul class="dropdown-menu dropdown-navbar">
														<li>
															<a href="#">
																<img src="" class="msg-photo" alt="Fred's Avatar" />
																<span class="msg-body">
																	<span class="msg-title">
																		<span class="blue">Fred:</span>
																		Vestibulum id penatibus et auctor  ...
																	</span>

																	<span class="msg-time">
																		<i class="ace-icon fa fa-clock-o"></i>
																		<span>10:09 am</span>
																	</span>
																</span>
															</a>
														</li>
													</ul>
												</li>

												<li class="dropdown-footer">
													<a href="inbox.html">
														See all messages
														<i class="ace-icon fa fa-arrow-right"></i>
													</a>
												</li>
											</ul>
										</div><!-- /.tab-pane -->
									</div><!-- /.tab-content -->
								</div><!-- /.tabbable -->
							</div><!-- /.dropdown-menu -->
						</li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo ($_SESSION['admin_username']); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										个人设置
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										会员中心
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="javascript:;"  id="logout">
										<i class="ace-icon fa fa-power-off"></i>
										注销
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>


<script type="text/javascript">
$(document).ready(function(){
	$("#logout").click(function(){
		layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
	    layer.close(index);
	    window.location.href="<?php echo U('Login/logout');?>";
	});
	});
});
</script>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">

			<!-- #section:basics/sidebar -->

				<div id="sidebar" class="sidebar responsive">

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
<?php use Common\Controller\AuthController; use Think\Auth; $m = M('auth_rule'); $field = 'id,name,title,css'; $data = $m->field($field)->where('pid=0 AND status=1')->order('sort')->select(); $auth = new Auth(); foreach ($data as $k=>$v){ if(!$auth->check($v['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($data[$k]); } } ?>

<?php if(is_array($data)): foreach($data as $key=>$v): ?><li class="<?php if(CONTROLLER_NAME == $v['name']): ?>active open<?php endif; ?>"><!--open代表打开状态-->
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa <?php echo ($v["css"]); ?>"></i>
							<span class="menu-text">
								<?php echo ($v["title"]); ?>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
    <?php $m = M('auth_rule'); $dataa = $m->where(array('pid'=>$v['id'],'status'=>1))->select(); foreach ($dataa as $kk=>$vv){ if(!$auth->check($vv['name'], $_SESSION['aid']) && $_SESSION['aid'] != 1){ unset($dataa[$kk]); } } ?>
    <?php if(is_array($dataa)): foreach($dataa as $key=>$j): ?><li class="<?php if(($_SESSION['se'] == $j['id'])): ?>active<?php endif; ?>">
								<a href="<?php echo U($j['name'],array('se'=>$j['id']));?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?php echo ($j["title"]); ?>
								</a>
								<b class="arrow"></b>
							</li><?php endforeach; endif; ?>
						</ul>
					</li><?php endforeach; endif; ?>
                    
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row maintop">

						<div class="col-xs-12 col-sm-3">
							<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal">
								<i class="ace-icon fa fa-plus bigger-110"></i>
									添加自定义菜单
							</button>
							<!--<a class="red" href="javascript:;" onclick="we_menu_make();">-->
							<a class="red" href="<?php echo U('we_menu_make');?>">
							<button class="btn btn-xs btn-info" id="we_menu_make">
								<i class="ace-icon fa fa-bolt bigger-110"></i>
									生成菜单
							</button>
							</a>
						</div>
					</div>

							<div class="row">
							    <div class="col-xs-12">
										<div>
											<form id="we_menu_order" name="we_menu_order" method="post" action="<?php echo U('we_menu_order');?>" >
											<table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
												<thead>
													<tr>
													  <th width="5%">ID</th>
													  <th width="28%">主菜单名称</th>
													  <th width="12%">菜单类型</th>
													  <th width="10%">菜单状态</th>
													  <th width="32%">菜单操作值</th>
													  <th width="7%">排序</th>
													  <th width="6%" style="border-right:#CCC solid 1px;">操作</th>
												  </tr>
												</thead>

												<tbody>

                                                <?php if(is_array($we_menu)): foreach($we_menu as $key=>$v): ?><tr>
														<td height="28"><?php echo ($v["we_menu_id"]); ?></td>
														<td style='padding-left:<?php if($v["leftpin"] != 0): echo ($v["leftpin"]); ?>px<?php endif; ?>' ><?php echo ($v["lefthtml"]); echo ($v["we_menu_name"]); ?></td>
														<td><?php echo ($v["we_menu_type"]); ?></td>
														<td>
									<?php if($v[we_menu_open] == 1): ?><a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["we_menu_id"]); ?>);" title="已开启">
											<div id="zt<?php echo ($v["we_menu_id"]); ?>"><button class="btn btn-minier btn-yellow">显示状态</button></div>
										</a>
									<?php else: ?>
										<a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["we_menu_id"]); ?>);" title="已禁用">
											<div id="zt<?php echo ($v["we_menu_id"]); ?>"><button class="btn btn-minier btn-danger">隐藏状态</button></div>
										</a><?php endif; ?>
														</td>
														<td><?php echo ($v["we_menu_typeval"]); ?></td>
														<td><input name="<?php echo ($v["we_menu_id"]); ?>" class="list_order" value=" <?php echo ($v["we_menu_order"]); ?>" size="3"/></td>
														<td>
						<div class="hidden-sm hidden-xs action-buttons">
							<a class="green"  href="javascript:;" onclick="return we_menu_edit(<?php echo ($v["we_menu_id"]); ?>);"  title="修改">
								<i class="ace-icon fa fa-pencil bigger-130"></i>
							</a>
							<a class="red" href="javascript:;" onclick="return del(<?php echo ($v["we_menu_id"]); ?>);" title="删除">
								<i class="ace-icon fa fa-trash-o bigger-130"></i>
							</a>
						</div>
													</td>
													</tr><?php endforeach; endif; ?>   
                                                  <tr>
													  <td colspan="8" align="left"><button type="submit"  id="btnorder" class="btn btn-white btn-yellow btn-sm">排序</button></td>
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


<!-- 显示模态框（Modal）-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-horizontal" name="we_menu_runadd" id="we_menu_runadd" method="post" action="/Admin/We/we_menu_runadd">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
               添加自定义菜单
            </h4>
         </div>
         <div class="modal-body">
            
						<div class="row">
							<div class="col-xs-12">
								
                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 上级栏目： </label>
										<div class="col-sm-10">
                                        <select name="we_menu_leftid"  class="col-sm-4 selector" >
                                        <option value="0">顶级栏目</option>
                                        <?php if(is_array($menu_top)): foreach($menu_top as $key=>$v): ?><option value="<?php echo ($v["we_menu_id"]); ?>"><?php echo ($v["we_menu_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 菜单名称：  </label>
										<div class="col-sm-10">
											<input type="text" name="we_menu_name" id="we_menu_name" placeholder="输入菜单名称" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    <div class="space-4"></div>
								
                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 菜单类型： </label>
										<div class="col-sm-10">
                                        <select name="we_menu_type"  class="col-sm-4" >
                                        <option value="1" selected>URL菜单链接</option>
                                        <option value="2">关键词回复菜单</option>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> URL地址：  </label>
										<div class="col-sm-10">
											<input type="text" name="we_menu_typeval" id="we_menu_typeval" placeholder="输入URL地址" class="col-xs-10 col-sm-10" />
										</div>
									</div>
                                    <div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 排序：  </label>
										<div class="col-sm-10">
											<input type="text" name="we_menu_order" id="we_menu_order" value="50" class="col-xs-10 col-sm-2" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>从小到大排序</span>
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
										<div class="col-sm-10" style="padding-top:5px;">
                                            <input name="we_menu_open" id="we_menu_open" value="1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox" />
											<span class="lbl">&nbsp;&nbsp;默认关闭</span>
										</div>
									</div>
                                    <div class="space-4"></div>
									
								</div>
							</div>
			
			
			
			
         </div>
         <div class="modal-footer">
		 	<button type="submit" class="btn btn-primary">
            	提交保存
            </button>
		 	<button class="btn btn-info" type="reset">
				重置
			</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">
				关闭
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   </form>
</div><!-- /.modal -->








<!-- 修改自定义菜单模态框（Modal） -->
<div class="modal fade in" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-backdrop fade in" id="gbbb" style="height: 100%;"></div>
<form class="form-horizontal" name="we_menu_runedit" id="we_menu_runedit" method="post" action="/Admin/We/we_menu_runedit">
<input type="hidden" name="we_menu_id" id="editwe_menu_id" value="" />
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" id="gb"  data-dismiss="modal" 
               aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
               修改友情链接
            </h4>
         </div>
         <div class="modal-body">
            
			
						<div class="row">
							<div class="col-xs-12">
								
                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 上级栏目： </label>
										<div class="col-sm-10">
                                        <select name="we_menu_leftid"  id="editwe_menu_leftid"  class="col-sm-4 selector" >
                                        <option value="0">顶级栏目</option>
                                        <?php if(is_array($menu_top)): foreach($menu_top as $key=>$v): ?><option value="<?php echo ($v["we_menu_id"]); ?>"><?php echo ($v["we_menu_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 菜单名称：  </label>
										<div class="col-sm-10">
											<input type="text" name="we_menu_name" id="editwe_menu_name" placeholder="输入菜单名称" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    <div class="space-4"></div>
								
                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 菜单类型： </label>
										<div class="col-sm-10">
                                        <select name="we_menu_type"  class="col-sm-4" id="editwe_menu_type">
                                        <option value="1" selected>URL菜单链接</option>
                                        <option value="2">关键词回复菜单</option>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> URL地址：  </label>
										<div class="col-sm-10">
											<input type="text" name="we_menu_typeval" id="editwe_menu_typeval" placeholder="输入URL地址" class="col-xs-10 col-sm-10" />
										</div>
									</div>
                                    <div class="space-4"></div>
									
								</div>
							</div>
			
			
			
			
			
         </div>
         <div class="modal-footer">
		 	<button type="submit" class="btn btn-primary">
            	提交保存
            </button>
            <button type="button" class="btn btn-default" id="gbb" >
				关闭
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   </form>
</div><!-- /.modal -->



<script>
$(function(){
	$('#we_menu_runadd').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});
	
	function checkForm(){
		if( '' == $.trim($('#we_menu_name').val())){
			layer.alert('菜单名称不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#we_menu_name').focus(); 
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
			alert(data.info);
			return false;	
		}
	}
});


function stateyes(val){
		  $.post('<?php echo U("we_menu_state");?>',
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


function we_menu_make(){

		  $.post('<?php echo U("we_menu_make");?>',

		 
	function(data){

		if(data.status==1){
			layer.alert(data.info, {icon: 6});
			}else{
			layer.alert(data.info, {icon: 6});
		}
	});
	return false;
}




//排序提交
$(function(){
	$('#we_menu_order').ajaxForm({
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});

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
		}
	}
});

//删除
function del(id){
	layer.confirm('你确定要删除吗？', {icon: 3}, function(index){
	layer.close(index);
	window.location.href="/Admin/We/we_menu_del/we_menu_id/"+id+"";
	});
}

//显示修改自定义菜单
function we_menu_edit(val){
		  $.post('<?php echo U("we_menu_edit");?>',
		  {we_menu_id:val},
	function(data){
		if(data.status==1){
				$(document).ready(function(){
					$("#myModaledit").show(300);
					$("#editwe_menu_id").val(data.we_menu_id);
					$("#editwe_menu_name").val(data.we_menu_name);
					$("#editwe_menu_leftid").val(data.we_menu_leftid);
					$("#editwe_menu_type").val(data.we_menu_type);
					$("#editwe_menu_typeval").val(data.we_menu_typeval);
				});
			}else{

		}
	});
	return false;
}

//修改模态框状态
$(document).ready(function(){
	$("#myModaledit").hide();
	$("#gb").click(function(){
		$("#myModaledit").hide(200);
	});
	$("#gbb").click(function(){
		$("#myModaledit").hide(200);
	});
	$("#gbbb").click(function(){
		$("#myModaledit").hide(200);
	});
});

$(function(){
	$('#we_menu_runedit').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});
	
	function checkForm(){
		if( '' == $.trim($('#editwe_menu_name').val())){
			layer.alert('菜单名称不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#editwe_menu_name').focus(); 
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
			alert(data.info);
			return false;	
		}
	}
});


</script>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
				<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">slackck</span>
							后台管理系统 &copy; 2015-2016
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>
            

		<!-- basic scripts -->


		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/Public/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="/Public/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="/Public/assets/js/maxlength.js"></script>
		<script src="/Public/assets/js/ace/ace.js"></script>
		<script src="/Public/assets/js/ace/ace.sidebar.js"></script>
		<script src="/Public/assets/js/ace/ace.submenu-hover.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			   $('#sidebar2').insertBefore('.page-content');
			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			   
			   
			   $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
				 if(event_name == 'sidebar_fixed') {
					 if( $('#sidebar').hasClass('sidebar-fixed') ) {
						$('#sidebar2').addClass('sidebar-fixed');
						$('#navbar').addClass('h-navbar');
					 }
					 else {
						$('#sidebar2').removeClass('sidebar-fixed')
						$('#navbar').removeClass('h-navbar');
					 }
				 }
			   }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);
			})
		</script>

    
		</div><!-- /.main-container -->
	</body>
</html>