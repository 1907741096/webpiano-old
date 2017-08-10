<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller{
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

        //查找置顶
        $data['stick']=1;
        $newsstick = D("News")->getNews($data,1,3);
        $this->assign('newsstick',$newsstick);
    	
        $this->display();
	}
    public function main(){
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

        //查找所有文章
        if($_GET&&$_GET['title']!=''){
            $data=$_GET;
            $this->assign('title',$data['title']);
        }
        $data['stick']=0;
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 8;
        $news = D("News")->getNews($data,$page,$pageSize);
        for($i=0 ; $i<count($news) ; $i++){
            $user=D('User')->getUserById($news[$i]['user_id']);
            $news[$i]['author']=$user['name'];
            $news[$i]['face']=$user['face'];
        }
        $newsCount = D("News")->getnewsCount($data);
        $res = new \Think\Page($newsCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
        $this->assign('news',$news);
        
        $this->display();
    }
    public function add(){
        if($_POST){
            if(session('user')==null){
                return returnjson(0,'请先登录');
            }
            if(!isset($_POST['title'])||trim($_POST['title'])==''){
                return returnjson(0,'标题不能为空');
            }      
            $_POST['user_id']=session('user')['user_id'];
            $_POST['create_time']=time();
            $newsId = D("News")->addNews($_POST);
            if($newsId) {
                return returnjson(1,'添加成功',$newsId);
            }
            return returnjson(0,'新增失败',$newsId);
        }
    }
    public function info(){
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

        if(!$_GET['id']||!is_numeric($_GET['id'])){
            $this->assign('message','id不合法');
            $this->display("Index/error");
            exit;
        }
        $news=D("News")->getNewsById($_GET['id']);
        $user=D('User')->getUserById($news['user_id']);
        $news['face']=$user['face'];
        $news['author']=$user['name'];
        if($news){
            $comments=D('Comment')->getCommentById($news['news_id']);
            for($i=0 ; $i<count($comments) ; $i++){
                $user=D('User')->getUserById($comments[$i]['user_id']);
                $comments[$i]['name']=$user['name'];
                $comments[$i]['face']=$user['face'];
            }
            $this->assign('comments',$comments);
            $this->assign('news',$news);
            $this->display('info');

        }else{
            $this->assign('message','未找到该帖子');
            $this->display("Index/error");
            exit;
        }
    }
    public function delete(){
        try{
            if($_POST){
                $id=$_POST['id'];
                $status=$_POST['status'];
                $res=D("News")->updateStatusById($id,$status);
                if($res){
                    return returnjson(1,'删除成功');
                }else{
                    return returnjson(0,'删除失败');
                }
            }
        }catch(Exception $e){
            return returnjson(0,$e->getMessage());
        }
        return returnjson(0,'没有提交的数据');
    }
}