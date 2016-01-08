<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller{
    public function index(){
    	session(null);
		$this->error('此操作无效',U('Login/login'),0);
    }
    


}