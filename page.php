<?php $this->need('includes/head.php'); ?>
<?php $this->need('includes/header.php'); ?>

  <main class="container" id="pjax-container"><div class="row">

	<!-- 主体 -->
	<div class="col-md-8">
	  <!-- 面包屑 -->
	  <div class="item post-bread">
	    <i class="glyphicon glyphicon-folder-close"></i> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> / <?php $this->title() ?>
	  </div>
	  <br />
	  <!-- 文章内容 -->
      
	  <article class="item">
	    <?php if($this->fields->banner && $this->fields->banner!='') :?>
		<div class="post-banner">
	      <div class="media-banner" style="background-position:center center;background:url(<?php $this->fields->banner(); ?>);background-repeat:no-repeat;background-size:cover;"></div>
		</div>
		<?php endif; ?>
		
		  <div class="post-header">
		    <h2><?php $this->title() ?></h4>
			<span>
			  <i class="glyphicon glyphicon-time"></i> <?php $this->date('Y-m-d'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
			  <i class="glyphicon glyphicon-bookmark"></i> <?php $this->category(',', true, '木有分类'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
			  <i class="glyphicon glyphicon-comment"></i> <?php $this->commentsNum('%d'); ?>
			</span>
          </div>
		
		<hr />
		
		<div class="post-content page-content">
          <?php $this->need('includes/post-content.php'); ?>
		</div>

	  </article>
	  
	  <?php $this->need('includes/comments.php'); ?>
	  <br />
	</div>
	
	<!-- 侧边栏 -->
	<div class="col-md-4">
	  <?php $this->need('includes/sidebar.php'); ?>
	</div>
	<?php $this->need('includes/toolbar.php'); ?>
  </div></main>


<?php $this->need('includes/footer.php'); ?>