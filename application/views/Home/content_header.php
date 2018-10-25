<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="胡新春,个人博客,HXC,web前端,胡新春个人博客,web技术博文,javascript,html5,css3,layui,layui框架,前端工具导航,web框架大全,前端工具大全,前端目录,vue,node,jq"/> 
  <meta name="description" content="记录生活，分享技术，专注吹牛20年，程序员笔记。 "/>
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>HXC博客</title>
    <link href="<?php echo base_url();?>public/style/css/animate.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>public/style/bootstrap3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/style/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>public/style/css/banner.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!--主体部分开始-->

<!--导航开始-->
<div class="topnav" style="margin-top: -25px;">
  <div class="top_nav">
      <a href="<?php echo site_url('Home/index')?>">
        <span class="top_nav_first">
          <img src="<?php echo base_url();?>public/style/img/logo.png">
        </span>
      </a>
      <a href="<?php echo site_url('Home/index')?>">
        <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;首页</li>
      </a>
   
      <a href="<?php echo site_url('/Home/block/34')?>">
        <li><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;游戏/动漫</li>
      </a>
      <a href="<?php echo site_url('/Home/block/35')?>">
       <li><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;日记/生活</li>
      </a>

      <a href="<?php echo site_url('/Home/block/36')?>">
       <li><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;程序员式幽默</li>
      </a>
      <a href="<?php echo site_url('Home/words')?>">
       <li><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>&nbsp;闲言碎语</li>
      </a>

      <a href="<?php echo site_url('Home/version')?>">
       <li><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;博客大计事</li>
      </a>

      <a href="<?php echo site_url('Home/messages')?>">
       <li><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;留言板</li>
      </a>

    </div>
</div>
<!--导航结束-->

	