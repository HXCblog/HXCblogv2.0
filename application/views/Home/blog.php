<!--banner开始-->
<div class="banner" style="text-align:center;overflow:hidden;">
  <img  src="<?php echo base_url();?>public/style/img/listbg.jpg">
</div>
<!--banner结束-->

<!--banner背景-->
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
<div class="content">
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
		$i++; }else{ break; }
	     }
		?>    
    </div>
  </div>
  <!--特殊导航条结束-->

  <!--左侧边栏框开始-->
  <div class="left_box">
      <!--工具开始-->
      <div class="left_cell" style="height: 200px;">
        <!--书签标题-->
          <div class="ui red ribbon label lmar left_fla" style="background: #337ab7;">
            工具导航
          </div>

          <div style="width: 300px;height: 100px;">
            <div  class="card_img">
              <a href="#">
                <img id="sinasite" src="<?php echo base_url();?>public/style/img/sinap.png">
                <p>前端工具</p>
              </a>
            </div>

            <div class="card_img">
              <a title="博主邮箱:hi@huxinchun.com" onclick="funem();" href="">
                <img id="emailsite" src="<?php echo base_url();?>public/style/img/emailp.png">
                <p>博主邮箱</p>
              </a>
            </div>
              <script>
              function funem(){
                alert("博主邮箱:hi@huxinhcun.com");
              }
              </script>
            
            <div class="card_img">
              <a href="#">
                <img id="appsite" src="<?php echo base_url();?>public/style/img/app.png">
                <p>本站APP</p>
              </a>
            </div>

            <div class="card_img">
              <a href="#">
                <img id="githubsite" src="<?php echo base_url();?>public/style/img/gitp.png">
                <p>&nbsp;GitHub</p>
              </a>
            </div>
        </div>
      </div>
      <!--工具结束-->

      <!--文章搜索开始-->
      <div class="left_cell" style="height: 95px;padding: 30px 15px;">
      <form method="post" action="<?php echo site_url('Home/index_so'); ?>">
        <div class="input-group">  
            <input type="text" class="form-control" name="soso" placeholder="文章搜索">
            <span class="input-group-btn">
              <button class="btn btn-info" style="width: 70px;" type="submit">搜搜</button>
            </span>
        </div>
       </form>
      </div>
      <!--文章搜索结束-->

        <div class="left_cell">
        <!--书签标题-->
        <div class="ui red ribbon label lmar left_fla" style="background: #d9534f">
          热门文章
        </div>
        <!--列表-->
        <div class="left_list_box">
         <?php foreach($order as $val){ 
				$segments = array('Home','content',$val['id']);
				$url = site_url($segments);
			?>
			<a style="text-decoration: none" href = "<?php echo $url;?>">
			<div class="left_list">
			<?php echo $val['title'];?>
			</div></a>
		 <?php }?>
        </div>
        <!--数字-->
        <div class="left_num_box">
          <div class="left_num" style="background:#1dc0f1;">1</div>
          <div class="left_num" style="background:#f15044;">2</div>
          <div class="left_num" style="background:#f59608;">3</div>
          <div class="left_num" >4</div>
          <div class="left_num" >5</div>
          <div class="left_num" >6</div>
          <div class="left_num" >7</div>
          <div class="left_num" >8</div>
        </div>
      </div>
      
     
      <!--左邻右舍开始-->
      <div class="left_cell" style="height: 495px;">
        <!--书签标题-->
          <div class="ui red ribbon label lmar left_fla" style="background: #5cb85c;">
            左邻右舍
          </div>
         
          <div class="left_narbox" style="height: 335px;width:310px;">
          <?php  $i=0;
          foreach($link_list as $val){ 
          if($i<16){ ?>
           <div class="left_narcard">
              <a title="<?php echo $val['webname'];?>" href = "<?php echo $val['website'];?>">
                <div class="narcard_img">
                  <img width="53" height="50" src="<?php echo $val['img'];?>">
                </div>
                <div class="narcard_name"><?php echo $val['webname'];?></div>
               </a>
            </div>
          <?php $i++;}else{ break; } } ?>  
          </div>
          <!--更多友联-->
          <div class="left_link">
               <button style="ma" type="button" onclick="javascript:window.location.href='<?php echo site_url('/Home/neigh')?>' " class="btn btn-info">
               <span class="glyphicon glyphicon-heart" aria-hidden="true" style="color: #c14442"></span>&nbsp;更多邻居</button>
          </div>
      </div>
      <!--左邻右舍结束-->

      <!--友好-->
      <div class="left_cell" style="height:170px;">
        <img width="298" height="auto" src="<?php echo base_url();?>public/style/img/huxinchun.gif">
      </div>
  </div>
  <!--左侧边栏框结束-->


  <!--右侧框开始-->
  <div class="right_box" >

     <!--文章列表开始-->
      <?php foreach($article as $val){   
      $segments = array('Home','content',$val['id']);
      $url = site_url($segments);
     ?> 
      <a name = "<?php echo $val['id']; ?>" href="<?php echo $url;?>" id = "art_title_<?php echo $val['id']; ?>">
      <div class="right_cell">
        <!--圆圈日期开始-->
          <div  class="round-date red ">
            <span class="month"><?php echo  date("m",$val['createtime']); ?>月</span>
            <span class="day"><?php echo  date("d",$val['createtime']); ?></span>
          </div>
        <!--圆圈日期结束-->
      <div class="page_title"><h2><?php echo $val['title'];?></h2></div>
       
        
        <!--描述-->
        <div class="page_content">
          <div class="page_content_left">
            <img onerror="this.src='<?php echo base_url();?>public/style/img/huxinchun.gif'" src="<?php echo base_url();?><?php echo $val['photo'] ?>">
          </div>
          <div class="page_content_right">
          文章摘要：<?php echo $val['description'];?>
          </div>
           
        </div>

  
        <!--标签开始-->
        <div class="tag_box" >
          <div style="display: inline-block;">
            <span><span class="glyphicon glyphicon-user"></span>&nbsp;作者：<?php echo $val['author'];?></span>
            <span style="margin-left:30px;"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;发布时间：<?php echo  date("Y-m-d",$val['createtime']); ?></span>
            <span style="margin-left:30px;"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;围观<?php echo $val['viewnum'];?></span>
            <span style="margin-left:30px;"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;
            <?php echo $val['cid'];?></span>
          </div>
        </div>
        <!--标签结束-->
      </div>
      </a>
      <?php }?>
      <!--文章列表结束-->

	<!--分页-->
    <div class="right_carnum">
      <nav aria-label="...">
        <ul class="pagination">
        <?php echo $links;?>
        </ul>
      </nav>

    </div>
  </div>
  <!--右侧框结束-->

</div>
<!--主体内容框结束-->













		
	
