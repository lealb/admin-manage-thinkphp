<?php
namespace Home\Controller;
use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;

class CommonController extends Controller {
    public function _initialize(){
    	$we=M('sys')->where(array('sys_id'=>1))->find();
    	$config = array(
    			'APPID'=>$we['wesys_appid'],
    			'APPSECRET'=>$we['wesys_appsecret'],
    			'TOKEN'=>$we['wesys_token'],
    			'CRYPT'=>'JqdIv51yRgAc2nX2gjjrtP7xXRMpCXU3dyuwxvtcomy',
    	);
    	C($config);
    	$appId='wx3e5b1606b21cc3bb';
    	$appSecret='9225a5a6d2da8f0571cdb41353bebcd7';
    	$this->appId = $appId;
    	$this->appSecret =$appSecret;
    	$this->WechatAuth =  new WechatAuth($this->appId,$this->appSecret);
    }
}