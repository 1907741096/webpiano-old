<?php
namespace Common\Model;
use Think\Model;
class StyleModel extends Model{
	private $_db='';
	public function __construct(){
		$this->_db=M('style');
	}
	public function getStyle($data=array()){
		return $this->_db->where($data)->select();
	}
	public function getStyleById($id){
		return $this->_db->where('style_id='.$id)->find();
	}
}