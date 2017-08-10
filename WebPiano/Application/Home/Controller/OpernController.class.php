<?php
namespace Home\Controller;
use Think\Controller;
class OpernController extends Controller{
	public function index(){
		$isuser=0;
    	if(session('user')){
    		$reg=D('User')->getUserById(session('user')['user_id']);
    		$style_id=$reg['style_id'];
            $isuser=1;
    	}elseif(session('style_id')){
    		$style_id=session('style_id');
    	}else{
    		$style_id=1;
    	}
    	$res=D('Style')->getStyleById($style_id);
    	$this->assign('color',$res['name']);
        $this->assign('isuser',$isuser);
    	$data['status']=1;
    	$style=D('Style')->getStyle($data);
    	$this->assign('styles',$style);
        $this->display();
	}
    public function orderbytime(){
        if(session('user')){
            $collects=D('Collect')->getCollectByUserId(session('user')['user_id']);
            $this->assign('collects',$collects);
        }
        if($_GET&&$_GET['name']!=''){
            $data=$_GET;
            $this->assign('name',$data['name']);
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 9;
        $operns = D("Opern")->getOpernByTime($data,$page,$pageSize);

        $opernCount = D("Opern")->getopernCount($data);
        $res = new \Think\Page($opernCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('operns',$operns);
        
        $this->display("Opern/main");
    }
    public function orderbycount(){
        if(session('user')){
            $collects=D('Collect')->getCollectByUserId(session('user')['user_id']);
            $this->assign('collects',$collects);
        }
        if($_GET&&$_GET['name']!=''){
            $data=$_GET;
            $this->assign('name',$data['name']);
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 9;
        $operns = D("Opern")->getOpernByCount($data,$page,$pageSize);

        $opernCount = D("Opern")->getopernCount($data);
        $res = new \Think\Page($opernCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('operns',$operns);
        
        $this->display("Opern/main");
    }
    public function info(){
        if(session('user')){
            $collects=D('Collect')->getCollectByUserId(session('user')['user_id']);
            $this->assign('collects',$collects);
        }
        if(!$_GET['id']||!is_numeric($_GET['id'])){
            $this->assign('message','id不合法');
            $this->display("Index/error");
            exit;
        }
        $opern=D("Opern")->getOpernById($_GET['id']);

        if($opern){
            $this->assign('opern',$opern);
            $this->display('info');

        }else{
            $this->assign('message','未找到该曲谱');
            $this->display("Index/error");
            exit;
        }
    }
}