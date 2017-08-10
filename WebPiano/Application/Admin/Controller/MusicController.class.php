<?php
namespace Admin\Controller;
use Think\Controller;
class MusicController extends CommonController{
	public function index(){
		$data = array();
		if($_GET&&$_GET['name']!=''){
			$data=$_GET;
			$this->assign('name',$data['name']);
		}
        /**
         * 分页操作逻辑
         */
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = $_REQUEST['pageSize'] ? $_REQUEST['pageSize'] : 10;
        $musics = D("Music")->getMusics($data,$page,$pageSize);
        $musicsCount = D("Music")->getMusicsCount($data);
        $res = new \Think\Page($musicsCount, $pageSize);
        $pageRes = $res->show();
        $this->assign('pageRes', $pageRes);
		$this->assign('musics',$musics);
		$this->display();
	}
	public function add(){
		if($_POST){
			if(!isset($_POST['name'])||trim($_POST['name'])==''){
				return returnjson(0,'歌名不能为空');
			}
			if(!isset($_POST['author'])||trim($_POST['author'])==''){
				return returnjson(0,'歌手不能为空');
			}
			if(!($_POST['status']==1||$_POST['status']==0)){
				return returnjson(0,'状态不合法');
			}
			if(isset($_POST['music_id'])&&$_POST['music_id']!=''){
				if(!is_numeric($_POST['music_id'])){
					return returnjson('ID不合法');
				}
				$music_id=$_POST['music_id'];
				unset($_POST['music_id']);
				$res= D("Music")->updateMusicById($music_id,$_POST);
				if($res){
					return returnjson(1,'更新成功');
				}
				return returnjson(0,'更新失败');
			}
			$_POST['create_time']=time();
			$musicId = D("Music")->insert($_POST);
            if($musicId) {
                return returnjson(1,'新增成功',$musicId);
            }
            return returnjson(0,'新增失败',$musicId);
		}else{
			if($_GET['id']){
				$music=D("Music")->getMusicById($_GET['id']);
				$this->assign('musicbyid',$music);
			}
			$this->display();
		}
	}
	public function listorder(){
		$listorder = $_POST['listorder'];
		$jumpUrl = $_SERVER['HTTP_REFERER'];
		$errors = array();
		try {
			if ($listorder) {
				foreach ($listorder as $id => $v) {
					// 执行更新
					$id = D('Music')->updateListorderById($id, $v);
					if ($id === false) {
						$errors[] = $id;
					}
				}
				if ($errors) {
					return returnjson(0, '排序失败-' . implode(',', $errors), array('jump_url' => $jumpUrl));
				}
				return returnjson(1, '排序成功', array('jump_url' => $jumpUrl));
			}
		}catch (Exception $e) {
			return returnjson(0, $e->getMessage());
		}
		return returnjson(0,'排序数据失败',array('jump_url' => $jumpUrl));
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
                $res = D("Music")->updateStatusById($id, $status);
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
				$res=D("Music")->updateStatusById($id,$status);
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
	public function ajaxuploadmusic() {
        $upload = D("UploadMusic");
        $res = $upload->imageUpload();
        if($res===false) {
            return returnjson(0,'上传失败',$res);
        }else{
            return returnjson(1,'上传成功',$res);
        }

    }
    public function getMusic(){
    	$res=D('Music')->getMusic();
    	return returnjson(1,'获取成功',$res);
    }
}