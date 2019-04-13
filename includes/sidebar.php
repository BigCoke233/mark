<aside class="sidebar">
  <div class="item name-card">
    <div class="avatar-bg" style="background:url('<?php $this->options->themeUrl('assets/images/avatar-bg.jpg'); ?>')"></div>
    <a href="<?php $this->options->SiteUrl(); ?>"><img src="<?php $this->options->avatar(); ?>" class="sidebar-avatar"></a>
	<h3><?php $this->author(); ?></h3>

    <ul class="sidebar-catchme nav nav-pills nav-justified">
	  <?php if($this->options->github && $this->options->github!='') :?>
	  <li><a href="<?php $this->options->github() ?>"><i class="fa fa-github"></i></a></li>
	  <?php endif; ?>
	  
	  <?php if($this->options->QQ_num && $this->options->QQ_num!='') :?>
	  <li><a href="http://wpa.qq.com/msgrd?V=1&Uin=<?php $this->options->QQ_num() ?>&Site=ioshenmue&Menu=yes"><i class="fa fa-qq"></i></a></li>
	  <?php endif; ?>

	  <?php if($this->options->QQ_group && $this->options->QQ_group!='') :?>
	  <li><a href="<?php $this->options->QQ_group() ?>"><i class="fa fa-comments-o"></i></a></li>
	  <?php endif; ?>
	  
	  <?php $this->options->custom_social() ?>
    </ul>
  </div>
  
  <br />
  
  <Div class="item">
  <form method="post" action="">
    <div class="input-group">
      <input type="text" name="s" class="form-control" placeholder="搜点什么吧~">
      <span class="input-group-btn">
        <button class="btn btn-default sumbit" type="sumbit" data-pjax><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>
  </div>
  
  <br />
  
  <div class="item aside">
    <h4><i class="fa fa-send"></i> 博客信息</h4>
	<hr />
	<ul class="sidebar-info list-group">
	  <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
	  <li class="list-group-item">
	    <i class="fa fa-folder"></i> 分类数量
		<span class="badge"><?php $stat->categoriesNum() ?></span>
	  </li>
	  <li class="list-group-item">
	    <i class="fa fa-book" aria-hidden="true"></i> 写作数量
		<span class="badge"><?php echo $stat->publishedPagesNum + $stat->publishedPostsNum; ?></span>
	  </li>
	  <li class="list-group-item">
	    <i class="fa fa-comments-o" aria-hidden="true"></i> 文章评论
		<span class="badge"><?php $stat->publishedCommentsNum() ?></span>
	  </li>
	  <li class="list-group-item">
	    <i class="fa fa-cloud-upload" aria-hidden="true"></i> 最后更新
		<span class="badge"><?php echo date('Y-m-d' , $this->modified); ?></span>
	  </li>
	</ul>
  </div>
  
  <br />
  
  <div class="item aside">
    <h4><i class="fa fa-bookmark"></i> 便捷分类</h4>
	<hr />
	<ul class="sidebar-category list-group">
        <?php $this->widget('Widget_Metas_Category_List')
        ->parse('<li class="list-group-item"><a href="{permalink}" data-pjax>{name}</a><span class="badge">{count}</span></li>'); ?>
	</ul>
  </div>
  
  <br />
  
  <div class="item aside">
    <h4><i class="fa fa-heart"></i> 全站友链</h4>
	<hr />
	<ul class="sidebar-links list-group">
      <?php Links_Plugin::output("SHOW_TEXT", 0, "index"); ?>
	</ul>
  </div>
  
  <br />
  
  <div class="item aside tags-list">
    <h4><i class="fa fa-tags"></i> 热门标签</h4>
	<hr />
      <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
      <?php if($tags->have()): ?>
      <?php while ($tags->next()): ?>
      <a class="mdui-ripple" href="<?php $tags->permalink(); ?>" title="该标签下有 <?php $tags->count(); ?> 篇文章" data-pjax><?php $tags->name(); ?></a>
      <?php endwhile; ?>
      <?php else: ?>
      还没有任何标签哦~
      <?php endif; ?>
  </div>
</aside>