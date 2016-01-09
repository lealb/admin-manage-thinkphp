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
		<link rel="stylesheet" href="/Public/assets/css/font-awesome.css" />
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
								<img class="nav-user-photo" src="/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
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
<script src="/Public/Admin/header.js">></script>
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
<!-- 点击模态框（Modal） -->
								<button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal">
									<i class="ace-icon fa fa-bolt bigger-110"></i>
										添加链接
								</button>
								
							</div>

								<div class="col-xs-12 col-sm-3">
								<form name="admin_list_sea" class="form-search" method="post" action="/Admin/Plug/plug_link_list">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="ace-icon fa fa-check"></i>
										</span>
										<input type="text" name="val" id="val" class="form-control search-query admin_sea" value="<?php echo ($val); ?>" placeholder="输入链接名称或URL" />
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
									<a href="/Admin/Plug/plug_link_list">
									<button type="button" class="btn btn-xs  btn-purple">
										<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
										显示全部
									</button>
									</a>
								  </div>
							</div>

							<div class="row maintop">
								<div class="col-xs-12 col-sm-3">
								<a href="/Admin/Plug/plug_link_list">
									<button class="btn btn-xs btn-warning">
											返回列表
									</button>
								</a>
								<?php if(is_array($link_type)): foreach($link_type as $key=>$v): ?><a href="/Admin/Plug/plug_link_list/type/<?php echo ($v["plug_linktype_id"]); ?>">
									<button class="btn btn-xs btn-warning">
											<?php echo ($v["plug_linktype_name"]); ?>
									</button>
									</a><?php endforeach; endif; ?>
									</div>
							</div>

		

							<div class="row">
							    <div class="col-xs-12">
										<div>
											<table width="100%" class="table table-striped table-bordered table-hover" id="dynamic-table">
												<thead>
													<tr>
													  <th width="6%">ID</th>
													  <th width="11%">链接名称</th>
													  <th width="27%">链接URL</th>
													  <th width="14%">联系QQ</th>
													  <th width="14%">所属栏目</th>
													  <th width="14%">添加时间</th>
													  <th width="8%" style="border-right:#CCC solid 1px;">状态</th>
													  <th width="6%" style="border-right:#CCC solid 1px;">操作</th>
												  </tr>
												</thead>

												<tbody>
                                                
                                                <?php if(is_array($plug_link)): foreach($plug_link as $key=>$v): ?><tr>
														<td height="28" ><?php echo ($v["plug_link_id"]); ?></td>
														<td><?php echo ($v["plug_link_name"]); ?></td>
														<td><a href="<?php echo ($v["plug_link_url"]); ?>" target="_blank"><?php echo ($v["plug_link_url"]); ?></a></td>
														<td><?php echo ($v["plug_link_qq"]); ?></td>
														<td><?php echo ($v["plug_linktype_name"]); ?></td>
														<td><?php echo (date('Y-m-d',$v["plug_link_addtime"])); ?></td>
														<td>
														<?php if($v[plug_link_open] == 1): ?><a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["plug_link_id"]); ?>);" title="已开启">
														<div id="zt<?php echo ($v["plug_link_id"]); ?>"><button class="btn btn-minier btn-yellow">状态开启</button></div>
														</a>
														<?php else: ?>
														<a class="red" href="javascript:;" onclick="return stateyes(<?php echo ($v["plug_link_id"]); ?>);" title="已禁用">
														<div id="zt<?php echo ($v["plug_link_id"]); ?>"><button class="btn btn-minier btn-danger">状态禁用</button></div>
														</a><?php endif; ?>														</td>
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green"  href="javascript:;" onclick="return plug_link_edit(<?php echo ($v["plug_link_id"]); ?>);"  title="修改">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>																</a>
																<a class="red" href="javascript:;" onclick="return del(<?php echo ($v["plug_link_id"]); ?>);" title="删除">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>																</a>															</div>														</td>
													</tr><?php endforeach; endif; ?>   
                                                  <tr>
													  <td height="50" colspan="9" align="left"><?php echo ($page); ?></td>
												  </tr>
												</tbody>
										  </table>
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

