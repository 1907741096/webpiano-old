<?php
namespace Common\Model;
use Think\Model;
class NewsModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('news');
	}
	public function getNews($data,$page,$pageSize){
        if(!isset($data['status'])||!$data['status']){
		    $data['status'] = array('neq',-1);
        }
		if(isset($data['title']) && $data['title']) {
            $data['title'] = array('like','%'.$data['title'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('news_id desc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
	}
	public function getNewsCount($data){
		$data['status'] = array('neq',-1);
		if(isset($data['title'])&&$data['title']){
			$data['title'] = array('like','%'.$data['title'].'%');
		}
		return $this->_db->where($data)->count();
	}
    public function getNewsById($id){
    	return $this->_db->where('news_id='.$id)->find();
    }
    public function getNewsByNewsIdIn($newsIds) {
        if(!is_array($newsIds)) {
            throw_exception("参数不合法");
        }

        $data = array(

            'news_id' => array('in',implode(',', $newsIds)),
        );

        return $this->_db->where($data)->select();
    }
    public function updateNewsById($id,$data){
        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function addNews($data){
        return $this->_db->add($data);
    }
    public function updateStatusById($id, $status){
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'status' => intval($status),
        );

        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function updateStickById($id, $stick){
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'stick' => intval($stick),
        );

        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function updateFineById($id, $fine){
        if(!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'fine' => intval($fine),
        );

        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function getNewsByTime($data,$limit){
        $list = $this->_db->where($data)
        ->order('update_time desc')
        ->limit($limit)
        ->select();
        return $list;
    }
    public function getNewsByCount($data,$pageSize=5){
        $list = $this->_db->where($data)
            ->order('count desc ,listorder desc')
            ->limit($pageSize)
            ->select();
        return $list;
    }
    public function getNewByTime($data,$page,$pageSize){
        if(isset($data['title']) && $data['title']) {
            $data['title'] = array('like','%'.$data['title'].'%');
        }
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)
        ->order('update_time desc')
        ->limit($offset,$pageSize)
        ->select();
        return $list;
    }
    public function updateCountById($id,$count){
        $data['count']=$count+1;
        $this->_db->where('news_id='.$id)->save($data);
    }
}