<!--文件名：版本计划界面 作者：HXC 时间：20180305更新 -->
<style type="text/css">
#sentitle{text-align: center;font-size:30px;padding: 5px;}
tr:nth-child(2n){ background:#f0f9fd}
td:nth-child(2n){ color: #229a27;}

/*畅言评论框样式*/
#SOHUCS #SOHU_MAIN .module-cmt-box .post-wrap-w .post-wrap-main{background:none;background-image:none;) !important;}
#SOHUCS #SOHU_MAIN .module-cmt-box .post-wrap-w .wrap-action-w .action-issue-w .issue-btn-w a .btn-fw{background:none;background-image:url(http://www.huxinchun.com/public/pictures/post-btn.png) !important;}
</style>
<!--banner开始-->
<div class="banner" style="text-align:center;">
  <img  src="<?php echo base_url();?>public/style/img/listbg4.jpg">
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
    <!--标题开始-->
    <div class="senav" >
        <div id="sentitle">博客大计事</div>
    </div>
    <!--标题结束-->

    
    <div class="article_box">
        <!--列表开始-->
        <div class="article_sebox">
         <table class="table table-bordered table-hover">
            <colgroup>
              <col width="100">
              <col width="150">
              <col width="500">
            </colgroup>
            <thead style="background: #efefef">
                <th>时间</th>
                <th>事件</th>
                <th>内容</th>
            </thead>
            <?php foreach($plan as $val){?>
              <tr>
                <td class = "<?php echo $val['id']?>" name = "finished"><?php echo $val['finished'];?></td>
                <td class = "<?php echo $val['id']?>" name = "usedtime"><?php echo $val['usedtime'];?></td>
                <td class = "<?php echo $val['id']?>" name = "planname"><?php echo $val['planname'];?></td>
              </tr>
            <?php } ?>
          </table>
        </div>
        <!--列表结束-->
      
        <!--评论-->
        <div class="article_comment">
            <!--留言-->
            <div class="col-md-12 message_box">
                <div class="message_style" style="height:auto;padding:35px;" >
                <h4>点评一下</h4>
                   <!--PC版-->
                    <div id="SOHUCS" sid=" <?php echo $val['id'];?>"></div>
                    <script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
                    <script type="text/javascript">
                    window.changyan.api.config({
                    appid: 'cyt05y4uR',
                    conf: 'prod_02cf7f8f4f6d36f0496fff918632c674'
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!--主体内容框结束-->