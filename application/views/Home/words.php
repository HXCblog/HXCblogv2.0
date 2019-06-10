<!--文件名：闲言碎语界面 作者：HXC 时间：20180308更新 -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/words/words.css">
<style type="text/css">
#sentitle{text-align: center;font-size:30px;padding: 5px;}
</style>

<!--banner开始-->
<div class="banner">
  <img  src="<?php echo base_url();?>public/style/img/shuoshuo.jpg">
</div>
<!--banner结束-->

<!--logo开始-->
<div class="logo" style="height:120px;" >
  <div class="logo_mo" style="height:20px;"></div>
  <div class="logo_btnbox">
    <div class="btn btn_gradient">
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
    <!--标题开始-->
    <div class="senav" >
        <div id="sentitle">闲言碎语</div>
    </div>
    <!--标题结束-->

    
    <div class="article_box">
       
       <div class="demo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline">
                        <!--单条数据开始-->
                        <?php foreach($info as $val){?>
                        <div class="timeline">
                            <div class="timeline-content">
                                <span class="date">
                                    <span class="day"><?php echo date('H:i',(int)$val['time']); ?></span>
                                    <span class="month" style="color: #fff;"><?php echo date('m-d',(int)$val['time']); ?></span>
                                    <span class="year" ><?php echo date('20y'); ?></span>
                                </span>
                                <h2 class="title"></h2>
                                <p class="description"><?php echo $val['words'];?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <!--单挑数据结束-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--分页开始-->
    <div class="fenye">
       <nav aria-label="...">
            <ul class="pagination">
                <?php echo $links;?>
            </ul>
       </nav>
    </div>
    <!--分页结束-->
    </div>
</div>
<!--主体内容框结束-->