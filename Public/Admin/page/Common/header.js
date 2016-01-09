//主要用于处理Common header页面的相关操作
try{ace.settings.check('navbar' , 'fixed')}catch(e){}

//退出操作
$("#logout").click(function(){
	layer.confirm('你确定要退出吗？', {icon: 3}, function(index){
    layer.close(index);
    window.location.href="{:U('Login/logout')}";
	});
});
	
if('ontouchstart' in document.documentElement) document.write("<script src='__PUBLIC__/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
	  
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