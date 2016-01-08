<?php
namespace Admin\Controller;
use Think\Controller;


class IndexController extends Controller {
	

	
    public function index(){
    	if (empty($_SESSION['aid'])){
    		$this->redirect('Login/login');
    	}
    	$news=M('news');
    	$info = array(
    			'PCTYPE'=>PHP_OS,
    			'RUNTYPE'=>$_SERVER["SERVER_SOFTWARE"],
    			'ONLOAD'=>ini_get('upload_max_filesize'),
    			'ThinkPHPTYE'=>THINK_VERSION,
    	);
    	
    	$start=strtotime(date('Y-m-01 00:00:00'));
		$end = strtotime(date('Y-m-d H:i:s'));
		$data['news_time'] = array('between',array($start,$end));
		$news_list=$news->where($data)->order('news_hits desc')->limit(0,8)->select();//热门文章排行
		$news_count=$news->count();//总文章数
		$this->assign('news_count',$news_count);
		
		$today=strtotime(date('Y-m-d 00:00:00'));//今天开始日期
		$todata['news_time'] = array('egt',$today);
		$tonews_count=$news->where($todata)->count();//今日发表文章数
		$this->assign('tonews_count',$tonews_count);
		
		$ztday=strtotime(date('Y-m-d 00:00:00'))-60*60*24;//昨天开始日期
		$ztdata['news_time'] = array('between',array($ztday,$today));
		$ztnews_count=$news->where($ztdata)->count();//总文章数
		$this->assign('ztnews_count',$ztnews_count);
		$difday=($tonews_count-$ztnews_count)/$ztnews_count*100;//今日与昨日的差
		$this->assign('difday',$difday);
		
		$this->assign('info',$info);
		$this->assign('news_list',$news_list);
		$this->display();
    }

}