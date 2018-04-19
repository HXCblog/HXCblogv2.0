<!-- 文件名：首页模型  时间：20180313 更新 -->
<?php
class Home_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	/*获取用户信息*/
	function getuserinfo(){
		$table = "user";
		$query = $this->db->get_where($table,array('uid'=>1));
		$result = $query->row_array();
		return $result;
	}
	
	/*获取分类信息*/
	function getcategory(){
		$table = "category";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
	
	/*热门文章浏览量排序*/
	function getorderart(){
		$table = "article";
		$this->db->order_by('id','ASC');
		$this->db->limit(8);//限制查询结果的返回数量
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}


/*获取首页 和列表文章列表*/
	function getarticle($perPage,$offset,$cid = 0){
		$table = "article";
		if($cid == 0){
			//首页
			$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
			$query = $this->db->get($table,$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}else{
			//列表页
			$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
			$query = $this->db->get_where($table,array("cid"=>$cid),$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}		
	}

/*文章模糊查询*/
	function so_article($key_words =0){
		$key_words = $this->input->post('soso');//获取表单关键词
		$table = "article";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		//模糊查询
		$query = $this->db->get_where($table,"title like '%$key_words%'");
		$result = $query->result_array();
		return $result;	
	}

/*获取文章内容*/
	function getcontent($aid){
		$table = "article";
		$query = $this->db->get_where($table,array('id'=>$aid));
		$result = $query->row_array();
		return $result;
	}

/*获取友情链接列表*/
	function get_link_info(){
		$table = "links";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
/*获取待审核的友链列表*/
	function get_wait_link(){
		$table = "waitlinks";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
/*添加友情链接*/
	function add_send_link($fir_link){
		$table = "waitlinks";
		$this->db->insert($table, $fir_link);
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

/*获取闲言碎语*/
	function get_words($perPage,$offset){
		$table = "shuoshuo";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table,$perPage,$offset);
		$result = $query->result_array();
		return $result;
	}

/*获取留言信息*/
	function get_message($perPage,$offset){
		$table = "newliuyan";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table,$perPage,$offset);
		$result = $query->result_array();
		return $result;
	}
	
/*添加留言信息*/
	function add_liuyan($word){
		$table = "newliuyan";
		$this->db->insert($table, $word);
		return $this->db->affected_rows();
	}
	

}
?>