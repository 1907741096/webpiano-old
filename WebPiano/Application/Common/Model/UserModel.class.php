<?php
namespace Common\Model;
use Think\Model;
class UserModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('user');
	}
	public function updateStyleById($id,$data){
		return $this->_db->where('user_id='.$id)->save($data);
	}
	public function getUserById($id){
		return $this->_db->where('user_id='.$id)->find();
	}
	public function getUserByUsername($username){
		return $this->_db->where('username="'.$username.'"')->find();
	}
	public function addUser($data){
		return $this->_db->add($data);
	}
	public function getUsers($data,$page,$pageSize){
		if(isset($data['username']) && $data['username']) {
            $data['username'] = array('like','%'.$data['username'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('user_id desc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
	}
	public function getUsersCount($data= array()) {
        if(isset($data['username']) && $data['username']) {
            $data['username'] = array('like','%'.$data['username'].'%');
        }
        return $this->_db->where($data)->count();
    }
    public function updateStatusById($id, $status){
    	if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'status' => intval($status),
        );

        return $this->_db->where('user_id='.$id)->save($data);
    }
    public function updateUserById($id,$data){
        return $this->_db->where('user_id='.$id)->save($data);
    }
}