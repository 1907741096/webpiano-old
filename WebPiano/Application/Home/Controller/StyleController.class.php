<?php
namespace Home\Controller;
use Think\Controller;
class StyleController extends Controller{
	public function index(){

	}
	public function changestyle(){
		if(!is_numeric($_POST['id'])){
			return returnjson(0,'id不合法');
		}
		$data['style_id']=$_POST['id'];
		if(session('user')){
			$res=D('User')->updateStyleById(session('user')['user_id'],$data);
			session('style_id',$_POST['id']);
		}else{
			session('style_id',$_POST['id']);
		}
		$reg=D('Style')->getStyleById($_POST['id']);
		return returnjson(1,'修改成功',$reg);
	}
}