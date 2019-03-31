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
		
		<div class="404">
		  <div class="row">
		    <Div class="col-md-4 col-xs-4 mobile-none"><img src="<?php $this->options->themeUrl('assets/images/404.png'); ?>"></div>
            <Div class="col-md-8 col-xs-8 mobile-center" style="margin-top:25px;">
			  <h1>卧槽，404！</h1>
			  <p>内个，你有看见我的康康吗？</p>
			  <a href="<?php $this->options->SiteUrl(); ?>" class="btn btn-default"><i class="fa fa-home"></i> 回到首页</a>
			</div>
		  </div>
		</div>

	  </article>

	  <br />
	</div>
	
	<!-- 侧边栏 -->
	<div class="col-md-4">
	  <?php $this->need('includes/sidebar.php'); ?>
	</div>
	<?php $this->need('includes/toolbar.php'); ?>
  </div></main>


<?php $this->need('includes/footer.php'); ?>