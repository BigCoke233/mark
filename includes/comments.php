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
<!-- 表单开始 -->
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments" class="responsesWrapper">
    <?php
    $parameter = array(
        'parentId'      => $this->hidden ? 0 : $this->cid,
        'parentContent' => $this->row,
        'respondId'     => $this->respondId,
        'commentPage'   => $this->request->filter('int')->commentPage,
        'allowComment'  => $this->allow('comment')
    );
    ?>
    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond item">
	<h3 style="margin-top:0">发射弹幕</h3>
	<hr class="item-hr" />
	    
    	<form style="margin-top:20px;" id="comment_form" method="post" action="<?php $this->commentUrl() ?>"  class="comment-form row" role="form">
		  <div class="comment-form-comment form-group">
    		<p class="comment-form-comment col-md-12">
                <textarea rows="8" cols="50" name="text" id="owo-textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
			
			<?php if($this->user->hasLogin()): ?>
    		<p style="margin-left:16px"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p class="comment-form-author col-md-4">
    			<input placeholder="留下你的大名" type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
    		</p>
    		<p class="comment-form-email col-md-4">
    			<input placeholder="输入正确的邮箱地址，会为你保密" type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p class="comment-form-url col-md-4">
    			<input placeholder="http(s)://" type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            <?php endif; ?>
			<?php $this->need('includes/owo.php'); ?>
			<p class="form-submit col-md-12">
                <button type="submit" class="submit btn btn-info " style="float:right;transition:all 0.5s;"><?php _e('提交评论'); ?></button>
            </p>
		  </div>
    	</form>
    </div>
	<br />
	
    <?php else: ?>
    <div class="item"><h3 class="comment-title"><?php _e('评论已关闭'); ?></h3></div>
    <?php endif; ?>
	
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>

	  <div class="item"><h3 style="margin-top:-4px;text-align:center;" class="comment-title"><?php $this->commentsNum('评论列表', '已有 1 条评论', '已有 <span class="num">%d</span> 条评论'); ?> (o゜▽゜)o☆</h3></div>
	  <div class="comment-list-wrap">
      <?php $comments->listComments(); ?>
	  </div>

    <?php $comments->pageNav('&laquo;', '&raquo;'); ?>
    
    <?php endif; ?>

</div>