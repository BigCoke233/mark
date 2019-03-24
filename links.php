<?php
/**
 * 友情链接
 *
 * @package custom
 */
$this->need('includes/head.php');
$this->need('includes/header.php'); ?>

  <main class="container" id="pjax-container"><div class="row">
    <!-- 主体 -->
    <div class="col-md-8">
	  <!-- 面包屑 -->
	  <div class="item post-bread">
	    <i class="glyphicon glyphicon-folder-close"></i> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> / <?php $this->title() ?>
	  </div>
	  <br />
	  
	  <article class="item">
		<div class="post-banner">
          <?php if($this->fields->banner && $this->fields->banner!='') :?>
	      <div class="media-banner" style="background-position:center center;background:url(<?php $this->fields->banner(); ?>);background-repeat:no-repeat;background-size:cover;"></div>
		  <?php else: ?>
		  <div class="media-banner" style="background-position:center center;background:url(<?php $this->fields->default_banner(); ?>);background-repeat:no-repeat;background-size:cover;"></div>
          <?php endif; ?>
		  <div class="post-header">
		    <h2><?php $this->title() ?></h4>
			<span>
			  <i class="glyphicon glyphicon-time"></i> <?php $this->date('Y-m-d'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
			  <i class="glyphicon glyphicon-comment"></i> <?php $this->commentsNum('%d'); ?>
			</span>
          </div>
        </div>
		  
		<div class="links-box">
		  <h2>友链墙</h2>
		  <div class="row">
		    <?php Links_Plugin::output("SHOW_MIX"); ?>
		  </div>
		</div>
		
		<hr />
		
		<div class="post-content">
	      <?php 
		  $content = preg_replace('/<img(.*?)src="(.*?)"(.*?)>/s','<a data-fancybox="gallery" href="${2}"><img${1}src="${2}"${3}></a>',$this->content); 
		  echo $content 
		  ?>
		</div>
	  </article>
	  
	  <?php $this->need('includes/comments.php'); ?>
	</div>
	
	<!-- 侧边栏 -->
	<div class="col-md-4">
	  <?php $this->need('includes/sidebar.php'); ?>
	</div>
	
    <?php $this->need('includes/toolbar.php'); ?>
  </div></main>

<?php $this->need('includes/footer.php'); ?>