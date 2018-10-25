
<!--banner开始-->
<div class="banner" style="text-align:center;overflow:hidden;">
  <img  src="<?php echo base_url();?>public/style/img/listbg2.jpg">
</div>
<!--banner结束-->

<!--logo开始-->
<div class="logo" style="height:120px;" >
  <div class="logo_mo" style="height:20px;"></div>
  <div class="logo_btnbox">
    <div class="btn btn_gradient" >
    	<a style="color:#fff;" href="<?php echo site_url('/Home/content/35')?>">
    		<span class="glyphicon glyphicon-certificate" ></span>&nbsp;关于我
  	    </a>
    </div>

    <div class="btn btn_gradient2" >
    	<a style="color:#fff;" href="<?php echo site_url('/Home/neigh')?>">
    		<span class="glyphicon glyphicon-heart" ></span>&nbsp;左邻右舍
    	</a>
    </div>

    <div class="btn btn_gradient3">
    	<a style="color:#fff;" href="<?php echo site_url('/Home/messages')?>">
    		<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp;吐槽啦!
		</a>
    </div>
  </div>
</div>
<!--logo结束-->

<!--主体内容框开始-->
<div class="content" style="min-height:0px;">
<!--特殊导航条开始-->
  <div class="senav" >
    <div class="nav_ul">
      <a href="<?php echo site_url('Home/index')?>">
        <li class="nav_ul_first">首页</li>
      </a>
    <!--其他栏目开始-->
    <?php
          $i=0; 
            foreach($category as $val){
              if($i<6){
                $segments = array('Home','block',$val['cid']);
                $url = site_url($segments);
                echo '<a href='."{$url}".'><li>'."{$val['catename']}".'</li></a>';
                $i++;
              }else{ 
              break;
            }
           }
    ?>
    </div>
  </div>
  <!--特殊导航条结束-->


  <!--文章开始-->
  <div class="article_box">
    <div class="article_sebox">
    <div class="content_tagimg">
        <img width="100" height="auto" src="<?php echo base_url();?>public/style/img/contag.png">
    </div>

      <!--标题-->
      <div class="article_title">
         <?php echo $content['title'];?>
      </div>
      <!--作者时间-->
      <div class="article_setitle">
          <span><span class="glyphicon glyphicon-user" style="color: #ff6e03;"></span>&nbsp;作者：<?php echo $content['author'];?></span>
          <span><span class="glyphicon glyphicon-dashboard" style="color: #02b73b"></span>&nbsp;发布时间：<?php echo date("Y-m-d H:i:s",$content['createtime']);?></span>
          <span><span class="glyphicon glyphicon-fire" style="color: #f00"></span>&nbsp;访客：<?php echo $content['viewnum'];?></span>
      </div>
      <!--内容-->
      <div class="article_tagimg"></div>
            <?php echo $content['content'];?>
      </div>
      <!--评论-->
      <div class="article_comment">
		<!--留言-->
		<div class="col-md-12 message_box">
			<div class="message_style" style="height:auto;padding:35px;" >
			<h4>点评一下</h4>
				
			</div>

		</div>
      </div>

    </div>
</div>
<!--主体内容框结束-->

<!--百度UEditor代码高亮编辑器-->
<script type="text/javascript" src="<?php echo base_url();?>public/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>public/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
<script type="text/javascript">
    SyntaxHighlighter.all();
</script>


