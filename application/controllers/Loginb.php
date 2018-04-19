<!--
*文件名：后台文章模块
*时间：20170808
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Loginb extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}
	
	public function index() {
		//判断是否登陆
		if($this->Login_model->is_logged_in()) {
			//已登陆跳转
			redirect('Loginb');
		} else {
			//未登录跳转
			$data['yzm'] = $this->Login_model->get_checkword();
			$data['login_error'] = "";
			$this->load->view('login2',$data);
		}
	}
	
	public function check() {
		//如果登陆则跳转
	
		$data['login_error'] = '';
		//设置表单字段过滤规则

		$this->form_validation->set_rules('checknum','验证码','required',array('required'=>'验证码不能为空'));
		//判断过滤结果是否成功
		if($this->form_validation->run()) {
			//获取用户输入信息
		
			$checknum = $this->input->post('checknum');
			//验证码输入判断
			if($this->Login_model->check_num($checknum,$this->input->ip_address(),time()-1000)){
				
			} else {
				//作出提示
				$data['login_error'] = '验证码错误!';
			}
		}
		//过滤失败重新加载视图
		$data['yzm'] = $this->Login_model->get_checkword();
		$this->load->view('login2',$data);
	}
	
	
}

?>
