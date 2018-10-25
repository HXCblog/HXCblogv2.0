<!-- 文章编辑 时间：20170811 作者：HXC -->
<div class="edit_box">
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">修改文章</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">

		<!--内容部分开始-->
			<form method = "post" enctype="multipart/form-data" action = "<?php echo site_url('Article/do_upload');?>/<?php echo $article['id']; ?>">
				
			<input type="file" name="userfile" size="20"/>
            <input type="submit" value="upload"/>
				
			</form>
		<!--内容部分结束-->
		
    </div>
  </div>
</div>
</div>



