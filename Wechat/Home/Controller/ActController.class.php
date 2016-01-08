<?php
namespace Home\Controller;

use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class ActController extends Controller{
	public function act_bus() {
		
		$Weixin = new \Home\Controller\CommonController();
		if (empty($_SESSION['openid'])){
	       if(!isset($_GET['code'])){            
               header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$this->appId."&redirect_uri=http://wx.xmhdwonder.com/wechat.php/Act/act_bus.html&response_type=code&scope=snsapi_base&state=1#wechat_redirect");
               exit;           
           }
			$code = $_GET['code'];
			$access_token_arr = $Weixin->WechatAuth->getAccessToken('code',$code);
			//cookie('openid',$access_token_arr['openid'],86400*7);
			session('openid',$access_token_arr['openid']);//session 保存用户id
		}	
			
		$globals_access_token = $Weixin->WechatAuth->getAccessToken();//必须要有，至于什么用处还不知道
		$userInfo = $Weixin->WechatAuth->userInfo($_SESSION['openid']);
		
		/*
		 * 微信验证成功，保存用户openid。先判断
		 */
		$act_bus=M('act_bus');
		
		
		
		$check_openid=$act_bus->where(array('act_bus_openid'=>$_SESSION['openid']))->find();
        $check=$act_bus->where(array('act_bus_openid'=>$_SESSION['openid']))->find();
		if (empty($check_openid)){//用户不存在，页面完整显示
			$we_data=array(
					'act_bus_openid'=>$_SESSION['openid'],//参加者微信唯一识别ID
			);
			$act_bus_id=M('act_bus')->add($we_data);//数据添加完成，返回用户ID，进行下一步报名操作
			session('act_bus_id',$act_bus_id);//session 保存用户id
			
			$this->display();
		}else{//用户存在，不显示报名入口
           
			$this->assign('user_info',$check_openid);//传递用户所有信息
			$this->assign('check',$check);
			session('act_bus_id',$check_openid['act_bus_id']);//session 保存用户id
			$this->display();
		}
		
		
		

			
	}
	
	
	/*
	 * 报名提交资料
	 */
	public function act_bus_runadd(){
		if(!IS_AJAX){
			$this->error('提交方式错误',0,0);
		}else{
		$act_bus=M('act_bus');
		$sl_data=array(
				'act_bus_id'=>$_SESSION['act_bus_id'],//用户ID
				'act_bus_tel'=>I('act_bus_tel'),//手机
				'act_bus_cph'=>I('act_bus_cph'),//车牌号
				'act_bus_cjh'=>I('act_bus_cjh'),//车架号
				'act_bus_addtime'=>time(),//添加时间戳
				'act_bus_oopp'=>1,//添加时间戳
		);
		$act_bus->save($sl_data);
		$this->success('OK！快找朋友帮忙点赞',U('act_bus'),1);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
                