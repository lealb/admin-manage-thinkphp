<?php
namespace Admin\Controller;
use Think\Controller;
use Common\Controller\AuthController;
use Think\Auth;

class HelpController extends AuthController {
    public function soft(){
		$this->display();
    }

}