
  <!-- 页脚信息 -->
  <footer class="footer-info">
    <div class="container">
	  <div class="row">
	    <div class="col-md-5 mobile-none">
	      <h3>最新访客</h3>
		  	<div class="newest-comment">
	          <?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true')->to($comments); ?>
	          <?php while($comments->next()): ?>
              <a href="<?php $comments->permalink(); ?>" data-pjax><?php $comments->gravatar(200); ?></a>
              <?php endwhile; ?>
	        </div>
	    </div>
	  
	    <div class="col-md-7 site-info">
		  <h3>站点信息</h3>
		  <p>小站已萌萌哒运行:<span id="htmer_time"></span>，感谢陪伴</p>
		  <p id="hitokoto">正在玩命获取一言毒鸡汤(￣(∞)￣)</p>
		  <p>
		    Powered by <a href="http://typecho.org">Typecho</a> | Theme <a href="https://github.com/BigCoke233/mark">Mark</a> by BigCoke with <i class="fa fa-heart" style="color:red"></i>
		    <br />Copyright &copy; <?php echo date('Y') ?> <A href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
		  </p>
	    </div>
	  </div>
	</div>
  </footer>

  
  
  <!-- js -->
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/nav.js'); ?>"></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/jquery.fancybox.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/owo.js'); ?>"></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/prism.js'); ?>" data-no-instant></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/pjax/jquery.pjax.js'); ?>"></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/nprogress.js'); ?>"></script>
  
  <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
  
  <?php if($this->options->pjax && $this->options->pjax!=0) :?>

  <!-- pjax -->
  <script>
  //pjax load
  $(document).pjax(
    '[data-pjax]',
	'#pjax-container', 
	{
		timeout:8000,
        container: '#pjax-container',
        fragment: '#pjax-container',
	}
  );
  $(document).on('pjax:send',
    function() {
	  (function smoothscroll(){
    var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
    if (currentScroll > 0) {
         window.requestAnimationFrame(smoothscroll);
         window.scrollTo (0,currentScroll - (currentScroll/5));
    }
    })();
      $('#pjax-container').addClass("pjax-loading");
	  NProgress.start();
  })
  $(document).on('pjax:complete',
  function() {
      $('#pjax-container').removeClass("pjax-loading");
	  NProgress.done();
	   if (typeof Prism !== 'undefined') {
       Prism.highlightAll(true,null);}
	   <?php $this->options->pjax_reload(); ?>
  });
  </script>

  <?php endif; ?>
  <script>
  //prism highlight-code load
$(document).ready(function(){
    var doc_pre = $(".post-content pre");
    doc_pre.each(function(){
        var class_val = $(this).attr('class');
        var class_arr = new Array();
        class_arr = class_val.split(';');
        class_arr = class_arr['0'].split(':');
        var lan_class = 'language-'+class_arr['1'];
        var pre_content = '<code class="'+lan_class+'">'+$(this).html()+'</code>';
        $(this).html(pre_content);
        $(this).attr("class",'line-numbers '+lan_class);
    });
});
  //site creat time
    function secondToDate(second) {
        if (!second) {
            return 0;
        }
        var time = new Array(0, 0, 0, 0, 0);
        if (second >= 365 * 24 * 3600) {
            time[0] = parseInt(second / (365 * 24 * 3600));
            second %= 365 * 24 * 3600;
        }
        if (second >= 24 * 3600) {
            time[1] = parseInt(second / (24 * 3600));
            second %= 24 * 3600;
        }
        if (second >= 3600) {
            time[2] = parseInt(second / 3600);
            second %= 3600;
        }
        if (second >= 60) {
            time[3] = parseInt(second / 60);
            second %= 60;
        }
        if (second > 0) {
            time[4] = second;
        }
        return time;
    }
    function setTime() {
        var create_time = Math.round(new Date(Date.UTC(2018, 11, 01, 0, 0, 6)).getTime() / 1000);
        var timestamp = Math.round((new Date().getTime() + 8 * 60 * 60 * 1000) / 1000);
        currentTime = secondToDate((timestamp - create_time));
        currentTimeHtml = currentTime[0] + '年' + currentTime[1] + '天'
                + currentTime[2] + '时' + currentTime[3] + '分' + currentTime[4]
                + '秒';
        document.getElementById("htmer_time").innerHTML = currentTimeHtml;
    }    setInterval(setTime, 1000);
	</script>
	
    <?php $this->footer(); ?>
  </body>
</html>