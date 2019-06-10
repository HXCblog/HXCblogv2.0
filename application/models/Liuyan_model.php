<?php
class Liuyan_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/*获取留言列表*/
	function getliuyan(){
		$table = "liuyan";
			//列表页
			$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
			$query = $this->db->get($table);
			$result = $query->result_array();
			return $result;
	}

	/*插入留言*/
	function insert_liuyan($info){
		$table = "liuyan";
		$this->db->insert($table,$info);
		return $this->db->affected_rows();
	}





}
?>