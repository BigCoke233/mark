<?php
/**
 * 归档页面
 *
 * @package custom
 */
 ?>
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
		    <h1 style="text-align:Center"><?php $this->title() ?></h1>
          </div>
		
		<hr />
		
		<div class="archive" style="font-size:16px;">
          <ul class="mdui-list">
           <?php
            $stat = Typecho_Widget::widget('Widget_Stat');
            $this->widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
            $year=0; $mon=0; $i=0; $j=0;
            while($archives->next()){
              $year_tmp = date('Y',$archives->created);
              $mon_tmp = date('m',$archives->created);
              $y=$year; $m=$mon;
              if ($year > $year_tmp || $mon > $mon_tmp) {
                $output .= '</ul>';
              }
              $output .= '<a href="'.$archives->permalink .'" data-pjax><li class="mdui-list-item mdui-ripple"><span style="color:gray">'. $year_tmp .' - '. $mon_tmp .'&nbsp;|&nbsp;</span>'. $archives->title .'<br /></li></a>';
            }
            $output .= '</ul>';
            echo $output;
           ?>
          </ul>
		</div>
	  </article>

	</div>
	
	<!-- 侧边栏 -->
	<div class="col-md-4">
	  <?php $this->need('includes/sidebar.php'); ?>
	</div>
	<?php $this->need('includes/toolbar.php'); ?>
  </div></main>


<?php $this->need('includes/footer.php'); ?>