<?php 
	$content = $this->content;
	
	$content = preg_replace('/<a(.*?)>/s','<a ${1} data-pjax>',$content);
    $content = preg_replace('/<table(.*?)>/s','<table class="table table-striped table-hover table-bordered">',$content);
	$content = preg_replace('/<pre><code>/s','<pre><code class="language-html">',$content);
	$content = preg_replace('/<img(.*?)src="(.*?)"(.*?)alt="(.*?)"(.*?)>/s','<a data-fancybox="gallery" href="${2}" class="gallery-link"><img${1}src="${2}"${3}></a><span class="post-img-alt">${4}</span>',$content); 
	
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
    
	//解析按钮
	$reg = '/\[btn url="(.*?)" type="(.*?)" ico="(.*?)"\](.*?)\[\/btn\]/s';
    $rp = '<a href="${1}" class="btn btn-${2}" target="_blank"><i class="${3}"></i> ${4}</a>';
    $content = preg_replace($reg,$rp,$content);
	
	//解析嵌入块
	$reg = '/\[well\](.*?)\[\/well\]/s';
    $rp = '<div class="well">${1}</div>';
    $content = preg_replace($reg,$rp,$content);

	//解析面板
	  //无参数面板
	  $reg = '/\[panel\](.*?)\[\/panel\]/s';
      $rp = '<div class="panel panel-default"><Div class="panel-body">${1}</div></div>';
      $content = preg_replace($reg,$rp,$content);
	  //有标题的面板
	  $reg = '/\[panel title="(.*?)"\](.*?)\[\/panel\]/s';
      $rp = '<div class="panel panel-default"><div class="panel-heading">${1}</div><Div class="panel-body">${2}</div></div>';
      $content = preg_replace($reg,$rp,$content);
	
  echo $content;
?>