<?php
namespace Home\Controller;
use Think\Controller;
class CollectController extends Controller{
	public function index(){
        $this->display();
	}
    public function add(){
        if($_POST){
            if(session('user')==null){
                return returnjson(0,'请先登录');
            } 
            if(!$_POST['opern_id']||!is_numeric($_POST['opern_id'])){
                return returnjson(0,'ID不合法');
            }      
            $_POST['user_id']=session('user')['user_id'];
            $_POST['create_time']=time();
            $collectId = D("Collect")->addCollect($_POST);
            if($collectId) {
                $opern=D('Opern')->getOpernById($_POST['opern_id']);
                $count=$opern['count'];
                $count++;
                $data['count']=$count;
                D('Opern')->updateOpernById($_POST['opern_id'],$data);
                return returnjson(1,'添加成功',$collectId);
            }
            return returnjson(0,'新增失败');
        }
    }
    public function delete(){
        try{
            if($_POST){
                $id=$_POST['id'];
                $status=$_POST['status'];
                $res=D("Collect")->updateStatusById($id,$status);
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