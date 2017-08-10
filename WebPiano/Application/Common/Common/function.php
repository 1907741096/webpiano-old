<?php
	function showmessage($a,$b){
		echo "<div>$a</div>";
		echo "<meta http-equiv='refresh' content='1;url=".$b."'/>";
		exit;
	}
	function jump($url){
		echo "<meta http-equiv='refresh' content='0;url=".$url."'/>";
		exit;
	}
	function returnjson($status,$message,$data){
		$result=array(
			'status'=>$status,
			'message'=>$message,
			'data'=>$data,
		);
		exit(json_encode($result));
	}
	function getMd5Password($password) {
   		 return md5(C('MD5_PRE').$password);
	}
	function getstick($stick){
		if($stick==1){
			return '是';
		}else{
			return '否';
		}
	}
	function getfine($fine){
		if($fine==1){
			return '是';
		}else{
			return '否';
		}
	}
	function getstatus($status){
		if($status==1){
			return '正常';
		}elseif($status==0){
			return '关闭';
		}else{
			return '已删除';
		}
	}
	function getMenuNameById($menus,$id){
		foreach($menus as $menu){
			if($menu['menu_id']==$id)
				return $menu['name'];
		}
		return '未知';
	}
	function getPositionNameById($positions,$id){
		foreach($positions as $position){
			if($position['position_id']==$id)
				return $position['name'];
		}
		return '未知';
	}
	function getthumb($thumb){
		if(isset($thumb)&&$thumb!=''){
			return '有';
		}
		return '无';
	}
	function showKind($status,$data) {
    header('Content-type:application/json;charset=UTF-8');
    if($status==0) {
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));

	}
	function gettitle($title){
		if(strlen($title)<=30){
			return strip_tags($title);
		}else{
			return mb_substr(strip_tags($title), 0,10,'utf-8').'...';
		}
	}
	function getstickcontent($title){
		if(strlen($title)<=90){
			return strip_tags($title);
		}else{
			return mb_substr(strip_tags($title), 0,30,'utf-8').'...';
		}
	}
	function getcontent($content){
		if(strlen($content)<=600){
			return strip_tags($content);
		}else{
			return mb_substr(strip_tags($content), 0,200,'utf-8').'...';
		}
	}
	function ifcollect($id,$collects){
		foreach($collects as $collect){
			if($id==$collect['opern_id']){
				return 0;
			}
		}
		return 1;
	}
?>