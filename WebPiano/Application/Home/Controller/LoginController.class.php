<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function index(){
		if(session('user')){
    		$reg=D('User')->getUserById(session('user')['user_id']);
    		$style_id=$reg['style_id'];
    	}elseif(session('style_id')){
    		$style_id=session('style_id');
    	}else{
    		$style_id=1;
    	}
    	$res=D('Style')->getStyleById($style_id);
    	$this->assign('color',$res['name']);
    	
		$this->display();
	}
	public function loginout(){
		session('user', null);
		jump('index.php');
	}
	public function checklogin(){
		$data=$_POST;
		if(trim($_POST['username']=='')){
			return returnjson(0,'用户名不能为空');
		}
		if(trim($_POST['password']=='')){
			return returnjson(0,'密码不能为空');
		}
		$user=D('User')->getUserByUsername($_POST['username']);
		if($user){
			if($user['status']!=1){
				return returnjson(0,'该账号已被冻结，请联系管理员');
			}
			if($user['password']!=getMd5Password($_POST['password'])){
				return returnjson(0,'密码错误');
			}
			session('user',$user);
			return returnjson(1,'登陆成功');
		}else{
			return returnjson(0,'用户名不存在');
		}
	}
	public function reg(){
		if(session('user')){
    		$reg=D('User')->getUserById(session('user')['user_id']);
    		$style_id=$reg['style_id'];
    	}elseif(session('style_id')){
    		$style_id=session('style_id');
    	}else{
    		$style_id=1;
    	}
    	$res=D('Style')->getStyleById($style_id);
    	$this->assign('color',$res['name']);
		$this->display();
	}
	public function checkreg(){
		if(trim($_POST['username']=='')){
			return returnjson(0,'用户名不能为空');
		}
		if(trim($_POST['password']=='')){
			return returnjson(0,'密码不能为空');
		}
		if($_POST['password']!=$_POST['password2']){
			return returnjson(0,'两次密码不一致');
		}
		$reg=D('User')->getUserByUsername($_POST['username']);
		if($reg){
			return returnjson(0,'用户名已被注册');
		}
		$_POST['password']=getMd5Password($_POST['password']);
		$_POST['create_time']=time();
		$reg=D('User')->addUser($_POST);
		if($reg){
			$data['name']="Pianoer".$reg;
			D("User")->updateUserById($reg,$data);
			$user=D('User')->getUserByUsername($_POST['username']);
			session('user',$user);
			return returnjson(1,'注册成功，已为您登录');
		}else{
			return returnjson(0,'注册失败');
		}
	}
}