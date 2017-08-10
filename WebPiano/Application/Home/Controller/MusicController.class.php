<?php 
namespace Home\Controller;
use Think\Controller;
class MusicController extends Controller{
	public function index(){
		$res=D('Music')->getMusic();
    	return returnjson(1,'获取成功',$res);
	}
}