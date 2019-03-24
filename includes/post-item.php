<?php if($this->is('post') || $this->fields->type=='1' ): ?>
<!-- 说说 -->
<?php if ($this->is('index')): ?>
	<div class="post-item item">
	  
	  <div class="row">
	      <div class="saying-info">
		    <div class="col-md-1 col-xs-2 saying-avatar">
	          <?php $this->author->gravatar(50); ?>
			</div>
			<div class="col-md-11 col-xs-10 saying-title-info">
		      <h4 class="saying-title"><a href="<?php $this->permalink() ?>" class="post-link"><?php $this->sticky(); $this->title() ?></a></h4>
		      <span><br /><i class="glyphicon glyphicon-send"></i> <?php $this->author() ?> 发布了一条说说：</span>
			</div>
		  </div>
	  </div>
	    <hr />
	    <div class="post-content saying-content">
	      <?php 
		  $content = preg_replace('/<img(.*?)src="(.*?)"(.*?)>/s','<a data-fancybox="gallery" href="${2}"><img${1}src="${2}"${3}></a>',$this->content); 
		  echo $content 
		  ?>
		</div>
		<a href="<?php $this->permalink() ?>" class="post-link">
		  <hr />
	      <div class="post-info"><span class="glyphicon glyphicon-th-large"></span> <?php $this->category(',', true, '木有分类'); ?> &nbsp;| &nbsp;<span class="glyphicon glyphicon-calendar"></span> <?php $this->date('F j, Y'); ?> &nbsp;| &nbsp;<Span class="glyphicon glyphicon-comment"></span> <?php $this->commentsNum('%d Comments'); ?></div>
	      <br />
		</a>
	  </div>
	  <br />
<?php endif; ?>
<?php else: ?>
<!-- 文章 -->
  <a href="<?php $this->permalink() ?>" class="post-link">
    <div class="item post-item">
	  <?php if ($this->is('index')): ?>
      <div class="post-banner">
        <?php if($this->fields->banner && $this->fields->banner!='') :?>
	      <div class="media-banner" style="background-position:center center;background:url(<?php $this->fields->banner(); ?>);background-repeat:no-repeat;background-size:cover;"></div>
        <?php endif; ?>
      </div>
	  <?php endif; ?>


      <h2 class="index-post-header"><?php $this->sticky(); $this->title() ?></h4>
      <p class="excerpt">
	       <?php $this->excerpt(100); ?>
	  </p>

	  <hr />
	
	  <div class="post-info"><span class="glyphicon glyphicon-th-large"></span> <?php $this->category(',', true, '木有分类'); ?> &nbsp;| &nbsp;<span class="glyphicon glyphicon-calendar"></span> <?php $this->date('F j, Y'); ?> &nbsp;| &nbsp;<Span class="glyphicon glyphicon-comment"></span> <?php $this->commentsNum('%d Comments'); ?></div>
	  <br />
	</div>
  </a>
<br />

<?php endif; ?>
