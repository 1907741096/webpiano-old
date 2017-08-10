<?php
namespace Common\Model;
use Think\Model;
class AdminModel extends Model{

	private $_db='';

	public function __construct(){
		$this->_db=M('admin');
	}
	public function getAdmins($data=array(),$page=1,$pageSize=100){
		$data['status'] = array('neq',-1);
		if(isset($data['username']) && $data['username']) {
            $data['username'] = array('like','%'.$data['username'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('admin_id asc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
	}
	public function getAdminsCount($data= array()) {
        $data['status'] = array('neq',-1);
        if(isset($data['username']) && $data['username']) {
            $data['username'] = array('like','%'.$data['username'].'%');
        }
        return $this->_db->where($data)->count();
    }
	public function getAdminById($id){
		if(!$id||!is_numeric($id)){
			return array();
		}
		return $this->_db->where('admin_id='.$id)->find();
	}
	public function addAdmin($data){
        return $this->_db->add($data);
    }
	public function updateAdminById($id,$data){
		return $this->_db
		->where('admin_id='.$id)
		->save($data);
	}

    public function updateStatusById($id, $status){
    	if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'status' => intval($status),
        );

        return $this->_db->where('admin_id='.$id)->save($data);
    }

    public function getAdminByUsername($username='') {
        $res = $this->_db->where('username="'.$username.'"')->find();
        return $res;
    }

    public function updatelogintime($id,$data){
        return $this->_db->where('admin_id='.$id)->save($data);
    }

}