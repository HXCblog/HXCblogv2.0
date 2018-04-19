<!--
*文件名：后台文章模块
*时间：20170815
*作者：HXC
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Article extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Login_model','Article_model'));
		if(!$this->Login_model->is_logged_in()){
			redirect('Login/index');
		}
	}

/*后台文章列表页分页*/
	public function index() {	
		//加载分页类
		$this->load->library('pagination');                                              
		//配置分页类
		$perPage = 12;//分页数量
		$config['base_url'] = site_url('Article/index');//分页所在模板
		$config['total_rows'] = $this->db->count_all_results('article');//需要处理分页数据的总量
		$config['per_page'] = $perPage;//每页展现的数量
		$config['uri_segment'] = 3;//自动检测你 URI 的哪一段包含页数
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = '<span class="layui-btn" role = "button">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span>&nbsp;&nbsp;';//第一个链接的结束标签
		$config['last_tag_open'] = '<span class="layui-btn" role = "button">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span>&nbsp;&nbsp;';//最后一个链接的结束标签
		$config['num_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//数字链接的起始标签 
		$config['num_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['cur_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['prev_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['prev_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['next_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['next_tag_close'] = '</span>&nbsp;&nbsp;';
		$this->pagination->initialize($config);
		//生成分页
		$data['links'] = $this->pagination->create_links();
		//获取数据
		$offset = $this->uri->segment(3);
		$article = $this->Article_model->get_article($perPage, $offset);
		//获取分类
		$category = $this->Article_model->get_category();
		//将分类id替换为分类名
		foreach($article as &$val) {
			foreach($category as $var) {
				if($val['cid'] == $var['cid']) {
					$val['cid'] = $var['catename'];
				}
			}
		}
		$data['article'] = $article;
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/article');
		$this->load->view('Admin/footer');
	}


/*文章搜索*/
	public function shousuo() {	
		$this->load->library('pagination'); //无用代码，消除分页报错用
		$data['links'] = $this->pagination->create_links();	//无用代码，消除分页报错用
		$article = $this->Article_model->so_article();
		//获取分类
		$category = $this->Article_model->get_category();
		//将分类id替换为分类名
		foreach($article as &$val) {
			foreach($category as $var) {
				if($val['cid'] == $var['cid']) {
					$val['cid'] = $var['catename'];
				}
			}
		}
		$data['article'] = $article;
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/article');
		$this->load->view('Admin/footer');
	}




/*获取分类列表*/
	public function addarticle() {
		//获取分类信息
		$data['category'] = $this->Article_model->get_category();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/write');
		$this->load->view('Admin/footer');
	}


/*添加新文章*/
	public function insertart() {
		//获取文章信息
		$category = $this->input->post('category');
		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$description = $this->input->post('description');
		$content = $this->input->post('content');
		$createtime = time();
		$viewnum=rand(170,500);
		$info = array("cid"=>$category,"title"=>$title,"author"=>$author,"description"=>$description,"content"=>$content,"createtime"=>$createtime,"viewnum"=>$viewnum);
		//插入文章并更新分类
		if($this->Article_model->insert_article($info) && $this->Article_model->update_cate($category,1)){
			redirect('Article/index');
		}
	}

/*编辑文章*/
	public function editart() {
		//获取文章id分类信息和文章信息
		$aid = $this->uri->segment(3);
		$data['category'] = $this->Article_model->get_category();
		$data['article'] = $this->Article_model->get_art_info($aid);
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/edit');
		$this->load->view('Admin/footer');
	}


/*更新文章*/
	public function updateart() {
		//获取文章信息	
		$aid = $this->uri->segment(3);
		$category = $this->input->post('category');
		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$description = $this->input->post('description');
		$content = $this->input->post('content');
		$createtime = time();
		//查询原有分类
		$result = $this->Article_model->get_art_info($aid);
		//分类是否修改
		if($category != $result['cid']) {
			$res1 = $this->Article_model->update_cate($category,1);
			$res2 = $this->Article_model->update_cate($result['cid'],0);
		}
		$info = array("cid"=>$category,"title"=>$title,"author"=>$author,"description"=>$description,"content"=>$content,"createtime"=>$createtime);
		//执行更新操作
		if($this->Article_model->update_art($aid,$info)) {
			redirect('Article/index');
		}else{
                  echo "<script>alert('添加失败');location.href='addshow';</script>";
            }
	}


/*加载略图表单*/
	public function upimg() {
		//获取文章id分类信息和文章信息
		$aid = $this->uri->segment(3);
		$data['article'] = $this->Article_model->get_art_info($aid);
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/upimg');
		$this->load->view('Admin/footer');
	}

/*上传缩略图*/
	public function  do_upload(){
	   $aid = $this->uri->segment(3);//获取文章id
       $config['upload_path'] = 'upload/img/';   //注意：此路劲是相对于CI框架中的根目录下的目录
       $config['allowed_types'] = 'gif|jpg|png';    //设置上传的图片格式
       $config['max_size'] = '500';              //设置上传图片的文件最大值
       $config['max_width']  = '1200';            //设置图片的最大宽度
       $config['max_height']  = '1200';
       $this->load->library('upload', $config);   //加载CI中的图片上传类，并递交设置的各参数值
       if ($this->upload->do_upload())
      {   
            $arr = $this->upload->data();     //此函数是返回图片上传成功后的信息
            $data['photo']="upload/img/".$arr['orig_name'];
            $this->db->update('article', $data,array($aid));//更新数据对应位置数据
		//成功返回
		if($this->Article_model->update_art($aid,$data)) {
			redirect('Article/index');
		}else{
                  echo "<script>alert('添加失败');location.href='addshow';</script>";
            }

       }
    }


/*删除文章*/
	public function delarticle() {
		//获取文章id和分类信息
		$aid = $this->uri->segment(3);
		$cid = $this->Article_model->get_artcid($aid);
		//执行删除操作		
		if($this->Article_model->del_article($aid) && $this->Article_model->update_cate($cid,0)){
			$data['tips'] = "删除成功!";
		} else {
			$data['tips'] = "删除失败!";
		}
		$data['route'] = site_url('Article/index');
		//输出信息并跳转
		$this->load->view('tips',$data);
	}
	
}

?>
