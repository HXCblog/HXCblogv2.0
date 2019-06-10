<!--
*文件名：前台
*时间：20170715
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Liuyan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Home_model');
		$this->load->model('Liuyan_model');

		$this->load->helper(array('url','form'));
		$this->load->model('Login_model');
		$this->load->library('form_validation');


	}


	

	/*获取留言*/
	public function index(){
	$data['yzm'] = $this->Login_model->get_checkword();
	$data['login_error'] = "";
	$data['userinfo'] = $this->Home_model->getuserinfo(); 
	$data['liuyan'] = $this->Liuyan_model->getliuyan();
	$data['category'] = $this->Home_model->getcategory();
	$this->load->view('Home/header',$data);
	$this->load->view('Home/liuyan');
	$this->load->view('Home/footer');
	
}


	//验证码验证
	public function check() {
		//如果登陆则跳转

		$this->form_validation->set_rules('checknum','验证码','required',array('required'=>'验证码不能为空'));
		//判断过滤结果是否成功
		if($this->form_validation->run()) {
			//获取用户输入信息
		
		    $checknum = $this->input->post('checknum');
		    $name = $this->input->post('name');
		    $content = $this->input->post('content');
		    $img= $this->input->post('imgul');
		    $info = array("name"=>$name,"info"=>$content,"img"=>$img);
			//验证码输入判断
			if($this->Login_model->check_num($checknum,$this->input->ip_address(),time()-1000)){
				
		      //插入文章并更新分类
		         $this->Liuyan_model->insert_liuyan($info);
		         //重定向表单防止重复提交	
                            redirect('Liuyan');
			        
			} else {
				//作出提示
				echo "<script>alert('验证码错误')</script>";
			}
		}
		//过滤失败重新加载视图
	$data['yzm'] = $this->Login_model->get_checkword();
	$data['login_error'] = "";
	$data['userinfo'] = $this->Home_model->getuserinfo(); 
	$data['liuyan'] = $this->Liuyan_model->getliuyan();
	$data['category'] = $this->Home_model->getcategory();
	$this->load->view('Home/header',$data);
	$this->load->view('Home/liuyan');
	$this->load->view('Home/footer');
	}
	
//插入留言接口
    public function myliu() {
        //获取文章信息
        $name = $this->input->post('name');
        $content = $this->input->post('content');
        $info = array("name"=>$name,"content"=>$content);
        //插入文章并更新分类
        $table = "liuyan";
        $this->db->insert($table,$info);
        return $this->db->affected_rows();
    }





}
?>