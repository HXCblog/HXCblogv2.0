<!--版本与计划 时间：20170815 作者:HXC -->
<div class="plan_box" >
<div class="layui-tab layui-tab-card admin_bg">
  <ul class="layui-tab-title">
    <li class="layui-this">友情链接管理</li>
  </ul>
  <div class="layui-tab-content" >
    <div class="layui-tab-item layui-show">
		<!--内容更新开始-->
		<form class="layui-form layui-form-pane" method = "post" action = "<?php echo site_url('Admin/add_link');?>" id = "form_link">
		<!--站名-->
		  <div class="layui-form-item" style="display: inline-block;">
		    <label class="layui-form-label">站名</label>
		    <div class="layui-input-inline">
		      <input type="text" name="webname" id="zhanming" lay-verify="required" placeholder="站名" autocomplete="off" class="layui-input">
		    </div>
		  </div>
		<!--时间-->
		  <div class="layui-form-item" style="display: inline-block;">
		    <label class="layui-form-label">时间</label>
		    <div class="layui-input-inline">
		      <input type="text" name = "addtime" id="shijian" lay-verify="required" placeholder="添加时间" autocomplete="off" class="layui-input" onclick="layui.laydate({elem: this, festival: true})">
		    </div>
		  </div>

		<!--网址-->
		<div class="layui-form-item">
		    <label class="layui-form-label">网址</label>
		    <div class="layui-input-block">
		      <input type="text" required  lay-verify="required" placeholder="网址：（例如：http://www.huxinchun.com)" name = "website" autocomplete="off" class="layui-input">
		    </div>
		</div>

		<!--邮箱-->
		<div class="layui-form-item">
		    <label class="layui-form-label">邮箱</label>
		    <div class="layui-input-block">
		      <input type="text"  placeholder="网址:(输入邮箱地址)" name = "email" autocomplete="off" class="layui-input" >
		    </div>
		</div>

		<!--头像-->
		<div class="layui-form-item">
		    <label class="layui-form-label">头像</label>
		    <div class="layui-input-block">
		      <input type="text" placeholder="输入头像地址" name = "touxiang" autocomplete="off" class="layui-input">
		    </div>
		</div>
		 	 <button class="layui-btn" lay-submit="" lay-filter="demo1" id = "add_link">添加友链</button>
  			 <button type="submit" class="layui-btn layui-btn-danger">修改</button>
		</form>
		<!--内容更新结束-->

		<!--计划列表开始-->
		<div style="display: inline-block;">
			<div class="layui-form">
			  <table class="layui-table">
			    <colgroup>
			      <col width="150">
			      <col width="150">
			      <col width="250">
			      <col width="150">
			      <col width="150">
			      <col width="120">
			      <col>
			    </colgroup>
			    <thead>
			      <tr>
			        <th>网站名称</th>
			        <th>添加时间</th>
			        <th>网址显示</th>
			        <th>邮箱</th>
			        <th>头像</th>
			        <th>操作</th>
			      </tr> 
			    </thead>
			     <?php foreach($link_list as $val){ ?>
			    <tbody>
			      <tr>
			       <td class = "<?php echo $val['id']?>" name = "webname"><a href="<?php echo $val['website'];?>"><?php echo $val['webname'];?></a></td>
			       <td class = "<?php echo $val['id']?>" name = "addtime"><?php echo $val['addtime'];?></td>
			       <td class = "<?php echo $val['id']?>" name = "website"><?php echo $val['website'];?></td>
			       <td class = "<?php echo $val['id']?>" name = "email"> <div style="width: 100px;overflow: hidden;" title="<?php echo $val['email'];?>"><?php echo $val['email'];?></div></td>
			       <td class = "<?php echo $val['id']?>" name = "touxiang">
			        <div style="width: 100px;overflow: hidden;" title="<?php echo $val['touxiang'];?>"><?php echo $val['touxiang'];?></div>
			       </td>
			       <td><a href = "#" class = "changlink" id = "<?php echo $val['id']; ?>">修改</a> | <a href="<?php echo site_url(array('Admin','dellink',$val['id']));?>" onclick = "javascript:return del()">删除</a></td>
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


<!--时间选择-->
<script src="<?php echo base_url();?>/public/theme/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->

<!--layui 表单自动获取时间-->
<script>
layui.use('laydate', function(){
  var laydate = layui.laydate;
  
  var start = {
    min: laydate.now()
    ,max: '2099-06-16 23:59:59'
    ,istoday: false
    ,choose: function(datas){
      end.min = datas; //开始日选好后，重置结束日的最小日期
      end.start = datas //将结束日的初始值设定为开始日
    }
  };
  
  var end = {
    min: laydate.now()
    ,max: '2099-06-16 23:59:59'
    ,istoday: false
    ,choose: function(datas){
      start.max = datas; //结束日选好后，重置开始日的最大日期
    }
  };
  
  document.getElementById('LAY_demorange_s').onclick = function(){
    start.elem = this;
    laydate(start);
  }
  document.getElementById('LAY_demorange_e').onclick = function(){
    end.elem = this
    laydate(end);
  }
  
});
</script>



  

