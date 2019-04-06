<header>
  <div id="top"></div>
  <!-- 导航栏 -->
  <nav class="navbar navbar-default navbar-fixed-top" id="nav" <?php if($this->options->lgimg_url && $this->options->lgimg_url!='') :?>style="opacity:0.8"<?php endif; ?>>
    <Div class="container-fluid">
      <div class="nav-logo">
	    <span class="nav-logo-icon">
		  <i class="<?php $this->options->IndexIcon(); ?> mobile-none"></i> 
		</span>
	    <span class="nav-logo-indexname mobile-none">
		  <?php $this->options->IndexName(); ?>
		</span>
	  </div>
	
	  <div class="nav-content">
	    <ul class="nav navbar-nav">
		  <?php if($this->options->custom_nav && $this->options->custom_nav!='') :?>
		  <?php $this->options->custom_nav() ?>
		  <?php else: ?>
		    <?php $this->widget('Widget_Contents_Page_List')
            ->parse('<li><a href="{permalink}" data-pjax><i class="fa fa-paper-plane" aria-hidden="true"></i> {title}</a></li>'); ?>
		  <li><a data-pjax href="<?php $this->options->SiteUrl(); ?>"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
		  <?php endif; ?>
		</ul>
	  </div>
	</div>
  </nav>
  
  <!-- 首页大图 -->
  <?php if($this->options->lgimg_url && $this->options->lgimg_url!='') :?>
  <div class="jumbotron" style="margin-bottom:-80px;background:url('<?php $this->options->lgimg_url(); ?>');background-size:cover;background-repeat:no-repeat;">
    <h1><?php $this->options->IndexName(); ?></h1>
	<p><?php $this->options->IndexDecoration(); ?></p>
  </div>
  <?php endif; ?>
  

  <br />
  <br />
  <br />
  <br />
  <br />
  
  <!-- 能偷懒不写样式为什么不用br? -->
</header>