<!--友链审核 时间：20180315 作者:HXC -->
<div class="plan_box" >
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">友链审核</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		
		<!--友链申请列表-->
		<div style="display: inline-block;">
			<div class="layui-form">
			  <table class="layui-table">
			    <colgroup>
			      <col width="150">
			      <col width="150">
			      <col width="300">
			      <col width="150">
			      <col>
			    </colgroup>
			    <thead>
			      <tr>
			        <th>站名</th>
			        <th>网址</th>
			        <th>头像地址</th>
			        <th>邮箱</th>
			        <th>操作</th>
			      </tr> 
			    </thead>
			     <?php foreach($wait_list as $val){ ?>
			    <tbody>
			      <tr>
			       <td class = "<?php echo $val['id']?>" name = "webname"><a href="<?php echo $val['website'];?>"><?php echo $val['webname'];?></a></td>
			       <td class = "<?php echo $val['id']?>" name = "website"><?php echo $val['website'];?></td>
			       <td class = "<?php echo $val['id']?>" name = "touxiang"><?php echo $val['touxiang'];?></td>
			       <td class = "<?php echo $val['id']?>" name = "email"><?php echo $val['email'];?></td>
			       <td><a href="<?php echo site_url(array('Admin','waitdellink',$val['id']));?>" onclick = "javascript:return del()">删除</a></td>
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

