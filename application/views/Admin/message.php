<!--版本与计划 时间：20170815 作者:HXC -->
<div class="plan_box" >
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">留言管理</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--内容更新开始-->
		<form class="layui-form layui-form-pane" method = "post" action = "<?php echo site_url('Admin/add_message');?>" id = "form_message">
		<!--昵称-->
		  <div class="layui-form-item" style="display: inline-block;">
		    <label class="layui-form-label">昵称</label>
		    <div class="layui-input-inline">
		      <input type="text" name="name" id="zhanming" lay-verify="required" placeholder="昵称(必填)" autocomplete="off" class="layui-input">
		    </div>
		  </div>

		<!--邮箱-->
		  <div class="layui-form-item" style="display: inline-block;">
		    <label class="layui-form-label">邮箱</label>
		    <div class="layui-input-inline">
		      <input type="text" name="email" id="zhanming" lay-verify="required" placeholder="邮箱(必填)" autocomplete="off" class="layui-input">
		    </div>
		  </div>
	
		<!--网址-->
		<div class="layui-form-item">
		    <label class="layui-form-label">网站</label>
		    <div class="layui-input-block">
		      <input type="text" placeholder="选填网址(如:http://www.huxinchun.com)" name = "website" autocomplete="off" class="layui-input">
		    </div>
		</div>

		<!--内容-->
		<div class="layui-form-item">
		    <label class="layui-form-label">内容</label>
		    <div class="layui-input-block">
		      <input type="text" required  lay-verify="required" placeholder="填写留言内容" name = "info" autocomplete="off" class="layui-input">
		    </div>
		</div>
			<button class="layui-btn" lay-submit="" lay-filter="demo1" id = "add_link">留言</button>
		</form>
		<!--内容更新结束-->

		<!--计划列表开始-->
		<div style="display: inline-block;">
			<div class="layui-form">
			  <table class="layui-table">
			    <colgroup>
			      <col width="120">
			      <col width="150">
			      <col width="80">
			      <col width="450">
			      <col width="100">
			      <col width="100">
			      <col width="100">
			    </colgroup>
			    <thead>
			      <tr>
			        <th>时间</th>
			        <th>昵称</th>
			        <th>头像</th>
			        <th>内容</th>
			        <th>邮箱</th>
			        <th>网址</th>
			        <th>操作</th>
			      </tr> 
			    </thead>
			     <?php foreach($info as $val){ ?>
			    <tbody>
			      <tr>
		            <td name = "time"><?php echo date('m-d H:i',(int)$val['time']); ?></td>
		            <td name = "name"><a target="_blank" href="<?php echo $val['website'];?>"><?php echo $val['name'];?></a></td>
		            <td name = "img"><img width="50" height="50" src="<?php echo $val['img'];?>"></td>
					<td name = "info"><?php echo $val['info'];?></td>
					<td name = "email"><?php echo $val['email'];?></td>
					<td name = "website"><?php echo $val['website'];?></td>
				    <td><a href="<?php echo site_url(array('Admin','delmessage',$val['id']));?>" onclick = "javascript:return del()">删除</a></td>
			      </tr>
			    </tbody>
			    <?php } ?>
			  </table>
			</div>
		</div>
		<!--计划列表结束-->

    </div>
  </div>
</div>
</div>