<!-- 显示模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="form-horizontal" name="plug_link_add" id="plug_link_add" method="post" action="/Admin/Plug/plug_link_runadd">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
               aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
               添加友情链接
            </h4>
         </div>
         <div class="modal-body">
            
			
						<div class="row">
							<div class="col-xs-12">
								
                                	<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 所属栏目： </label>
										<div class="col-sm-10">
                                        <select name="plug_link_typeid"  class="col-sm-4 selector" >
                                        <option value="">请选择所属栏目</option>
                                        <?php if(is_array($link_type)): foreach($link_type as $key=>$v): ?><option value="<?php echo ($v["plug_linktype_id"]); ?>"><?php echo ($v["plug_linktype_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 链接名称：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_name" id="plug_link_name" placeholder="输入链接名称" class="col-xs-10 col-sm-5" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>必须是以字母开头，数字、符号组合</span>
										</div>
									</div>
                                    <div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 链接URL：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_url" id="plug_link_url" placeholder="输入链接URL" class="col-xs-10 col-sm-8" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>必须是以http://开头</span>
										</div>
									</div>
                                    <div class="space-4"></div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否审核： </label>
										<div class="col-sm-10" style="padding-top:5px;">
                                            <input name="plug_link_open" id="plug_link_open" value="1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox" />
											<span class="lbl">&nbsp;&nbsp;默认关闭</span>
										</div>
									</div>
                                    <div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 联系站长：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_qq" id="plug_link_qq" placeholder="输入QQ或其他联系方式" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 排序：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_order" id="plug_link_order" value="50" class="col-xs-10 col-sm-3" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>从小到大排序</span>
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






<!-- 显示模态框（Modal） -->
<div class="modal fade in" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-backdrop fade in" id="gbbb" style="height: 100%;"></div>
<form class="form-horizontal" name="plug_link_runedit" id="plug_link_runedit" method="post" action="/Admin/Plug/plug_link_runedit">
<input type="hidden" name="plug_link_id" id="editplug_link_id" value="" />
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
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 所属栏目： </label>
										<div class="col-sm-10">
                                        <select name="plug_link_typeid" id="editplug_link_typeid"  class="col-sm-4" >
                                        <option value="">请选择所属栏目</option>
                                        <?php if(is_array($link_type)): foreach($link_type as $key=>$v): ?><option value="<?php echo ($v["plug_linktype_id"]); ?>"><?php echo ($v["plug_linktype_name"]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                        </div>
									</div>
									<div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 链接名称：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_name" id="editplug_link_name" value="" class="col-xs-10 col-sm-5" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>必须是以字母开头，数字、符号组合</span>
										</div>
									</div>
                                    <div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 链接URL：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_url" id="editplug_link_url" value="" class="col-xs-10 col-sm-8" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>必须是以http://开头</span>
										</div>
									</div>
                                    <div class="space-4"></div>
																		
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 联系站长：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_qq" id="editplug_link_qq" value="" placeholder="输入QQ或其他联系方式" class="col-xs-10 col-sm-5" />
										</div>
									</div>
                                    <div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 排序：  </label>
										<div class="col-sm-10">
											<input type="text" name="plug_link_order" id="editplug_link_order" value="" class="col-xs-10 col-sm-3" />
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>从小到大排序</span>
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
            <button type="button" class="btn btn-default"  id="gbb" >
				关闭
            </button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   </form>
</div><!-- /.modal -->



<script>
function del(id,p){
	layer.confirm('你确定要删除吗？', {icon: 3}, function(index){
	layer.close(index);
	window.location.href="/Admin/Plug/plug_link_del/plug_link_id/"+id+"/p/"+p+"";
	});
}

function stateyes(val){
		  $.post('<?php echo U("plug_link_state");?>',
		  {x:val},
	function(data){
		if(data.status){
			if(data.info=='状态禁止'){
				var a='<button class="btn btn-minier btn-danger">状态禁用</button>'
				$('#zt'+val).html(a);
				layer.alert(data.info, {icon: 5});
				return false;
			}else{
				var b='<button class="btn btn-minier btn-yellow">状态开启</button>'
				$('#zt'+val).html(b);
				layer.alert(data.info, {icon: 6});
				return false;
			}
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

function plug_link_edit(val){
		  $.post('<?php echo U("plug_link_edit");?>',
		  {plug_link_id:val},
	function(data){
		if(data.status==1){
				$(document).ready(function(){
					$("#myModaledit").show(300);
					$("#editplug_link_id").val(data.plug_link_id);
					$("#editplug_link_name").val(data.plug_link_name);
					$("#editplug_link_url").val(data.plug_link_url);
					$("#editplug_link_qq").val(data.plug_link_qq);
					$("#editplug_link_order").val(data.plug_link_order);
					$("#editplug_link_typeid").val(data.plug_link_typeid);
				});
			}else{

		}
	});
	return false;
}


$(function(){
	$('#plug_link_add').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});
	
	function checkForm(){
		if( '' == $(".selector").val()){
			layer.alert('链接所属栏目不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('.selector').focus(); 
			});
			return false;
		}
	
		if( '' == $.trim($('#plug_link_name').val())){
			layer.alert('友情链接名称不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#plug_link_name').focus(); 
			});
			return false;
		}
		
		if( '' == $.trim($('#plug_link_url').val())){
			layer.alert('友情链接URL不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#plug_link_url').focus(); 
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


$(function(){
	$('#plug_link_runedit').ajaxForm({
		beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
		success: complete, // 这是提交后的方法
		dataType: 'json'
	});
	
	function checkForm(){
		if( '' == $("#editplug_link_typeid").val()){
			layer.alert('链接所属栏目不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#editplug_link_typeid').focus(); 
			});
			return false;
		}
	
		if( '' == $.trim($('#editplug_link_name').val())){
			layer.alert('友情链接名称不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#editplug_link_name').focus(); 
			});
			return false;
		}
		
		if( '' == $.trim($('#editplug_link_url').val())){
			layer.alert('友情链接URL不能为空', {icon: 6}, function(index){
 			layer.close(index);
			$('#editplug_link_url').focus(); 
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