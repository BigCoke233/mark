<?php
/**
 * Mark-那永不消逝的痕迹
 * 
 * @package Mark
 * @author BigCoke
 * @version 2.0.0
 * @link http://cokewithice.com
 */
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

  <main class="container" id="pjax-container"><div class="row">

	<!-- 主体 -->
	<div class="col-md-8">
	  <?php if ($this->is('index')): ?>
	  <!-- 公告 -->
	  <div class="item news">
	    <i class="fa fa-volume-up"></i> <?php $this->options->news(); ?>
	  </div>
	  <br />
	  <?php endif; ?>
	  <!-- archive -->
	  <?php if ($this->is('archive')): ?>
	  <div class="item">
	  	<?php $this->archiveTitle(array(
        'category'=>_t('分类 %s 下的文章'),
        'search'=>_t('包含关键字 %s 的文章'),
        'tag' =>_t('标签 %s 下的文章'),
        'author'=>_t('%s 的主页')
        ), '', ''); ?>
	  <?php if ($this->have()): ?>
      <?php else: ?>
        <h2>居然没有找到相关内容Σ(⊙▽⊙"a</h2>
      <?php endif; ?>
	  </div>
      <br />
      <?php endif; ?>
	  <!-- 文章列表 -->
	  <?php while($this->next()): ?>
        <?php $this->need('includes/post-item.php'); ?>
	  <?php endwhile; ?>
	  
	  <div class="pagenav"><?php $this->pageNav('<i class="glyphicon glyphicon-hand-left"></i>', '<i class="glyphicon glyphicon-hand-right"></i>',4, '...'); ?></div>
	</div>
	
	<!-- 侧边栏 -->
	<div class="col-md-4">
	  <?php $this->need('includes/sidebar.php'); ?>
	</div>
	
    <?php $this->need('includes/toolbar.php'); ?>
  </div></main>


<?php $this->need('includes/footer.php'); ?>