<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Controller\AuthController;
use Think\Auth;
use Com\Wechat;
use Com\WechatAuth;

define('appid','wx3e5b1606b21cc3bb');
define('appsecret','9225a5a6d2da8f0571cdb41353bebcd7');

class WeController extends AuthController {
    
/************************************自定义菜单模块****************************************/
/*
 * 自定义菜单列表
 */
    public function we_menu(){
   	
    	$nav = new \Org\Util\Leftnav;
    	$we_menu=M('we_menu')->order('we_menu_order')->select();
    	$arr = $nav::menu($we_menu);
    	$menu_top=M('we_menu')->where(array('we_menu_leftid'=>0))->order('we_menu_order')->select();
    	$this->assign('menu_top',$menu_top);
	   	$this->assign('we_menu',$arr);
    	$this->display();
    }

/*
 * 添加自定义菜单方法
 */
    public function we_menu_runadd(){
    	if(!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$we_menu=M('we_menu');
    		$sldata=array(
    				'we_menu_leftid'=>I('we_menu_leftid'),
    				'we_menu_name'=>I('we_menu_name'),
    				'we_menu_type'=>I('we_menu_type'),
    				'we_menu_typeval'=>I('we_menu_typeval'),
    				'we_menu_order'=>I('we_menu_order'),
    				'we_menu_open'=>I('we_menu_open'),
    		);
    		$we_menu->add($sldata);
    		$this->success('自定义菜单添加成功',U('we_menu'),1);
    	}
    }

/*
 * 自定义菜单状态修改
 */
    public function we_menu_state(){
    	$id=I('x');
    	$statusone=M('we_menu')->where(array('we_menu_id'=>$id))->getField('we_menu_open');//判断当前状态情况
    	if($statusone==1){
    		$statedata = array('we_menu_open'=>0);
    		$auth_group=M('we_menu')->where(array('we_menu_id'=>$id))->setField($statedata);
    		$this->success('状态禁止',1,1);
    	}else{
    		$statedata = array('we_menu_open'=>1);
    		$auth_group=M('we_menu')->where(array('we_menu_id'=>$id))->setField($statedata);
    		$this->success('状态开启',1,1);
    	}
    
    }

/*
 * 自定义菜单排序
 */
    public function we_menu_order(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$we_menu=M('we_menu');
    		foreach ($_POST as $id => $sort){
    			$we_menu->where(array('we_menu_id' => $id ))->setField('we_menu_order' , $sort);
    		}
    		$this->success('排序更新成功',U('we_menu'),1);
    	}
    }

/*
 * 返回修改菜单内容
 */
    public function admin_rule_edit(){
    	$admin_rule=M('auth_rule')->where(array('id'=>I('id')))->find();
    	$this->assign('rule',$admin_rule);
    	$this->display();
    }

/*
 * 修改自定义菜单
 */
    public function admin_rule_runedit(){
        	if(!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$admin_rule=M('auth_rule');
    		$sldata=array(
    				'id'=>I('id'),
    				'name'=>I('name'),
    				'title'=>I('title'),
    				'status'=>I('status'),
    				'css'=>I('css'),
    				'sort'=>I('sort'),
    		);
    		$admin_rule->save($sldata);
    		$this->success('权限修改成功',U('admin_rule'),1);
    	}
    }

/*
 * 删除自定义菜单
 */
    public function we_menu_del(){
    	M('we_menu')->where(array('we_menu_id'=>I('we_menu_id')))->delete();
    	$this->redirect('we_menu');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
/*
 * 生成自定义菜单
 */
    public function we_menu_make(){
    	
    	
    	
    	$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".appid."&secret=".appsecret."";
    	$ch=curl_init();//初始化
    	curl_setopt($ch,CURLOPT_URL,$url);
    	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    	$output=curl_exec($ch);
    	curl_close($ch);
    	$jsoninfo=json_decode($output,true);
    	$access_token=$jsoninfo['access_token'];
    	
    	$data = ' {
     "button":[
     {
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {
               "type":"view",
               "name":"搜索",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';
    	
    	
    	$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$access_token";
    	$ch=curl_init();//初始化
    	curl_setopt($ch,CURLOPT_URL,$url);
    	curl_setopt($ch,CURLOPT_POST,1);
    	curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
    	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
    	curl_exec($ch);
    	curl_close($ch);

    }


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
/*
 * 修改自定义菜单显示
 */
    public function we_menu_edit(){
    	$we_menu_id=I('we_menu_id');
    	$we_menu=M('we_menu')->where(array('we_menu_id'=>$we_menu_id))->find();
    	$sl_data['we_menu_id']=$we_menu['we_menu_id'];
    	$sl_data['we_menu_name']=$we_menu['we_menu_name'];
    	$sl_data['we_menu_leftid']=$we_menu['we_menu_leftid'];
    	$sl_data['we_menu_type']=$we_menu['we_menu_type'];
    	$sl_data['we_menu_typeval']=$we_menu['we_menu_typeval'];
    	$sl_data['we_menu_order']=$we_menu['we_menu_order'];
    	$sl_data['status']=1;
    	$this->ajaxReturn($sl_data,'json');
    }
    
/*
 * 修改自定义菜单方法
 */
    public function we_menu_runedit(){
    	if (!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$sl_data=array(
    				'we_menu_id'=>I('we_menu_id'),
    				'we_menu_name'=>I('we_menu_name'),
    				'we_menu_leftid'=>I('we_menu_leftid'),
    				'we_menu_type'=>I('we_menu_type'),
    				'we_menu_typeval'=>I('we_menu_typeval'),
    				'we_menu_order'=>I('we_menu_order'),
    
    		);
    		M('we_menu')->save($sl_data);
    		$this->success('自定义菜单修改成功',U('we_menu'),1);
    	}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}