<?php $this->need('includes/head.php'); ?>
<?php $this->need('includes/header.php'); ?>

  <main class="container" id="pjax-container"><div class="row">

	<!-- 主体 -->
	<div class="col-md-8">
	  <!-- 面包屑 -->
	  <div class="item post-bread">
	    <i class="glyphicon glyphicon-folder-close"></i> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> / <?php $this->category('', true, '无分类'); ?> / <?php $this->title() ?>
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
		    <h2><?php $this->title() ?></h2>
			<span>
			  <i class="glyphicon glyphicon-time"></i> <?php $this->date('Y-m-d'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
			  <i class="glyphicon glyphicon-bookmark"></i> <?php $this->category(',', true, '木有分类'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
			  <i class="glyphicon glyphicon-comment"></i> <?php $this->commentsNum('%d'); ?>
			</span>
          </div>
		
		<hr />
		
		<div class="post-content">
          <?php $this->need('post/post-content.php'); ?>
		</div>
		
        <br />

		<div class="post-footer">
		<hr class="item-hr" />
		<Span class="social-icon-group" align="right">
		  <a class="social-share icon-google" target="_blank" href="https://plus.google.com/share?url=<?php $this->permalink() ?>" title="分享至Google Plus"><i class="fa fa-google"></i></a>
          <a class="social-share icon-qzone"  target="_blank" href="https://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&summary=<?php $this->excerpt(100); ?>&pics=<?php $this->fields->banner(); ?>" title="分享至QQ好友"><i class="fa fa-qq"></i></a>
          <a class="social-share icon-weibo"  target="_blank" href="http://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>/&appkey=<?php $this->options->title(); ?>/&title=<?php $this->title() ?>&pic=<?php $this->fields->banner(); ?>" title="分享至新浪微博"><i class="fa fa-weibo"></i></a>
          <a class="social-share icon-twitter"  target="_blank" href="https://twitter.com/intent/tweet?text=<?php $this->excerpt(100); ?>&amp;url=<?php $this->permalink() ?>&amp;via=<?php $this->options->SiteUrl(); ?>"><i class="fa fa-twitter" title="分享至Twitter"></i></a> 
		</span>
        <hr class="item-hr" />
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