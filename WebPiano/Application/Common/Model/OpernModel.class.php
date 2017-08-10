<?php
namespace Common\Model;
use Think\Model;
class OpernModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('opern');
	}
	public function getOpernbyCount($data,$page,$pageSize){
        if(!isset($data['status'])||!$data['status']){
		    $data['status'] = array('neq',-1);
        }
		if(isset($data['name']) && $data['name']) {
            $data['name'] = array('like','%'.$data['name'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('count desc,opern_id desc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
	}
    public function getOpernByTime($data,$page,$pageSize){
       if(!isset($data['status'])||!$data['status']){
            $data['status'] = array('neq',-1);
        }
        if(isset($data['name']) && $data['name']) {
            $data['name'] = array('like','%'.$data['name'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('create_time desc,opern_id desc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
    }
	public function getOpernCount($data){
		$data['status'] = array('neq',-1);
		if(isset($data['name'])&&$data['name']){
			$data['name'] = array('like','%'.$data['name'].'%');
		}
		return $this->_db->where($data)->count();
	}
    public function getOpernById($id){
    	return $this->_db->where('opern_id='.$id)->find();
    }
    public function updateOpernById($id,$data){
        return $this->_db->where('opern_id='.$id)->save($data);
    }
    public function addOpern($data){
        return $this->_db->add($data);
    }
    public function updateStatusById($id, $status){
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'status' => intval($status),
        );

        return $this->_db->where('opern_id='.$id)->save($data);
    }
   
}