<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function index(){
		$this->display();
	}
	public function checklogin(){
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(!trim($username)){
			return returnjson(0,'用户名不能为空');
		}
		if(!trim($password)){
			return returnjson(0,'密码不能为空');
		}
		$admin=D('Admin')->getAdminByUsername($username);
		if(!$admin){
			return returnjson(0,'用户不存在');
		}
		if($admin['status']!=1){
			return returnjson(0,'管理员已被冻结');
		}
		if($admin['password']!=getMd5Password($password)){
			return returnjson(0,'密码错误');
		}
		session('admin', $admin);
		$data['lastlogin_time']=time();
		D("Admin")->updatelogintime($admin['admin_id'],$data);
		return returnjson(1,'登陆成功');
	}
	public function loginout(){
		session('admin', null);
        jump('admin.php?c=login');
	}
}