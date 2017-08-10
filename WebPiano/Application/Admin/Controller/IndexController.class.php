<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController{
	public function index(){
		$this->display();
	}
	public function main(){
		$usercount=D('User')->getusersCount();
		$newscount=D('News')->getNewsCount();
		$operncount=D('Opern')->getOpernCount();
		$musiccount=D('Music')->getMusicsCount();
		$this->assign('usercount',$usercount);
		$this->assign('newscount',$newscount);
		$this->assign('operncount',$operncount);
		$this->assign('musiccount',$musiccount);
		$this->display();
	}
	public function error(){
		$this->display();
	}
}