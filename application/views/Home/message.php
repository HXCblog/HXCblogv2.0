<!--文件名：留言板界面 作者：HXC 时间：20180309更新 -->
<style type="text/css">
#sentitle{text-align: center;font-size:30px;padding: 5px;}
tr:nth-child(2n){ background:#f0f9fd}
td:nth-child(2n){ color: #777;}
</style>


<!--banner开始-->
<div class="banner" style="text-align:center;">
  <img  src="<?php echo base_url();?>public/style/img/liuyan.jpg">
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
<div class="content">
    <!--标题开始-->
    <div class="senav" >
        <div id="sentitle">留言吐槽</div>
    </div>
    <!--标题结束-->

    <div class="col-lg-11">
        <form method = "post" action = "<?php echo site_url('Home/add_message');?>" id = "message" class="form-horizontal">
            <div class="form-group">
                <!--昵称-->
                <div class="group">
                    <label class="col-sm-2 control-label">昵称:</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="昵称(必填)" class="form-control" name="name" id="zhanming" />
                    </div>
                </div> 

                <div class="group">
                <label class="col-sm-2 control-label">网址:</label>
                <div class="col-sm-4">
                    <input type="text" name = "website" placeholder="选填,例(http://www.huxinchun.com)" class="form-control"/>
                </div>
            </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱:</label>
                <div class="col-sm-5">
                    <input type="text" placeholder="(选填)" class="form-control" name="email" />
                </div>
            </div>
      
          
            <div class="form-group">
                <label class="col-sm-2 control-label">内容:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" type="text" placeholder="留言内容(必填)"  name = "info"  required></textarea> 
                </div>
            </div>
  
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-4">
                    <button id = "add_message" type="submit" class="btn btn-info">留言</button>
                    <button type="reset" onclick="reloadPage()" class="btn btn-primary">重填</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="hr-line-dashed"></div>
  

  <!--留言列表开始-->
  <div class="article_box">
    <div class="col-md-10 col-md-offset-1">
    <table class="table">
        <thead>
          <tr>
            <th style='width:10%;' class="center">头像</th>
            <th style='width:12%;' class="center">昵称</th>
            <th >内容</th>
          </tr>
        </thead>
        <?php foreach($info_list as $val){ ?>
          <tr>
            <td><span><img class="img-thumbnail" style="width: 65px; height: 65px;border-radius: 50px;" src="<?php echo $val['img'];?>"></td>
            <td><a target="_blank" href='<?php echo $val['website']; ?>'><span style="color: #1eabef"><?php echo $val['name'];?></span></a>
            <br><span style="color: #999"><?php echo date('m-d h:i',(int)$val['time']); ?></span>
            </td>
            <td><span style="color: #555"><?php echo $val['info'];?></span></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </div>

  <!--留言列表结束-->
  <div style="text-align: center;">
    <nav aria-label="...">
        <ul class="pagination">
          <?php echo $links;?>
        </ul>
      </nav>
  </div>

</div>
</div>
<!--主体内容框结束-->


<!--格式验证-->
<link rel="stylesheet" href="<?php echo base_url();?>public/yanzheng/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url();?>public/yanzheng/vendor/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/yanzheng/dist/js/bootstrapValidator.js"></script>

<script type="text/javascript">
    $('#message').bootstrapValidator({
        message: '请输入有效信息',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        //group: '.form-group',
        fields: {
            name: {
                group: '.group',
                validators: {
                    notEmpty: {
                        message: '昵称不能为空！'
                    }
                }
            },
            info: {
                // The "group" option can be set via HTML attribute
                // <input type="text" class="form-control" name="lastName" data-bv-group=".group" />
                group: '.group',
                validators: {
                    notEmpty: {
                        message: '留言内容不能为空！'
                    }
                }
            },

           
            email: {
                validators: {
                    emailAddress: {
                        message: '请输入有效邮箱！'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            }
        }
    });

    /*刷新页面*/
    function reloadPage(){
      location.reload()
    }

</script>