<?php
namespace Common\Model;
use Think\Model;
class MusicModel extends Model{
	private $_db='';

	public function __construct(){
		$this->_db=M('music');
	}

	public function getMusics($data=array(),$page=1,$pageSize=100000){
		$data['status'] = array('neq',-1);
		if(isset($data['name']) && $data['name']) {
            $data['name'] = array('like','%'.$data['name'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('listorder desc,music_id desc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
	}
    public function getMusic(){
        $data['status'] = array('eq',1);
        $list = $this->_db->where($data)
        ->order('music_id asc')
        ->select();
        return $list;
    }
	public function getMusicsCount($data= array()) {
        $data['status'] = array('neq',-1);
        if(isset($data['name']) && $data['name']) {
            $data['name'] = array('like','%'.$data['name'].'%');
        }
        return $this->_db->where($data)->count();
    }
	public function getMusicById($id){
		if(!$id||!is_numeric($id)){
			return array();
		}
		return $this->_db->where('music_id='.$id)->find();
	}
	public function insert($data){
		return $this->_db->add($data);
	}
	public function updateMusicById($id,$data){
		return $this->_db
		->where('music_id='.$id)
		->save($data);
	}
	public function updateListorderById($id, $listorder) {
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }

        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('music_id='.$id)->save($data);
    }
    public function updateStatusById($id, $status){
    	if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'status' => intval($status),
        );

        return $this->_db->where('music_id='.$id)->save($data);
    }
}