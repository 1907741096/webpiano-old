<?php
namespace Admin\Controller;
use Think\Controller;
class OpernController extends CommonController{
	public function index(){
		$data = array();
		if($_GET&&$_GET['name']!=''){
			$data=$_GET;
			$this->assign('name',$data['name']);
		}
		$data['status'] = array('neq',-1);
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $operns = D("Opern")->getOpernByTime($data,$page,$pageSize);

        $opernCount = D("Opern")->getopernCount($data);
        $res = new \Think\Page($opernCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
		$this->assign('operns',$operns);
		$this->display();
	}
    public function add(){
        if($_POST){
            if(!isset($_POST['name'])||trim($_POST['name'])==''){
                return returnjson(0,'谱名不能为空');
            }
            if(!isset($_POST['thumb'])||trim($_POST['thumb'])==''){
                return returnjson(0,'请添加曲谱');
            }
            if(isset($_POST['opern_id'])&&$_POST['opern_id']!=''){
                if(!is_numeric($_POST['opern_id'])){
                    return returnjson('ID不合法');
                }
                $opern_id=$_POST['opern_id'];
                unset($_POST['opern_id']);
                $res= D("Opern")->updateOpernById($opern_id,$_POST);
                if($res){
                    return returnjson(1,'更新成功');
                }
                return returnjson(0,'更新失败');
            }
            $_POST['create_time']=time();
            $opernId = D("Opern")->addOpern($_POST);
            if($opernId) {
                return returnjson(1,'添加成功',$opernId);
            }
            return returnjson(0,'新增失败',$opernId);
        }else{
            if($_GET['id']){
                $opern=D("Opern")->getOpernById($_GET['id']);
                $this->assign('opernbyid',$opern);
            }
            $this->display();
        }
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
                $res = D("Opern")->updateStatusById($id, $status);
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
                $res=D("Opern")->updateStatusById($id,$status);
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