<?php 

	$content = $this->content;
	
    $content = preg_replace('/<table(.*?)>/s','<table class="table table-striped table-hover">',$content);
	$content = preg_replace('/<pre><code>/s','<pre><code class="language-html">',$content);
	$content = preg_replace('/<img(.*?)src="(.*?)"(.*?)>/s','<a data-fancybox="gallery" href="${2}"><img${1}src="${2}"${3}></a>',$content); 
	
	//短代码（无参数）
	$reg = '/\[scode\](.*?)\[\/scode\]/s';
    $rp = '<div class="tip">${1}</div>';
    $content = preg_replace($reg,$rp,$content);
	
    //短代码（有参数）
	$reg = '/\[scode.*?type="(.*?)"\](.*?)\[\/scode\]/s';
    $rp = '<div class="tip ${1}">${2}</div>';
    $content = preg_replace($reg,$rp,$content);
		
	//font文字排版
	  //无参数时，自动解析为红色
	  $reg = '/\[font\](.*?)\[\/font\]/s';
      $rg = '<span style="color:red;">${1}</span>';
      $content = preg_replace($reg,$rp,$content);
	  
	  //解析只有color参数的font
	  $reg = '/\[font color="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '<span style="color:${1}">${2}</span>';
      $content = preg_replace($reg,$rp,$content);
	  
	  //解析只有bg参数的font
	  $reg = '/\[font bg="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '<span style="background-color:${1}">${2}</span>';
      $content = preg_replace($reg,$rp,$content);
	
	  //解析只有size参数的font
	  $reg = '/\[font size="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '<span style="font-size:${1}">${2}</span>';
      $content = preg_replace($reg,$rp,$content);
	
	  //解析只有style参数的font
	  $reg = '/\[font style="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '<span style="${1}">${2}</span>';
      $content = preg_replace($reg,$rp,$content);
	  
	//滚动文本区域
	$reg = '/\[stext\](.*?)\[\/stext\]/s';
    $rp = '<div class="post-stext">${1}</div>';
    $content = preg_replace($reg,$rp,$content);

  echo $content;
?>