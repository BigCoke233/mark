  <!-- 右侧工具栏 -->
  <Div class="footer-tools mobile-none">
	<?php if ($this->is('post') || $this->is('page')): ?>
	<a href="#comments"><i class="fa fa-comments"></i></a>
	<?php endif; ?>
    <a href="#top"><i class="fa fa-arrow-up"></i></a>
  </div>
  
  <!-- 部分js -->
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/id-transition.js'); ?>"></script>