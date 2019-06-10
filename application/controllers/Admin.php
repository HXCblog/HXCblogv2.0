<!--
*文件名：后台文章模块
*时间：20170809
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Admin extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->model(array('Login_model','Admin_model'));
		if(!$this->Login_model->is_logged_in()) {
			redirect('Login/index');
		}
	}

	public function index() {
		//加载首页视图
		$this->load->view('Admin/header');
		$this->load->view('Admin/home');
		$this->load->view('Admin/footer');
	}
	
	/*获取名片信息*/
	public function show() {
		//获取用户名片
		$data['info'] = $this->Admin_model->get_user_info();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/admin');
		$this->load->view('Admin/footer');
	}

	
	public function pass() {
		//加载修改密码视图
		$data['update_error'] = "";
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/password');
		$this->load->view('Admin/footer');
	}


	/*版本管理*/
	public function version() {
		//获取用户信息和计划
		$data['plan'] = $this->Admin_model->get_plan_info();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/version');
		$this->load->view('Admin/footer');
	}


	
	public function updateinfo() {
		//获取用户信息	
		$username = $this->input->post('username');
		$location = $this->input->post('location');
		$email = $this->input->post('email');
		$info = array('username'=>$username,'location'=>$location,'email'=>$email);
		//执行更新操作
		if($this->Admin_model->update_user_info($info)) {
			$data['tips'] = "修改成功!";
		} else {
			$data['tips'] = "未做修改!";
		}
		$data['route'] = site_url('Admin/show');
		//输出信息并跳转
		$this->load->view('tips',$data);	
	}


	/*添加版本计划*/
	public function addplan() {
		//获取计划信息
		$planname = $this->input->post('planname');
		$usedtime = $this->input->post('usedtime');
		$finished = $this->input->post('finished'); 
		$info = array('planname'=>$planname,'usedtime'=>$usedtime,'finished'=>$finished);
		//执行添加操作
		if($this->Admin_model->add_user_plan($info)) {
			redirect('Admin/version');
		}
			
	}


	/*修改版本计划*/
	public function changeplan() {
		//获取计划id和信息
		$pid = $this->uri->segment(3);
		$planname = $this->input->post('planname');
		$usedtime = $this->input->post('usedtime');
		$finished = $this->input->post('finished');
		$info = array('planname'=>$planname,'usedtime'=>$usedtime,'finished'=>$finished);
		//执行更新计划操作
		if($this->Admin_model->update_user_plan($pid,$info)) {
			redirect('Admin/version');
		} 
		
	}
	
	/*删除版本计划*/
	public function delplan() {
		//获取计划id
		$pid = $this->uri->segment(3);
		//执行删除动作
		if($this->Admin_model->del_user_plan($pid)) {
			redirect('Admin/version');
		}
		
	}

	/*闲言碎语*/
	public function shuoshuo() {
		//获取用户信息和计划
		$data['info'] = $this->Admin_model->get_words();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/shuoshuo');
		$this->load->view('Admin/footer');
	}


	/*发布闲言碎语*/
	public function addshuoshuo() {
		//获取计划信息
		$words = $this->input->post('words');
		$time = time(); 
		$info = array('words'=>$words,'time'=>$time);
		//执行添加操作
		if($this->Admin_model->add_shuoshuo($info)) {
			redirect('Admin/shuoshuo');
		}	
	}

	/*删除版本计划*/
	public function delshuoshuo() {
		//获取计划id
		$pid = $this->uri->segment(3);
		//执行删除动作
		if($this->Admin_model->del_shuoshuo($pid)) {
			redirect('Admin/shuoshuo');
		}
		
	}

	/*获取友情链接列表*/
	public function friends_links() {
		//获取用户信息和计划
		$data['link_list'] = $this->Admin_model->get_link_info();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/links');
		$this->load->view('Admin/footer');
	}

	/*添加友情链接*/
	public function add_link() {	
		//获取grav头像
		$email = $this->input->post('email');//获取表单邮箱
		$default = "http://www.huxinchun.com/public/tanmu/tanimg/1.jpg";//调用默认头像
		$size = 80;
		$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;//grav头像地址拼接
		//获取计划信息
		$webname = $this->input->post('webname');
		$addtime = $this->input->post('addtime');
		$website = $this->input->post('website');
		$touxiang = $this->input->post('touxiang');  
		$info = array('webname'=>$webname,'addtime'=>$addtime,'website'=>$website,'email'=>$email,'touxiang'=>$touxiang,'img'=>$grav_url);
		//执行添加操作
		if($this->Admin_model->add_fir_link($info)){
			redirect('Admin/friends_links');
		}
			
	}

	/*修改友情链接*/
	public function change_link() {
		//获取计划id和信息
		$pids = $this->uri->segment(3);
		$webname = $this->input->post('webname');
		$addtime = $this->input->post('addtime');
		$website = $this->input->post('website');
		$info = array('webname'=>$webname,'addtime'=>$addtime,'website'=>$website);
		//执行更新计划操作
		if($this->Admin_model->update_links($pids,$info)) {
			redirect('Admin/friends_links');
		} 
		
	}

	/*删除友情链接*/
	public function dellink() {
		//获取id
		$pids = $this->uri->segment(3);
		//执行删除动作
		if($this->Admin_model->del_links($pids)) {
			redirect('Admin/friends_links');
		}
		
	}


	/*获取待审核的友情链接列表*/
	public function wait_links() {
		//获取用户信息和计划
		$data['wait_list'] = $this->Admin_model->get_wait_link();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/waitlink');
		$this->load->view('Admin/footer');
	}
	/*删除待审核的友情链接*/
	public function waitdellink() {
		//获取id
		$pids = $this->uri->segment(3);
		//执行删除动作
		if($this->Admin_model->wait_del_links($pids)) {
			redirect('Admin/wait_links');
		}
		
	}


	/*留言管理*/
	public function message() {
		
		//获取用户信息和计划
		$data['info'] = $this->Admin_model->get_message();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/message');
		$this->load->view('Admin/footer');
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
		if($this->Admin_model->add_liuyan($messages)) {
			redirect('Admin/message');
		}
			
	}
	/*删除留言*/
	public function delmessage() {
		//获取id
		$pids = $this->uri->segment(3);
		//执行删除动作
		if($this->Admin_model->del_message($pids)) {
			redirect('Admin/message');
		}
		
	}


	/*更新密码*/
	public function updatepass() {
		$data['update_error'] = '';
		//设置用户密码过滤条件
		$this->form_validation->set_rules('username','管理员名','required',array('required'=>'用户名不能为空'));
		$this->form_validation->set_rules('prepass','原密码','required',array('required'=>'原密码不能为空'));
		$this->form_validation->set_rules('newpass','新密码','required',array('required'=>'新密码不能为空'));
		$this->form_validation->set_rules('conpass','确认密码','required|matches[newpass]',array('required'=>'确认密码不能为空'));
		//判断过滤结果是否成功
		if($this->form_validation->run()) {
			$username = $this->input->post("username");
			$prepass = $this->input->post("prepass");
			$newpass = $this->input->post("newpass");
			//用户名验证
			if($user = $this->Admin_model->get_username($username)) {
				//密码验证
				if($this->Admin_model->check_password($user['password'],$prepass)) {
					//更新密码
					if($this->Admin_model->update_password($user['uid'],$newpass)) {
						echo "<script type = 'text/javascript'>alert('修改成功!');</script>";
					} else {
						echo "<script type = 'text/javascript'>alert('修改失败!');</script>";
					}
				} else {
					$data['update_error'] = "无效的用户名或密码!";
				}
			} else {
				$data['update_error'] = "无效的用户名或密码!";
			}
		}
		//加载视图分配变量
		$this->load->view("Admin/header",$data);
		$this->load->view("Admin/password");
		$this->load->view("Admin/footer");
	}
	
}
?>
