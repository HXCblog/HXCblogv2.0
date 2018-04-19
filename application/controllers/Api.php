<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
header('Access-Control-Allow-Origin:*');
require APPPATH . '/libraries/REST_Controller.php';
class Api extends \Restserver\Libraries\REST_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Liuyan_model'));
    }


/*获取所有内容*/

    public function index_get()
    {
        header('Access-Control-Allow-Origin:*');
        $table = "article";//选定数据表
        $this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
        $query = $this->db->get($table);
        //result_array();返回查询的所有数据，特别注意：row_array()为返回查询的第一条数据
        $data = $query->result_array();

         if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    
    }
/*获取前10条数据*/
    public function some_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article order by id DESC LIMIT 8');
        $data = $query->result_array();
        $this->response($data);
    }



/*获取所有文章标题*/
    public function title_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT title FROM article order by id DESC ');
        $data = $query->result_array();
        $this->response($data);
    }

/*获取所有文章标题时间作者加描述*/
    public function desc_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT title,createtime,author,description  FROM article order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }


/*获取分类信息*/

    public function category_get()
    {
        $table = "category";//选定数据表
        $query = $this->db->get($table);
        //result_array();返回查询的所有数据，特别注意：row_array()为返回查询的第一条数据
        $data = $query->result_array();

         if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    
    }

/*获取时间轴信息*/
    public function diary_get()
    {
        $table = "diary";//选定数据表
        $query = $this->db->get($table);
        //result_array();返回查询的所有数据，特别注意：row_array()为返回查询的第一条数据
        $data = $query->result_array();

         if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    
    }

/*获取版本信息*/
    public function plan_get()
    {
        $table = "plan";//选定数据表
        $query = $this->db->get($table);
        //result_array();返回查询的所有数据，特别注意：row_array()为返回查询的第一条数据
        $data = $query->result_array();

         if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    
    }


//查询特定分类下的所有文章
//访问方式：http://www.huxinchun.com/api/blog?id=17
     public function blog_get()
    {

        $id = $this->get('id');//定义获取的端口号id
        //检测是否为空
        if(empty($_GET['id'])){
            $this->response(array('error'=>'条件不能为空！',400));
        }

        $table = "article";//选定数据表
        //查询user表中与条件id相等的uid的数据
        $query = $this->db->get_where($table,array('cid'=>$id));
        $data = $query->row_array();//定义数据
        

        if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    
    }










//返回带参数的索引值
   public function mm_get()
    {
        $table = "article";//选定数据表
        //查询user表中与条件id相等的uid的数据
        $query = $this->db->get($table);
        $data = $query->row_array(3);//传递第二行参数的索引
        $this->response($data);
    }


/*单查，获取文章标题*/
    public function onetitle_get(){
        $query = $this->db->query('SELECT title FROM article');
        $data = $query->row_array();
        $this->response($data);
    }


/*多项单查*/
    public function thetitle_get(){
        $query = $this->db->query('SELECT id, title FROM article LIMIT 1');
        $data = $query->result_array();
        $this->response($data);
    }

/*多项多查*/
    public function foutitle_get(){
        $query = $this->db->query('SELECT id, title FROM article ');
        $data = $query->result_array();
        $this->response($data);
    }

//预留扩展接口
//访问方式：http://www.huxinchun.com/api/next?id=63
     public function next_get()
    {

        $id = $this->get('id');//定义获取的端口号id
        //检测是否为空
        if(empty($_GET['id'])){
            $this->response(array('error'=>'条件不能为空！',400));
        }

        $table = "article";//选定数据表
        //查询user表中与条件id相等的uid的数据
        $query = $this->db->get_where($table,array('id'=>$id));
        $data = $query->row_array();//定义数据
        

        if(empty($data)){
            //如果数据为空，返回错误状态
            $this->set_response([
                '状态' => FALSE,
                '信息' => '暂无数据'
            ], \Restserver\Libraries\REST_Controller::HTTP_NOT_FOUND);
        }else{
            //成功，返回数据
            $this->response($data);
        }
    
    }






/***************************************************************************************************************/


