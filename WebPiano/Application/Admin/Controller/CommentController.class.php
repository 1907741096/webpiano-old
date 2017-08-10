<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController{
	public function index(){
		$data = array();
		if($_GET&&$_GET['content']!=''){
			$data=$_GET;
			$this->assign('content',$data['content']);
		}
		$data['status'] = array('neq',-1);
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $comments = D("Comment")->getComment($data,$page,$pageSize);
        for($i=0 ; $i<count($comments) ; $i++){
        	$news=D('News')->getNewsById($comments[$i]['news_id']);
        	$comments[$i]['title']=$news['title'];
        }
        $commentCount = D("Comment")->getcommentCount($data);
        $res = new \Think\Page($commentCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
		$this->assign('comments',$comments);
		$this->display();
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
                $res = D("Comment")->updateStatusById($id, $status);
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