<!--*文件名：首页界面 *时间：20170715 更新：20180305-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Home extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Home_model');
	}
	
/*前台文章分页*/
	public function index(){
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();    //获取栏目并显示 
		//获取排名信息
		$data['order'] = $this->Home_model->getorderart();
		//加载分页类
		$this->load->library('pagination');   //分页显示文章列表
		//配置分页类
		$perPage = 6;
		$config['base_url'] = site_url('Home/index');//分页所在控制器
		$config['total_rows'] = $this->db->count_all_results('article');//需要做分页的总行数
		$config['per_page'] = $perPage;//希望展现的分页数量
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = ' <li><span><span aria-hidden="true">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span></span></li>';//第一个链接的结束标签
		$config['last_tag_open'] = '<li><span><span aria-hidden="true">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span></span></li>';//最后一个链接的结束标签
		$config['num_tag_open'] = '<li><span><span aria-hidden="true">';//数字链接的起始标签
		$config['num_tag_close'] = '</span></span></li>';
		$config['cur_tag_open'] = '<li class="active"><span><span aria-hidden="true">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span></span></li>';
		$config['prev_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['prev_tag_close'] = '</span></span></li>';
		$config['next_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['next_tag_close'] = '</span></span></li>';
		$this->pagination->initialize($config);
		//生成分页
		$data['links'] = $this->pagination->create_links();
		//获取数据
		$offset = $this->uri->segment(3);
		$data['article']=$this->Home_model->getarticle($perPage, $offset);
		//获取友链
		$data['link_list'] = $this->Home_model->get_link_info();
		//加载视图	
		$this->load->view('Home/header',$data);
		$this->load->view('Home/body');
		$this->load->view('Home/footer');
	}

/*博客分类栏目页*/
	public function block() {
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo();
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();                                       //获取栏目并显示 
		//获取排名信息
		$data['order'] = $this->Home_model->getorderart();
		//获取分类id
		$cid = $this->uri->segment(3);
		$this->db->where('cid',$cid);
		$total = $this->db->count_all_results('article');
		//加载分页类
		$this->load->library('pagination');                                                 //分页显示文章列表
		//配置分页类
		$perPage = 6;
		$url = 'Home/block/'."{$cid}";
		$config['base_url'] = site_url($url);
		$config['total_rows'] = $total;
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = ' <li><span><span aria-hidden="true">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span></span></li>';//第一个链接的结束标签
		$config['last_tag_open'] = '<li><span><span aria-hidden="true">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span></span></li>';//最后一个链接的结束标签
		$config['num_tag_open'] = '<li><span><span aria-hidden="true">';//数字链接的起始标签
		$config['num_tag_close'] = '</span></span></li>';
		$config['cur_tag_open'] = '<li class="active"><span><span aria-hidden="true">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span></span></li>';
		$config['prev_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['prev_tag_close'] = '</span></span></li>';
		$config['next_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['next_tag_close'] = '</span></span></li>';
		$this->pagination->initialize($config);
		//生成分页
		$data['links'] = $this->pagination->create_links();
		//获取友链
		$data['link_list'] = $this->Home_model->get_link_info();
		//获取数据
		$offset = $this->uri->segment(4);
		$data['article']=$this->Home_model->getarticle($perPage, $offset,$cid);
		//加载视图
		$this->load->view('Home/header',$data);
		$this->load->view('Home/blog');
		$this->load->view('Home/footer');
	}



/*前台文章搜索*/
	public function index_so() {
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();    //获取栏目并显示 
		//获取排名信息
		$data['order'] = $this->Home_model->getorderart();
		//加载分页类
		$this->load->library('pagination');   //分页显示文章列表
		$data['links'] = $this->pagination->create_links();
		//获取数据
		$data['article']=$this->Home_model->so_article();
		$data['link_list'] = $this->Home_model->get_link_info();
		//加载视图	
		$this->load->view('Home/header',$data);
		$this->load->view('Home/body');
		$this->load->view('Home/footer');
	}


/*版本管理*/
	public function version() {
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();  
		//获取用户信息和计划
		$data['plan'] = $this->Home_model->get_plan_info();
		//加载视图分配变量
		$this->load->view('Home/header',$data);
		$this->load->view('Home/version');
		$this->load->view('Home/footer');
	}

/*闲言碎语*/
	public function words() {
		$this->load->library('pagination');  //分页显示文章列表
		$total = $this->db->count_all_results('shuoshuo');//配置分页类
		$perPage = 10;
		$config['base_url'] = site_url('Home/words');//分页所在控制器
		$config['total_rows'] = $total;
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = ' <li><span><span aria-hidden="true">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span></span></li>';//第一个链接的结束标签
		$config['last_tag_open'] = '<li><span><span aria-hidden="true">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span></span></li>';//最后一个链接的结束标签
		$config['num_tag_open'] = '<li><span><span aria-hidden="true">';//数字链接的起始标签
		$config['num_tag_close'] = '</span></span></li>';
		$config['cur_tag_open'] = '<li class="active"><span><span aria-hidden="true">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span></span></li>';
		$config['prev_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['prev_tag_close'] = '</span></span></li>';
		$config['next_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['next_tag_close'] = '</span></span></li>';
		$this->pagination->initialize($config);
		//生成分页
		$data['links'] = $this->pagination->create_links();

		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();  
		//获取用户信息和计划
		$offset = $this->uri->segment(3);
		$data['info'] = $this->Home_model->get_words($perPage,$offset);
		//加载视图分配变量
		$this->load->view('Home/header',$data);
		$this->load->view('Home/words');
		$this->load->view('Home/footer');
	}

/*友情链接列表*/
	public function neigh(){
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();    
		//获取栏目并显示 
		$data['link_list'] = $this->Home_model->get_link_info();
		//获取等待审核的友链列表
		$data['wait_list'] = $this->Home_model->get_wait_link();
		//获取排名信息
		$this->load->view('Home/header',$data);
		$this->load->view('Home/neighbor');
		$this->load->view('Home/footer');
	}

/*申请友情链接*/
	public function send_links() {
		//获取grav头像
		$email = $this->input->post('email');//获取表单邮箱
		$default = "http://www.huxinchun.com/public/tanmu/tanimg/1.jpg";//调用默认头像
		$size = 80;
		$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;//grav头像地址拼接

		//获取计划信息
		$webname = $this->input->post('webname');
		$website = $this->input->post('website'); 
		$touxiang = $this->input->post('touxiang');
		$info = array('webname'=>$webname,'website'=>$website,'touxiang'=>$grav_url,'email'=>$email);
		//执行添加操作
		if($this->Home_model->add_send_link($info)) {
			redirect('Home/neigh');
		}
			
	}



/*留言板*/
	public function messages() {
		//留言分页
		$this->load->library('pagination');  //分页显示文章列表
		$total = $this->db->count_all_results('newliuyan');//配置分页类
		$perPage = 12;
		$config['base_url'] = site_url('Home/messages');//分页所在控制器
		$config['total_rows'] = $total;
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = ' <li><span><span aria-hidden="true">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span></span></li>';//第一个链接的结束标签
		$config['last_tag_open'] = '<li><span><span aria-hidden="true">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span></span></li>';//最后一个链接的结束标签
		$config['num_tag_open'] = '<li><span><span aria-hidden="true">';//数字链接的起始标签
		$config['num_tag_close'] = '</span></span></li>';
		$config['cur_tag_open'] = '<li class="active"><span><span aria-hidden="true">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span></span></li>';
		$config['prev_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['prev_tag_close'] = '</span></span></li>';
		$config['next_tag_open'] = '<li><span><span aria-hidden="true">';
		$config['next_tag_close'] = '</span></span></li>';
		$this->pagination->initialize($config);
		//生成分页
		$data['links'] = $this->pagination->create_links();
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();

		//获取数据
		$offset = $this->uri->segment(3);
		$data['info_list'] = $this->Home_model->get_message($perPage, $offset);
		//加载视图分配变量
		$this->load->view('Home/header',$data);
		$this->load->view('Home/message');
		$this->load->view('Home/footer');
	}


/*添加留言*/
	public function add_message() {
		//获取grav头像
		$email = $this->input->post('email');//获取表单邮箱
		$default = "http://www.huxinchun.com/public/tanmu/tanimg/1.jpg";//调用默认头像
		$size = 80;
		$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;//grav头像地址拼接

		//获取表单数据
		$name = $this->input->post('name');
		$time = time();
		
		$website = $this->input->post('website'); 
		$info=$this->input->post('info'); 
		$messages = array('name'=>$name,'time'=>$time,'email'=>$email,'img'=>$grav_url,'website'=>$website,'info'=>$info);
		//执行添加操作
		if($this->Home_model->add_liuyan($messages)) {
			redirect('Home/messages');
		}
			
	}


/*文章内容*/
	public function content() {
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();                                       //获取栏目并显示
		//获取排名信息
		$data['order'] = $this->Home_model->getorderart();
		//获取文章具体内容
		$aid = $this->uri->segment(3);
		$data['content'] = $this->Home_model->getcontent($aid);
		//加载视图	
		$this->load->view('Home/content_header',$data);
		$this->load->view('Home/content');
		$this->load->view('Home/footer');
	}
	
/*文章浏览量*/
	public function viewnum() {
		//查询文章
		$aid = $this->input->post('id');
		$table = "article";
		$query = $this->db->get_where($table,array("id"=>$aid));
		$result = $query->row_array();
		//增加点击量
		$data = $result['viewnum'] + 1;
		$this->db->where("id",$aid);
		$this->db->update($table,array("viewnum"=>$data));
	}
		
	
}

?>
