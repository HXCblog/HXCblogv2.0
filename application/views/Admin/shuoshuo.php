<!--闲言碎语 时间：20180307 作者:HXC -->
<div class="plan_box" >
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">闲言碎语</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--内容更新开始-->
		<form class="layui-form layui-form-pane" method = "post" action = "<?php echo site_url('Admin/addshuoshuo');?>" id = "form_plan">
			<div class="layui-form-item layui-form-text">
			    <div class="layui-input-block">
			      <textarea placeholder="请输入更新内容" autocomplete="off" name = "words" id="inputPlan1" class="layui-textarea"></textarea>
			    </div>
			</div>
			<button class="layui-btn" lay-submit="" lay-filter="demo1" id = "addshuoshuo">发布</button>
		</form>
		<!--内容更新结束-->

		<!--计划列表开始-->
		<div style="display: inline-block;">
			<div class="layui-form">
			  <table class="layui-table">
			    <colgroup>
			      <col width="200">
			      <col width="600">
			      <col width="80">
			      <col>
			    </colgroup>
			    <thead>
			      <tr>
			        <th>时间</th>
			        <th>语录</th>
			        <th>操作</th>
			      </tr> 
			    </thead>
			     <?php foreach($info as $val){?>
			    <tbody>
			      <tr>
			       <td name = "time"><?php echo date('Y-m-d H:i:s',(int)$val['time']); ?></td>
			       <td class = "<?php echo $val['id']?>" name = "words"><?php echo $val['words'];?></td>
			       <td><a href="<?php echo site_url(array('Admin','delshuoshuo',$val['id']));?>" onclick = "javascript:return del()">删除</a></td>
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



  

