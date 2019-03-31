<!DOCTYPE html>
<html lang="zh-CN">
  <!-- 头部信息 -->
  <head>
    <!-- 页面信息 -->
    <meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	
	<?php if ($this->is('index')): ?>
    <meta name="description" content="<?php $this->options->description(); ?>" />
    <meta name="keywords" content="<?php $this->options->keywords(); ?>" />
    <meta name="author" content="<?php $this->options->author(); ?>" />
    <?php endif; ?>
    <?php if($this->is('post')||$this->is('page')): ?>
    <meta name="description" content="<?php $this->excerpt(300); ?>" />
    <meta name="keywords" content="<?php $this->options->keywords(); ?>,<?php $this->tags(', ', false, 'none'); ?>" />
    <meta name="author" content="<?php $this->options->author(); ?>" />
    <meta property="og:image" content="<?php $this->fields->banner(); ?>" />
    <meta property="og:release_date" content="<?php $this->date('Y-m-j'); ?>" />
    <meta property="og:title" content="<?php $this->title(); ?>" />
    <meta property="og:description" content="<?php $this->description(); ?>" />
    <meta property="og:author" content="<?php $this->author(); ?>" />
    <?php endif; ?>
	
    <!-- 定义title -->
    <title>
    <?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 | '; ?>
	  <?php $this->archiveTitle(array(
        'category'=>_t('分类 %s 下的文章'),
        'search'=>_t('包含关键字 %s 的文章'),
        'tag' =>_t('标签 %s 下的文章'),
        'author'=>_t('%s 的主页')
        ), '', ' | '); ?>
      <?php $this->options->title(); ?>
	<?php if($this->is('index')||$this->is('front')): ?>
    <?php endif; ?>
    </title> 
	
	<!-- css -->
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/bootstrap/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/mark.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/jquery.fancybox.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/button.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/prism.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/owo.min.css'); ?>" />
  
    <!-- 部分js -->
	<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php $this->options->themeUrl('assets/pjax/jquery.pjax.js'); ?>"></script>
  
    <!-- 部分css -->
	<style>
	@media screen and (max-width: 600px) {
      .mobile-none {
          display:none;
      }
	  .mobile-block{
		  display:block!important;
	  }
	  .mobile-center{
		  text-align:Center;
	  }
	  #nav{
		  padding:0!important;
	  }
	  .nav-content,.nav-content ul>li{
          float:left!important
	  }
	  .nav-content{
		  font-size:12px;
		  margin-top:-5px;
		  margin-bottom:-8px;
		  text-align:Center;
	  }
	  .nav-content li{
		  display:inline;
	  }
	  .nav-content i{
		  display:none;
	  }
    }
	<?php if($this->options->bg_url && $this->options->bg_url!='') :?>
	body{
		background-image:url(<?php $this->options->bg_url() ?>);
		background-size:cover;
		background-repeat:no-repeat;
		background-attachment:fixed;
	}
	.item,#nav,.pagenav li,.page-navigator li,.comment-body{
		background:rgba(255,255,255,0.9)!important;
	}
	.footer-info{
		opacity:0.8;
	}
	.item{
    	box-shadow:0 0 8px #808080;
	    -webkit-box-shadow:0 0 8px #808080;
	}
	.list-group,.list-group li{
		background:rgba(255,255,255,0)
	}
	<?php endif; ?>
	</style>

    <!-- 其他头部信息 -->
    <?php $this->header(); ?>
	
    <!--
           ▄              ▄
          ▌▒█           ▄▀▒▌
          ▌▒▒▀▄        ▀▒▒▒▐
         ▐▄▀▒▒▀▀▀▀▄▄▄▀▒▒▒▒▒▐
       ▄▄▀▒▒▒▒▒▒▒▒▒▒▒█▒▒▄█▒▐
     ▄▀▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒█▒▒▒▒▒▐
    ▐▒▒▒▄▄▄▒▒▒▒▒▒▒▒▒▒▒▒▒▀▄▒▒▌
    ▌▒▒▐▄█▀▒▒▒▒▄▀█▄▒▒▒▒▒▒▒█▒▐
   ▐▒▒▒▒▒▒▒▒▒▒▒▌██▀▒▒▒▒▒▒▒▒▀▄▌
   ▌▒▀▄██▄▒▒▒▒▒▒▒▒▒▒▒░░░░▒▒▒▒▌
   ▌▀▐▄█▄█▌▄▒▀▒▒▒▒▒▒░░░░░░▒▒▒▐
  ▐▒▀▐▀▐▀▒▒▄▄▒▄▒▒▒  typecho  ▒▌
  ▐▒▒▒▀▀▄▄▒▒▒▄▒▒▒▒▒▒░░░░░░▒▒▒▐
   ▌▒▒▒▒▒▒▀▀▀▒▒▒▒▒▒▒▒░░░░▒▒▒▒▌
   ▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▐
    ▀ MARK~ ▒▒▒▒▒▒▒▒▒▒▒▄▒▒▒▒▌
      ▀▄▒▒▒▒▒▒▒▒▒▒▄▄▄▀▒▒▒▒▄▀
     ▐▀▒▀▄▄▄▄▄▄▀▀▀▒▒▒▒▒▄▄▀
    ▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▀▀
    --再看，再看就吃掉你！
    -->    
  </head>
  <body>