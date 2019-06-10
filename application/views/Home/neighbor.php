<!--文件名：友情链接界面 作者：HXC 时间：20170802/20180305更新 -->
<style type="text/css">
#melink:hover{color:#fff;background: #10b0e2;transition: 0.5s;}
#sentitle{text-align: center;font-size:30px;padding: 5px;}
#melink{padding: 10px 30px;margin-right: 10px;border-radius: 5px;border:1px solid#aaa;}

/*======== 友链页 ========*/

.links-main {
    letter-spacing: -.8em;
}

.grouping-title {
    letter-spacing: 0;
    margin-bottom: 6px
}

.links-main .item {
    display: inline-block;
    letter-spacing: 0;
    margin-right: 10px;
    margin-bottom: 2px;
    width: 200px;
    height: 160px;
    font-size: 14px;
    overflow: hidden;
    border-radius: 5px;
    background: #FFFFFF;
    border: 1px solid #e1e8ed
}

.links-main .link-bg {
    position: relative;
    height: 65px;
    padding: 0 1em
}

.links-main .link-bg:before {
    display: block;
    content: "";
    position: absolute;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.5)
}

.links-main .link-bg .link-avatar {
    position: absolute;
    bottom: -35px;
    border: 3px solid #FFFFFF;
    border-radius: 100%;
    background-color: #FFFFFF
}

.links-main .link-bg .link-avatar img {
    border-radius: 100%
}

.links-main .meta {
    padding: 1.2em 1em;
    text-align: right
}

.links-main .info {
    color: #525766;
    padding: 0 1em 1em
}

.links-main .info .name {
    font-weight: 600;
    font-size: 16px
}
.button_a{
  padding: 10px 15px;
  background:linear-gradient(to right,#0890b9,#fdd33c);
  color: #fff!important;
  border-radius: 20px;
}
.button_a:hover{background:linear-gradient(to right,#0890b9,#fb3b3b);}
#link_btn{font-size: 24px;background: #1da1af;padding: 8px 12px;border-radius: 15px;text-align: center;color: #fff;font-weight:bold;cursor: pointer;}
#link_btn:hover{background: #1a95a2;}
.link_b{background: #ccc;padding: 5px 8px;border-radius: 5px;text-align: center;color: #fff;margin:5px;display: inline-block;}
</style>

<!--banner开始-->
<div class="banner" style="text-align:center;">
  <img  src="<?php echo base_url();?>public/style/img/friends.jpg">
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
        <div id="sentitle"> 左邻右舍</div>
    </div>
    <!--标题结束-->

    <!--文章开始-->
    <div class="article_box" style="padding: 25px;">
      <!--左侧友链列表开始-->
      <div class="row">
      <div class="col-md-8">
        <div class="article_sebox" style="padding: 20px;">
          <section class="links-main">
           <?php foreach($link_list as $val){ ?>
              <div class="item">
              <div class="link-bg bg" style="background-image: url(<?php echo $val['img'];?>);">
                <div class="link-avatar">
                  <img alt='' src='<?php echo $val['img'];?>' class='avatar avatar-80 photo' height='60' width='60' />
                </div>
              </div>
            <div class="meta button">
              <a class="button_a" href="<?php echo $val['website'];?>" target="_blank">查看主页</a>
            </div>
              <div class="info">
                <h3 class="name" style="margin-top: -13px;margin-bottom:5px;"><?php echo $val['webname'];?></h3>
                <div class="description">以此热爱 以此不忘初衷</div>
              </div>
            </div>
          <?php } ?>
          </section>
      </div>
      <!--左侧友链列表结束-->
      </div>

      <!--右侧友链申请开始-->
      <div class="col-md-4" >
        <div class="article_sebox" style="padding: 35px;">

          <div id="link_btn" data-toggle="modal" data-target="#myModal">友链申请</div>
          <hr>
          君子敬而无失，与人恭而有礼，四海之内皆兄弟也！
          <hr>
         

          <div style="display:block;font-size: 14px;color:#555;">
          <h4>友链申请说明</h4>
          申请友链的同时，需要添加本站友链。
          博客内容健康，定时更新，个人博客优先。<br>
          <br>
          <h4>本站链接</h4>
          博客名称：胡新春博客<br>
          联系邮箱：hi@huxinchun.com<br>
          博客网址：http:huxinchun.com<br>
          博客头像：http://huxinchun.com/logo.jpg<br>
          博客介绍：微笑向阳,无畏悲伤<br>
          </div>
          <hr>

          <div style="text-align: center;color: #777;">等待审核的友链.....</div>
          <hr>
          <?php foreach($wait_list as $val){ ?>
            <div class="link_b">    
               <?php echo $val['webname'];?>
            </div>
          <?php } ?>
  

          </div>
   
        </div>
      </div>
      <!--右侧友链申请结束-->
      
        </div>

       <!--评论-->
        <div class="article_comment">
            <!--留言-->
            <div class="col-md-12 message_box">
                <div class="message_style" style="height:auto;padding:35px;" >
                <h4>点评一下</h4>
             
                </div>
            </div>
        </div>

        </div>

       
    </div>
</div>

<!--主体内容框结束-->



<!--弹出框友链提交-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
    <div class="modal-dialog" role="document">  
        <div class="modal-content">  
            <div class="modal-header">  
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                    <span aria-hidden="true">×</span>  
                </button>  
                <h4 class="modal-title" id="myModalLabel">友链提交</h4>  
            </div>  
            <div class="modal-body">  
            <!--友链表单开始-->
            <form method = "post" action = "<?php echo site_url('Home/send_links');?>" id = "send_links" class="form-horizontal">
            <div class="form-group">
                <!--昵称-->
                <div class="group">
                    <label class="col-sm-2 control-label">站名:</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="昵称(必填)" class="form-control" name="webname" />
                    </div>
                </div> 

                <div class="group">
                  <label class="col-sm-2 control-label">网址:</label>
                  <div class="col-sm-5">
                      <input type="text" name = "website" placeholder="例，http://www.huxinchun.com" class="form-control"/>
                  </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱:</label>
                <div class="col-sm-5">
                    <input type="text" placeholder="(选填)" class="form-control" name="email" />
                    <span style="font-size: 10px;color: #aaa;">用于获取邮箱头像</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">头像:</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="(选填)头像地址" class="form-control" name="touxiang" />
                </div>
            </div>
             <div class="modal-footer">
                <button type="submit" id = "send_links" class="btn btn-info">提交</button>  
                <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>     
            </div>  
           </form>
          <!--友链表单结束-->

            </div>  
        </div>  
    </div>  
</div>  

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  


<!--格式验证-->
<link rel="stylesheet" href="<?php echo base_url();?>public/yanzheng/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?php echo base_url();?>public/yanzheng/vendor/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/yanzheng/dist/js/bootstrapValidator.js"></script>

<script type="text/javascript">
    $('#send_links').bootstrapValidator({
        message: '请输入有效信息',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        //group: '.form-group',
        fields: {
            webname: {
                group: '.group',
                validators: {
                    notEmpty: {
                        message: '昵称不能为空！'
                    }
                }
            },
            website: {
                group: '.group',
                validators: {
                    notEmpty: {
                        message: '网址不能为空！'
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
        }
    });

</script>