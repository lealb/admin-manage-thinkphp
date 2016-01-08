<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 目前为第一套前台企业网站模板，通用参数功能需要进一步完善
 */

class IndexController extends Controller {
/*
 * 公共控制器，输出导航以及底部提交信息
 */
	Public function _initialize(){
		$column=M('column');
    	$map['column_leftid'] = array('NEQ',0);
    	$nav = new \Org\Util\Leftnav;
    	$column_one=$column->where(array('column_leftid'=>0,'column_open'=>1))->order('column_order')->select();//顶级数据
    	$column_two=$column->where($map)->order('column_order')->select();//所有数据
    	$arr = $nav::index_top($column_one,$column_two);
    	$this->assign('arr',$arr);
    	
    	$sys=M('sys')->where(array('sys_id'=>1))->find();
    	$this->assign('sys',$sys);
	}

/*
 * 首页数据控制器
 */
    public function index(){

    	/*
    	 * 大图图片切换
    	 */
    	$plug_ad=M('plug_ad')->where(array('plug_ad_adtypeid'=>1))->select();
    	$this->assign('plug_ad',$plug_ad);
    	
    	/*
    	 * 成功案例ID=9
    	 */
    	$news=M('news');
    	$case=$news->where(array('news_columnid'=>9))->limit(0,10)->select();
    	$this->assign('case',$case);
    	/*
    	 * 新闻中心ID=7
    	 */
    	$news_3=$news->where(array('news_columnid'=>7,'news_columnid'=>8))->limit(0,3)->order('news_time')->select();
    	$this->assign('news_3',$news_3);
    	
    	
		$this->theme('default')->display();
    }
    
/*
 * 成功案例页面控制器
 */
	public function index_case(){
		$this->theme('default')->display();
	}
    
/*
 * 列表页控制器
 * 每块注释直接进行了传参
 */
	public function news_list(){
		$c_id=I('c_id');
		$map['news_open']= array('eq',1);
		$map['news_columnid']= array('eq',$c_id);
		
		$count= M('news')->where($map)->count();// 查询满足要求的总记录数
		$Page= new \Think\Page($count,C('DB_PAGENUM'));// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $Page->show();// 分页显示输出
		
		
		/*
		 * 获取单个栏目数据
		 */
		$column_find=M('column')->where(array('c_id'=>$c_id))->find();//栏目数据
		$this->assign('column_find',$column_find);

		/*
		 * 获取全部同栏目数据
		 */
		$column_list=M('column')->where(array('column_leftid'=>$column_find['column_leftid']))->select();//栏目数据
		$this->assign('column_list',$column_list);
		
		/*
		 * 获取该栏目文章列表
		 */
		$news_list=M('news')->where($map)->limit($Page->firstRow.','.$Page->listRows)->order('news_time desc')->select();//新闻列表
		$this->assign('news_list',$news_list);
		$this->assign('page',$show);

		/*
		 * 获取该栏目右侧图文热门排行
		 */
		$map_pic['news_open']= array('eq',1);
		$map_pic[] ='FIND_IN_SET("p",news_flag) ';
		$news_pichot=M('news')->where($map_pic)->order('news_hits desc')->limit(0,5)->select();//右侧热门图文
		$this->assign('news_pichot',$news_pichot);

		$this->theme('default')->display();
	}
    
    
/*
 * 内容页控制器
 */
	public function news_content(){
		
		$n_id=I('n_id');
		$news_content=D('News')->where(array('n_id'=>$n_id))->relation(true)->find();
		$this->assign('news_content',$news_content);
		/*
		 * 点击增加1
		 */
		M('news')->where(array('n_id'=>$n_id))->setInc('news_hits',1);
		/*
		 * 获取该栏目右侧图文热门排行
		 */
		$map_pic['news_open']= array('eq',1);
		$map_pic[] ='FIND_IN_SET("p",news_flag) ';
		$news_pichot=M('news')->where($map_pic)->order('news_hits desc')->limit(0,5)->select();//右侧热门图文
		$this->assign('news_pichot',$news_pichot);
		
		$this->theme('default')->display();
	}
    

/*
 * 提交留言
 */
	public function plug_sug_runadd(){
		if (!IS_AJAX){
			$this->error('提交方式不正确',U('index'),0);
		}else{
			$sl_data=array(
					'plug_sug_title'=>I('plug_sug_title'),
					'plug_sug_email'=>I('plug_sug_email'),
					'plug_sug_content'=>I('plug_sug_content'),
					'plug_sug_addtime'=>time(),
					'plug_sug_ip'=>get_client_ip(),
			);
			M('plug_sug')->add($sl_data);
			$this->success('留言成功，等待管理员回复',U('index'),1);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}