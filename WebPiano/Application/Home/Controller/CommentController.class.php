<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller{
	public function index(){
        $this->display();
	}
    public function add(){
        if($_POST){
            if(session('user')==null){
                return returnjson(0,'请先登录');
            } 
            if(!isset($_POST['content'])||trim($_POST['content'])==''){
                return returnjson(0,'评论不能为空');
            }      
            $_POST['user_id']=session('user')['user_id'];
            $_POST['create_time']=time();
            $commentId = D("Comment")->addComment($_POST);
            if($commentId) {
                $news=D('News')->getNewsById($_POST['news_id']);
                $comment=$news['comment'];
                $comment++;
                $data['comment']=$comment;
                D('News')->updateNewsById($_POST['news_id'],$data);
                return returnjson(1,'添加成功',$commentId);
            }
            return returnjson(0,'新增失败',$commentId);
        }
    }
    public function delete(){
        try{
            if($_POST){
                $id=$_POST['id'];
                $status=$_POST['status'];
                $res=D("Comment")->updateStatusById($id,$status);
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