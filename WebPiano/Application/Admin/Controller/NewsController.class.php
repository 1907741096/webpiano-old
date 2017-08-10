<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends CommonController{
	public function index(){
		$data = array();
		if($_GET&&$_GET['title']!=''){
			$data=$_GET;
			$this->assign('title',$data['title']);
		}
		$data['status'] = array('neq',-1);
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $news = D("News")->getNews($data,$page,$pageSize);
        for($i=0 ; $i<count($news) ; $i++){
        	$user=D('User')->getUserById($news[$i]['user_id']);
        	$news[$i]['name']=$user['name'];
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
            if(!isset($_POST['title'])||trim($_POST['title'])==''){
                return returnjson(0,'标题不能为空');
            }
            if(!isset($_POST['user_id'])||trim($_POST['user_id'])==''){
                return returnjson(0,'用户ID不能为空');
            }
            if(!($_POST['stick']==1||$_POST['stick']==0)){
                return returnjson(0,'置顶不合法');
            }
            if(!($_POST['status']==1||$_POST['status']==0)){
                return returnjson(0,'加精不合法');
            }
            if(!($_POST['status']==1||$_POST['status']==0)){
                return returnjson(0,'状态不合法');
            }
            if(isset($_POST['news_id'])&&$_POST['news_id']!=''){
                if(!is_numeric($_POST['news_id'])){
                    return returnjson('ID不合法');
                }
                $news_id=$_POST['news_id'];
                unset($_POST['news_id']);
                $res= D("News")->updateNewsById($news_id,$_POST);
                if($res){
                    return returnjson(1,'更新成功');
                }
                return returnjson(0,'更新失败');
            }
            $_POST['create_time']=time();
            $newsId = D("News")->addNews($_POST);
            if($newsId) {
                return returnjson(1,'添加成功',$newsId);
            }
            return returnjson(0,'新增失败',$newsId);
        }else{
            if($_GET['id']){
                $news=D("News")->getNewsById($_GET['id']);
                $this->assign('newsbyid',$news);
            }
            $this->display();
        }
    }
	public function changestick(){
		try {
            if ($_POST) {
                $id = $_POST['id'];
                $stick = $_POST['stick'];
                if($stick==0){
		        	$stick=1;
		        }else{
		        	$stick=0;
		        }
                // 执行数据更新操作
                $res = D("News")->updateStickById($id, $stick);
                if ($res) {
                    return returnjson(1, '操作成功');
                } else {
                    return returnjson(0, '操作失败');
                }
            }
        }catch(Exception $e) {
            return returnjson(0,$e->getMessage());
        }

        return returnjson(0,'没有提交的数据');
	}
	public function changefine(){
		try {
            if ($_POST) {
                $id = $_POST['id'];
                $fine = $_POST['fine'];
                if($fine==0){
		        	$fine=1;
		        }else{
		        	$fine=0;
		        }
                // 执行数据更新操作
                $res = D("News")->updateFineById($id, $fine);
                if ($res) {
                    return returnjson(1, '操作成功');
                } else {
                    return returnjson(0, '操作失败');
                }
            }
        }catch(Exception $e) {
            return returnjson(0,$e->getMessage());
        }
        return returnjson(0,'没有提交的数据');
	}
	public function changestatus(){
		try {
            if ($_POST) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                if($status==0){
		        	$status=1;
		        }else{
		        	$status=0;
		        }
                // 执行数据更新操作
                $res = D("News")->updateStatusById($id, $status);
                if ($res) {
                    return returnjson(1, '操作成功');
                } else {
                    return returnjson(0, '操作失败');
                }
            }
        }catch(Exception $e) {
            return returnjson(0,$e->getMessage());
        }

        return returnjson(0,'没有提交的数据');
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