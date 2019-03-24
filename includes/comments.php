<br />
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments" class="responsesWrapper">

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond item">
	<br />
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="comment-form row" role="form">
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
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
	
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <div class="comment-list-wrap">
    <?php $comments->listComments(); ?>
    </div>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>
</div>