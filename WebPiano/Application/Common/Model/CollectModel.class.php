<?php
namespace Common\Model;
use Think\Model;
class CollectModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('collect');
	}
	public function getCollect($data,$page,$pageSize){
        if(!isset($data['status'])||!$data['status']){
		    $data['status'] = array('neq',-1);
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('collect_id desc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
	}
    public function getCollectCount($data){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }
    public function addCollect($data){
        return $this->_db->add($data);
    }
    public function getCollectById($id){
    	return $this->_db->where('collect_id='.$id)->find();
    }
    public function updateStatusById($id, $status){
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'status' => intval($status),
        );
        return $this->_db->where('collect_id='.$id)->save($data);
    }
    public function getCollectByUserId($id){
        return $this->_db->where('user_id='.$id)->order('collect_id desc')->select();
    }
}