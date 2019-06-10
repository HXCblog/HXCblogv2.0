<?php
class Admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

/*获取用户信息*/
	function get_user_info(){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$query = $this->db->get_where($table,array('username'=>$username));
		$result = $query->row_array();
		return $result;
	}

/*更新用户信息*/
	function update_user_info($user){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$this->db->where('username',$username);
		$this->db->update($table, $user);
		return $this->db->affected_rows();
	}

/*获取版本信息列表*/
	function get_plan_info(){
		$table = "plan";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}


/*添加版本计划*/
	function add_user_plan($plan){
		$table = "plan";
		$this->db->insert($table, $plan);
		return $this->db->affected_rows();
	}

/*更新版本计划*/
	function update_user_plan($pid,$plan){
		$table = "plan";
		$this->db->where("id",$pid);
		$this->db->update($table,$plan);
		return $this->db->affected_rows();
	}

/*删除版本计划*/	
	function del_user_plan($aid){
		$table = "plan";
		$this->db->delete($table, array('id' => $aid));
		return $this->db->affected_rows();
	}

/*获取闲言碎语*/
	function get_words(){
		$table = "shuoshuo";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}

/*添加闲言碎语*/
	function add_shuoshuo($word){
		$table = "shuoshuo";
		$this->db->insert($table, $word);
		return $this->db->affected_rows();
	}
/*删除闲言碎语*/	
	function del_shuoshuo($aid){
		$table = "shuoshuo";
		$this->db->delete($table, array('id' => $aid));
		return $this->db->affected_rows();
	}

/*获取友情链接列表*/
	function get_link_info(){
		$table = "links";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}

/*添加友情链接*/
	function add_fir_link($fir_link){
		$table = "links";
		$this->db->insert($table, $fir_link);
		return $this->db->affected_rows();
	}

/*更新友情链接*/
	function update_links($pids,$fir_link){
		$table = "links";
		$this->db->where("id",$pids);
		$this->db->update($table,$fir_link);
		return $this->db->affected_rows();
	}

/*删除友情链接*/	
	function del_links($aid){
		$table = "links";
		$this->db->delete($table, array('id' => $aid));
		return $this->db->affected_rows();
	}

/*获取待审核的友链列表*/
	function get_wait_link(){
		$table = "waitlinks";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
/*删除待审核的友链列表*/	
	function wait_del_links($aid){
		$table = "waitlinks";
		$this->db->delete($table, array('id' => $aid));
		return $this->db->affected_rows();
	}


/*获取留言板信息*/
	function get_message(){
		$table = "newliuyan";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}

/*添加留言信息*/
	function add_liuyan($word){
		$table = "newliuyan";
		$this->db->insert($table, $word);
		return $this->db->affected_rows();
	}

/*删除友情链接*/	
	function del_message($aid){
		$table = "newliuyan";
		$this->db->delete($table, array('id' => $aid));
		return $this->db->affected_rows();
	}

/*获取用户名*/	
	function get_username($user){
		$table = "user";
		$query = $this->db->get_where($table,array("username"=>$user));
		$result = $query->row_array();
		return $result;
	}

/*校验密码*/
	function check_password($password,$userpass){
		if($password == md5($userpass)){
			return true;
		}else{
			return false;
		}
	}

/*更新密码*/	
	function update_password($uid,$password){
		$table = "user";
		$newpass = md5($password); 
		$info = array("password"=>$newpass);
		$this->db->where("uid",$uid);
		$this->db->update($table,$info);
		return $this->db->affected_rows();
	}
}

?>