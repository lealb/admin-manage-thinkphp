<?php
namespace Common\Controller;
use Think\Controller;

class CommonController extends Controller{
    public function _empty(){
    	session(null);
		$this->error('此操作无效',U('Login/login'),0);
    }
}