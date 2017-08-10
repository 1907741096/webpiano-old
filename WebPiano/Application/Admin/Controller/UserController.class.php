<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController{
	public function index(){
		$data = array();
		if($_GET&&$_GET['username']!=''){
			$data=$_GET;
			$this->assign('username',$data['username']);
		}
		$data['status'] = array('neq',-1);
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $users = D("User")->getUsers($data,$page,$pageSize);
        $usersCount = D("User")->getusersCount($data);
        $res = new \Think\Page($usersCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
		$this->assign('users',$users);
		$this->display();
	}
    public function add(){
        if($_POST){
            if(!isset($_POST['username'])||trim($_POST['username'])==''){
                return returnjson(0,'账号不能为空');
            }
            if(!isset($_POST['password'])||trim($_POST['password'])==''){
                return returnjson(0,'密码不能为空');
            }
            if($_POST['password']!=$_POST['password2']){
                return returnjson(0,'两次密码不一致');
            }
            if(!($_POST['status']==1||$_POST['status']==0)){
                return returnjson(0,'状态不合法');
            }
            if(isset($_POST['user_id'])&&$_POST['user_id']!=''){
                if(!is_numeric($_POST['user_id'])){
                    return returnjson('ID不合法');
                }
                $user_id=$_POST['user_id'];
                unset($_POST['user_id']);
                $_POST['password']=getMd5Password($_POST['password']);
                $res= D("User")->updateUserById($user_id,$_POST);
                if($res){
                    return returnjson(1,'更新成功');
                }
                return returnjson(0,'更新失败');
            }
            $reg=D('User')->getUserByUsername($_POST['username']);
            if($reg){
                return returnjson(0,'用户名已被注册');
            }
            $_POST['create_time']=time();
            $_POST['password']= getMd5Password($_POST['password']);
            $userId = D("User")->addUser($_POST);
            if($userId) {
                return returnjson(1,'添加成功',$userId);
            }
            return returnjson(0,'新增失败',$userId);
        }else{
            if($_GET['id']){
                $user=D("User")->getUserById($_GET['id']);
                $this->assign('userbyid',$user);
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
                $res = D("User")->updateStatusById($id, $status);
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
                $res=D("User")->updateStatusById($id,$status);
                if($res){
                    return returnjson(1,'删除成功');
                }else{
                    return returnjson(0,'删除失败');
                }
            }
        }catch(Exception $e){
            return showjson(0,$e->getMessage());
        }
        return showjson(0,'没有提交的数据');
    }
}