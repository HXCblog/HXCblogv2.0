<style type="text/css">
#msgBox{width:100%;background:#fff;border-radius:4px;margin:10px auto;padding-top:10px;margin-top: -50px;}
#msgBox form h2{font-weight:400;font:400 18px/1.5 \5fae\8f6f\96c5\9ed1;}
#msgBox form{background:url(./public/img/boxBG.jpg) repeat-x 0 bottom;padding:20px 30px;}
#userName,#conBox{color:#777;border:1px solid #d0d0d0;border-radius:4px;background:#fff url(./public/img/inputBG.png) repeat-x;padding:3px 5px;font:14px/1.5 arial;}
#userName.active,#conBox.active{border:1px solid #7abb2c;}
#userName{height:38px;}
#conBox{width:100%;resize:none;min-height:140px;overflow:auto;}
#msgBox form div{position:relative;color:#999;margin-top:10px;}
#msgBox img{border-radius:3px;}
#face{position:absolute;top:0;left:172px;}
#face img{width:38px;height:38px;margin-left: 15px; cursor:pointer;margin-right:6px;opacity:0.5;filter:alpha(opacity=50);}
#face img.hover,#face img.current{width:38px;height:38px;border:1px solid #028074;opacity:1;filter:alpha(opacity=100);}
#sendBtn{border:0;width:112px;height:30px;cursor:pointer;margin-left:10px;background:url(./public/img/btn.png) no-repeat;}
#sendBtn.hover{background-position:0 -30px;}
#msgBox form .maxNum{font:26px/30px Georgia, Tahoma, Arial;padding:0 5px;}
#msgBox .list{padding:30px;}
#msgBox .list h3{position:relative;height:33px;font-size:14px;font-weight:400;background:#e3eaec;border:1px solid #dee4e7;}
#msgBox .list h3 span{position:absolute;left:6px;top:6px;background:#fff;line-height:38px;display:inline-block;padding:0 15px;}
#msgBox .list ul{overflow:hidden;zoom:1;}
#msgBox .list ul li{float:left;clear:both;width:100%;border-bottom:1px dashed #d8d8d8;padding:10px 0;background:#fff;overflow:hidden;}
#msgBox .list ul li.hover{background:#f5f5f5;}
#msgBox .list .userPic{float:left;width:50px;height:50px;display:inline;margin-left:10px;border:1px solid #ccc;border-radius:3px;}
#msgBox .list .content_box{float:left;width:600px;font-size:14px;margin-left:10px;font-family:arial;word-wrap:break-word;}
#msgBox .list .userName{display:inline;padding-right:5px;}
#msgBox .list .userName a{color:#2b4a78;}
#msgBox .list .msgInfo{display:inline;word-wrap:break-word;}
#msgBox .list .times{color:#889db6;font:12px/18px arial;margin-top:5px;overflow:hidden;zoom:1;}
#msgBox .list .times span{float:left;}
#msgBox .list .times a{float:right;color:#889db6;display:none;}
.tr{overflow:hidden;zoom:1;}
.tr p{float:right;line-height:30px;}
.tr *{float:left;}
.inputbox{
  width: 230px;
  height:62px;
  margin:0px;
  float: left;
  margin-right:10px;
  display: inline-block;
}
button{
  color: #fff;
  font-size: 16px;
  padding: 4px 25px;
  background: #009688;
  border-radius: 3px;
  border:1px solid #ddd;
  cursor: pointer;
}
button:hover{
  background: #038478;
}
/*头像*/
.touxiang{
  width: 50px;height: 50px;background: #fff;display: inline-block;text-align: center;float: left;margin:0px 10px;
}
.touxiang img{width: 50px;height: 50px;}
.yan-text{
  height: 38px;border:1px solid #d0d0d0;border-radius: 4px;font-size: 14px;padding: 3px 5px;
}
.userPic img{width: 50px;height: 50px;}

</style>
<!--表单验证-->
<script type="text/javascript">
function check(){
   var name = document.getElementById("userName").value;
   if(name ==  null || name == ''){
        alert("昵称或站名不能为空");
       return false;
  }
   var content = document.getElementById("conBox").value;
    if(content ==  null || content == ''){
        alert("内容不能为空！");
       return false;
  }
   var checknum = document.getElementById("checknum").value;
    if(checknum ==  null || checknum == ''){
        alert("验证码不能为空！");
       return false;
  }
  return true;
 }
</script>

