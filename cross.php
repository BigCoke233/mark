<?php
/**
 * 闲言碎语
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
		    <h2><?php $this->title() ?></h4>
			<span>
			  <i class="glyphicon glyphicon-time"></i> <?php $this->date('Y-m-d'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
			  <i class="glyphicon glyphicon-bookmark"></i> <?php $this->category(',', true, '木有分类'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
			  <i class="glyphicon glyphicon-comment"></i> <?php $this->commentsNum('%d'); ?>
			</span>
          </div>
		
		<hr />
<br />

<!-- 重新获取respondId -->
<script>
(function () {
    window.TypechoComment = {
        dom : function (id) {
            return document.getElementById(id);
        },
    
        create : function (tag, attr) {
            var el = document.createElement(tag);
        
            for (var key in attr) {
                el.setAttribute(key, attr[key]);
            }
        
            return el;
        },
        reply : function (cid, coid) {
            var comment = this.dom(cid), parent = comment.parentNode,
                response = this.dom('" . $this->respondId . "'), input = this.dom('comment-parent'),
                form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                textarea = response.getElementsByTagName('textarea')[0];
            if (null == input) {
                input = this.create('input', {
                    'type' : 'hidden',
                    'name' : 'parent',
                    'id'   : 'comment-parent'
                });
                form.appendChild(input);
            }
            input.setAttribute('value', coid);
            if (null == this.dom('comment-form-place-holder')) {
                var holder = this.create('div', {
                    'id' : 'comment-form-place-holder'
                });
                response.parentNode.insertBefore(holder, response);
            }
            comment.appendChild(response);
            this.dom('cancel-comment-reply-link').style.display = '';
            if (null != textarea && 'text' == textarea.name) {
                textarea.focus();
            }
            return false;
        },
        cancelReply : function () {
            var response = this.dom('{$this->respondId}'),
            holder = this.dom('comment-form-place-holder'), input = this.dom('comment-parent');
            if (null != input) {
                input.parentNode.removeChild(input);
            }
            if (null == holder) {
                return true;
            }
            this.dom('cancel-comment-reply-link').style.display = 'none';
            holder.parentNode.insertBefore(response, holder);
            return false;
        }
    };
})();
</script>

<!-- 输入表单 -->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if($this->user->hasLogin()): ?>
<div id="comments" class="responsesWrapper">
   <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond item">
	<br />
      <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="comment-form row" role="form">
    	<p class="comment-form-comment col-md-12">
          <textarea rows="8" cols="50" name="text" id="owo-textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
        </p>
			
		<?php $this->need('includes/owo.php'); ?>
		<p class="form-submit col-md-12">
          <button type="submit" class="submit btn btn-info " style="float:right;transition:all 0.5s;"><?php _e('提交评论'); ?></button>
        </p>
      </form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
<?php endif; ?>

    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <div class="comment-list-wrap page-diary">
    <?php $comments->listComments(); ?>
    </div>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php else: ?>
	<h3 style="text-algin:center;">这孩子连一篇动态都没有写哦~</h3>
    <?php endif; ?>
	  </article>

	</div>
	
	<!-- 侧边栏 -->
	<div class="col-md-4">
	  <?php $this->need('includes/sidebar.php'); ?>
	</div>
	<?php $this->need('includes/toolbar.php'); ?>
  </div></main>


<?php $this->need('includes/footer.php'); ?>