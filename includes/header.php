<header>
  <div id="top"></div>
  <!-- 导航栏 -->
  <nav class="navbar navbar-default navbar-fixed-top" id="nav">
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
            ->parse('<li><a href="{permalink}"><i class="fa fa-paper-plane" aria-hidden="true"></i> {title}</a></li>'); ?>
		  <li><a href="<?php $this->options->SiteUrl(); ?>"><i class="fa fa-home" aria-hidden="true"></i> 首页</a></li>
		  <?php endif; ?>
		</ul>
	  </div>
	</div>
  </nav>
  
  <br />
  <br />
  <br />
  <br />
  <br />
  <!-- 能偷懒不写样式为什么不用br? -->
</header>