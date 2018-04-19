<!--
*时间轴
-->
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
    	<a style="color:#fff;" href="<?php echo site_url('Liuyan')?>">
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
 
		<div style="width:100%;height:auto;">
		<iframe  src="<?php echo base_url();?>public/time/index.php" id="iframepage" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" onLoad="iFrameHeight()" width="100%"></iframe>
		</div>
		<!--高度自适应处理-->
		<script type="text/javascript" language="javascript">   
			function iFrameHeight() {   
				var ifm= document.getElementById("iframepage");   
				var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;   
				if(ifm != null && subWeb != null) {
				   ifm.height = subWeb.body.scrollHeight;
				   ifm.width = subWeb.body.scrollWidth;
					}   
			}   
		</script>
		</div>

    </div>
</div>
<!--主体内容框结束-->











		
	
