<?php
namespace Home\Controller;
use Think\Controller;
class InfoController extends Controller{
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
    	$this->assign('user',session('user'));
        $this->display();
	}
	public function main(){
		$userbyid=D('User')->getUserById(session('user')['user_id']);
		session('user',$userbyid);
		$this->assign('userbyid',session('user'));
		$this->display();
	}
	public function edit(){
        if($_POST['user_id']==''||!is_numeric($_POST['user_id'])){
            return returnjson('ID不合法');
        }
        if($_POST['email']==''){
            unset($_POST['email']);
        }
        $user_id=$_POST['user_id'];
        unset($_POST['user_id']);
        $res= D("User")->updateUserById($user_id,$_POST);
        if($res){
        	$userbyid=D('User')->getUserById($user_id);
			session('user',$userbyid);
            return returnjson(1,'更新成功');
        }
        return returnjson(0,'更新失败');
	}
	public function news(){
		//查找所有文章
        if($_GET&&$_GET['title']!=''){
            $data=$_GET;
            $this->assign('title',$data['title']);
        }
        $data['user_id']=session('user')['user_id'];
        $data['status']=1;
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $news = D("News")->getNews($data,$page,$pageSize);
        $newsCount = D("News")->getnewsCount($data);
        $res = new \Think\Page($newsCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('news',$news);
        $this->display();
	}
	public function comment(){
		//查找所有评论
        if($_GET&&$_GET['content']!=''){
            $data=$_GET;
            $this->assign('content',$data['content']);
        }
        $data['user_id']=session('user')['user_id'];
        $data['status']=1;
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $Comments = D("Comment")->getComment($data,$page,$pageSize);
        $CommentCount = D("Comment")->getCommentCount($data);
        $res = new \Think\Page($CommentCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('comments',$Comments);
        $this->display();
	}
}