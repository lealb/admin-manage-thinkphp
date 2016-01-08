<?php

namespace Admin\Controller;
use Think\Controller;

class AjaxController extends Controller{
	public function getRegion(){
		$Region=M("region");
		$map['pid']=$_REQUEST["pid"];
		$map['type']=$_REQUEST["type"];
		$list=$Region->where($map)->select();
		echo json_encode($list);
	}
	
}
