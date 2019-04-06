<?php 
	//短代码（无参数）
	$reg = '/\[scode\](.*?)\[\/scode\]/s';
    $rp = '${1}';
    $post_excerpt = preg_replace($reg,$rp,$this->excerpt);
	
    //短代码（有参数）
	$reg = '/\[scode.*?type="(.*?)"\](.*?)\[\/scode\]/s';
    $rp = '${2}';
    $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
		
	//font文字排版
	  //无参数时，自动解析为红色
	  $reg = '/\[font\](.*?)\[\/font\]/s';
      $rg = '${1}';
      $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
	  
	  //解析只有color参数的font
	  $reg = '/\[font color="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '${2}';
      $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
	  
	  //解析只有bg参数的font
	  $reg = '/\[font bg="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '${2}';
      $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
	
	  //解析只有size参数的font
	  $reg = '/\[font size="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '${2}';
      $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
	
	  //解析只有style参数的font
	  $reg = '/\[font style="(.*?)"\](.*?)\[\/font\]/s';
      $rp = '${2}';
      $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
	  
	//滚动文本区域
	$reg = '/\[stext\](.*?)\[\/stext\]/s';
    $rp = '${1}';
    $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
    
	//解析按钮
	$reg = '/\[btn url="(.*?)" type="(.*?)" ico="(.*?)"\](.*?)\[\/btn\]/s';
    $rp = '${4}';
    $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
	
	//解析嵌入块
	$reg = '/\[well\](.*?)\[\/well\]/s';
    $rp = '${1}';
    $this->excerpt = preg_replace($reg,$rp,$this->excerpt);

	//解析面板
	  //无参数面板
	  $reg = '/\[panel\](.*?)\[\/panel\]/s';
      $rp = '${1}';
      $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
	  //有标题的面板
	  $reg = '/\[panel title="(.*?)"\](.*?)\[\/panel\]/s';
      $rp = '${1} ${2}';
      $this->excerpt = preg_replace($reg,$rp,$this->excerpt);
?>