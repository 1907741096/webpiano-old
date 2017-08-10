<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $isuser=0;$isopern=0;
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

        if(session('user')){
            $collects=D('Collect')->getCollectByUserId(session('user')['user_id']);
            if($collects){
                foreach ($collects as $k => $collect) {
                    $opern=D('Opern')->getOpernById($collect['opern_id']);
                    $collects[$k]['thumb']=$opern['thumb'];
                    $collects[$k]['name']=$opern['name'];
                }
                $isopern=1;
            }
            $this->assign('isopern',$isopern);
            $this->assign('collects',$collects);
        }
    	$this->assign('styles',$style);
        $this->display();
    }
}