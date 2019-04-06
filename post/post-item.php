<?php if($this->is('post') || $this->fields->type=='1' ): ?>
<!-- 说说 -->
  <?php if ($this->is('index')): ?>
	<div class="post-item item">
	    <div class="post-content saying-content">
		<h3><?php $this->author() ?>说：</h3>
          <?php $this->need('post/post-content.php'); ?>
		</div>
		  <hr />
		  <div class="row saying-info">
		    <div class="col-md-1 col-xs-2 saying-avatar">
			  <?php $this->author->gravatar(50) ?>
			</div>
		    <div class="col-md-11 col-xs-10">
			  <h4 class="saying-title"><a href="<?php $this->permalink() ?>"><?php $this->title(); ?></a></h4>
	          <div class="saying-info"><?php $this->date('F j, Y'); ?></div>
			  
			  <a href="<?php $this->permalink() ?>" class="read-more pull-right btn btn-default">前往吐槽</a>
			</div>
		  </div>
	  </div>

	  <br />
  <?php endif; ?>
<!-- 小板式文章 -->
<?php elseif($this->fields->type=='2'): ?>
  <a href="<?php $this->permalink() ?>" class="post-link">
    <div class="item post-item">
	  <div class="row">
	    <div style="height:160px;background:url('<?php $this->fields->banner(); ?>');background-repeat:no-repeat;background-size:cover" class="col-md-3 col-xs-5 post-banner-sm"></div>
		<div class="col-md-9 col-xs-7" style="margin-top:-20px;">
		  <h3><?php $this->sticky(); $this->title() ?></h3>
		  <p class="excerpt">
           <?php $this->need('post/post-excerpt.php'); ?>
	       <?php echo $this->excerpt(50); ?>
		   <br />
	      </p>
		  <hr class="mobile-none" />
		  <div class="post-info mobile-none"><span class="glyphicon glyphicon-th-large"></span> <?php $this->category(',', true, '木有分类'); ?> &nbsp;| &nbsp;<span class="glyphicon glyphicon-calendar"></span> <?php $this->date('F j, Y'); ?> &nbsp;| &nbsp;<Span class="glyphicon glyphicon-comment"></span> <?php $this->commentsNum('%d Comments'); ?></div>

		</div>
	  </div>
	</div>
  </a>
  <br />
<?php else: ?>
<!-- 普通文章 -->
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
	    <?php $this->need('post/post-excerpt.php'); ?>
		<?php echo $this->excerpt(100); ?>
	  </p>

	  <hr />
	  

	  <div class="post-info"><span class="glyphicon glyphicon-th-large"></span> <?php $this->category(',', true, '木有分类'); ?> &nbsp;| &nbsp;<span class="glyphicon glyphicon-calendar"></span> <?php $this->date('F j, Y'); ?> &nbsp;| &nbsp;<Span class="glyphicon glyphicon-comment"></span> <?php $this->commentsNum('%d Comments'); ?></div>
	  <br />
	</div>
  </a>
<br />

<?php endif; ?>