/*首页文章接口*/

//前10条数据
    public function index_ten_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article order by id DESC LIMIT 10');
        $data = $query->result_array();
        $this->response($data);
    }
//10条以后
    public function index_hou_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article order by id DESC LIMIT 10,1000');
        $data = $query->result_array();
        $this->response($data);
    }



/*大前端文章接口*/

//所有数据
     public function daqianduan_ten_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=17 order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }

//10条以后数据

    public function daqianduan_hou_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=17 order by id DESC LIMIT 10,10000');
        $data = $query->result_array();
        $this->response($data);
    }

/*移动文章接口*/

//所有数据
     public function yidong_ten_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=29 order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }
//10条后
     public function yidong_hou_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=29 order by id DESC LIMIT 10,10000');
        $data = $query->result_array();
        $this->response($data);
    }

/*UI框架文章接口*/

//所有数据
     public function ui_ten_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=19 order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }
//10条后
     public function ui_hou_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=19 order by id DESC LIMIT 10,10000');
        $data = $query->result_array();
        $this->response($data);
    }

/*杂谈文章接口*/

//所有数据
     public function zatan_ten_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=20 order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }
//10条后
     public function zatan_hou_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=20 order by id DESC LIMIT 10,10000');
        $data = $query->result_array();
        $this->response($data);
    }

/*心得笔记文章接口*/

//所有数据
     public function biji_ten_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=22 order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }
//10条后
     public function biji_hou_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=22 order by id DESC LIMIT 10,10000');
        $data = $query->result_array();
        $this->response($data);
    }

/*h5css3*/

//所有数据
     public function h5_ten_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=18 order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }
//10条后
     public function h5_hou_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description FROM article where cid=18 order by id DESC LIMIT 10,10000');
        $data = $query->result_array();
        $this->response($data);
    }


//关于页面接口
      public function guanyu_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description,content FROM article where id=35');
        $data = $query->result_array();
        $this->response($data);
    }
//说明文档接口
      public function shuoming_get(){
        $table = "article";//选定数据表
        $query = $this->db->query('SELECT id,author,createtime,title,description,content FROM article where id=40');
        $data = $query->result_array();
        $this->response($data);
    }

//留言列表接口文档
      public function liuyan_get(){
        $table = "liuyan";//选定数据表
        $query = $this->db->query('SELECT id,time,name,img,info,href,bottom FROM liuyan order by id DESC');
        $data = $query->result_array();
        $this->response($data);
    }




//插入留言接口
    public function myliuyan_get() {
        //获取文章信息
        $name = $this->input->get('name');
        $content = $this->input->get('content');
        $info = array("name"=>$name,"info"=>$content);
        //插入文章并更新分类
        $table = "liuya";//暂时停用
        $this->db->insert($table,$info);
        return $this->db->affected_rows();
    }

//问题反馈插入接口
    public function problem_get() {
        //获取文章信息
        $email = $this->input->get('email');
        $content = $this->input->get('content');
        $info = array("email"=>$email,"content"=>$content);
        //插入文章并更新分类
        $table = "problem";
        $this->db->insert($table,$info);
        return $this->db->affected_rows();
    }

//分页接口
	public function fenye_get() {
	$pageSize = 5; //每页显示数据条数
	$result = $this->db->query('select * from article');
	$totalNum=$result->num_rows();//数据总数
	$totalPageCount = intval($totalNum/$pageSize); //总页数
  
	//判断当前页是哪一页
	$nowPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
	//上一页
	$prev = ($nowPage-1 <= 0) ? 1 : $nowPage-1;
	//下一页
	$next = ($nowPage+1 >= $totalPageCount) ? $totalPageCount : $nowPage+1;
	  
	//偏移量
	$offset = ($nowPage-1)*$pageSize;
	//查询内容
	$sql="SELECT id,author,createtime,title,description FROM article order by id DESC LIMIT $offset,$pageSize";
	//执行一次查询内容
	$query = $this->db->query($sql);
	//获得查询结构
	$result = $query->result_array();
	//放回json数据
	$this->response($result);
	}

}
?>