<!--banner开始-->
<div class="banner" style="text-align:center;overflow:hidden;">
  <img  src="<?php echo base_url();?>public/style/img/listbg3.jpg">
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
 
      <!--留言块开始-->
      <div id="msgBox">
         <form method = "post" action = "<?php echo site_url('Liuyan/check');?>" onsubmit="return check()">
              <h2>啊啊啊！！！不要问我在干什么。。 我已经疯了！！！</h2>
            
                <!--选择头像-->
                <div style="height: 80px;width: 100%; text-align: left;float: left;">

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/1.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/1.jpg" checked /></label>
                  </div>

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/2.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/2.jpg" /></label>
                  </div>

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/3.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/3.jpg" /></label>
                  </div>

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/4.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/4.jpg" /></label>
                  </div>

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/5.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/5.jpg" /></label>
                  </div>

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/6.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/6.jpg" /></label>
                  </div>

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/7.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/7.jpg" /></label>
                  </div>

                  <div class="touxiang">
                    <img src="<?php echo base_url();?>/public/tanmu/tanimg/8.jpg" class="current" />
                    <label><input name="imgul" type="radio" value="<?php echo base_url();?>/public/tanmu/tanimg/8.jpg" /></label>
                  </div>


                </div>

                <!--验证吗框-->
                <div style="height: 60px;width: 100%; float: left;">
                
                <div class="inputbox" style="width: 215px;">
                  <input id="userName" placeholder="昵称或站名(必填)" autocomplete="off"  type="text" class="f-text" name="name" />
                 </div>
                <div class="inputbox" style="width: 140px;">
                  <!--显示验证码-->
                  <?php echo $yzm; ?>
                </div>

                <div class="inputbox" style="width: 200px;">
                 <!--验证码输入框 -->
                  <input id="checknum" placeholder="验证码(必填)" autocomplete="off"  type="text" class="yan-text" name="checknum"/>
                </div>

                <div class="inputbox">
                  <!--错误提示框-->
                  <?php echo $login_error; ?> 
                  <?php echo form_error('checknum','<p class="help-inline text-danger">','</p>');?>
                </div>

                </div>

                
                   
          <!--留言内容-->
            <textarea placeholder="留言内容不为空" id="conBox" class="f-text" name="content" type="text" ></textarea>

          <!--提交按钮-->
              <div class="tr">
                  <p>
                      <span class="countTxt">啊啊啊啊！请勿打广告，谢谢，谢谢！&nbsp;&nbsp;</span>
                     <button type = "submit" >点击留言</button>
                  </p>
              </div>
          </form>

          <!--留言展示区开始-->
          <div class="list" style="margin-top:-50px;">
              <h3><span>留言吐槽</span></h3>
              <ul>
                <?php foreach($liuyan as $val){  ?>  
                  <li>
                      <div class="userPic"><img src="<?php echo $val['img'];?>" /></div>
                      <!--内容-->
                      <div class="content_box">
                          <div class="userName"><a href="javascript:;"><?php echo $val['name'];?></a>:</div>
                          <div class="msgInfo"><?php echo $val['info'];?></div>
                          <div class="times"><span><?php echo  $val['time']; ?></span><a class="del" href="javascript:;">删除</a></div>
                      </div>

                  </li>
                  <?php  } ?> 
              </ul>
          </div>
          <!--留言展示区结束-->

      </div>

      </div>
    
    </div>
</div>
<!--主体内容框结束-->

<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/tanmu/dist/css/barrager.css">
<script type="text/javascript" src="<?php echo base_url();?>/public/tanmu/dist/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/public/tanmu/dist/js/jquery.barrager.min.js"></script>
<script type="text/javascript">
$.ajaxSettings.async = false;
$.getJSON('http://www.huxinchun.com/api/liuyan',function(data){

//每条弹幕发送间隔
var looper_time=10*1000;
var items=data;
//弹幕总数
var total=data.length;
//是否首次执行
var run_once=true;
//弹幕索引
var index=0;
//先执行一次
barrager();
function  barrager(){
 
  if(run_once){
      //如果是首次执行,则设置一个定时器,并且把首次执行置为false
      looper=setInterval(barrager,looper_time);                
      run_once=false;
  }
  //发布一个弹幕
  $('body').barrager(items[index]);
  //索引自增
  index++;
  //所有弹幕发布完毕，清除计时器。
  if(index == total){
      clearInterval(looper);
      return false;
  }

this.mm=function(){
		 clearInterval(looper);
     		 return false;
 	}

}

});

</script>
-->