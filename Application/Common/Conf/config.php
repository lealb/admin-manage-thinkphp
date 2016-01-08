<?php
return array(

	//数据库配置
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 数据库连接地址
	'DB_NAME'   => 'adminmanage', // 数据库名
	'DB_USER'   => 'root', // 数据库用户名
	'DB_PWD'    => '1314520', // 数据库密码
	'DB_PORT'   => 3306, // 数据库端口
	'DB_PREFIX' => 'mr_', // 数据库前缀 
	'DB_CHARSET'=> 'utf8', // 数据库编码
	'DB_DEBUG'  =>  TRUE, // 是否开启调试模式

	//设置URL_MODEL URL重写
	'URL_MODEL'=>2,
 	//设置禁止访问的模块列表
    'MODULE_DENY_LIST'      => array('Common','Runtime','Api'),
    //设置允许访问的模块
    'MODULE_ALLOW_LIST'     => array('Home','Admin'),
	'DEFAULT_MODULE'=>'Home',
	'DB_LIKE_FIELDS'=>'news_title|news_content|news_flag|news_open',//自动模糊查询字段
		'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',//error错误提示页面

		'URL_ROUTER_ON'   => true,
		'URL_ROUTE_RULES'=>array(
				'con/:n_id'=> 'Home/Index/news_content',//路由文章页
				'list/:c_id'=> 'Home/Index/news_list',//路由列表页
		),
);
