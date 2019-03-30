<?php
/*
* 自定义字段
* By BigCoke
*/
function themeFields($layout) {
    $banner = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL, _t('文章缩略图'), _t('填入一个图片url作为缩略图，显示在文章列表和文章页面顶部，不填写则没有缩略图'));
    $layout->addItem($banner);
	
	$type=new Typecho_Widget_Helper_Form_Element_Select('type',array('0'=>'一般文章','1'=>'说说','2'=>'小板式文章(New)'),'0','文章类型');
    $layout->addItem($type);
}

/*
* 主题设置
* By BigCoke
*/
function themeConfig($form) {
	
	echo "<link href=\"..\usr\\themes\Mark\assets\css\setting.css\" type=\"text/css\" rel=\"stylesheet\">";
	echo "<div class=\"typecho-option\"><div class=\"img-lg\"></div><h2 class=\"title\">Mark 2.0.0</h2><span class=\"alert\">感谢您使用Mark主题，若有什么疑问可以查阅<a href=\"https://github.com/BigCoke233/mark/wiki\">主题wiki</a>，或者email我：bc@cokewithice.com<br /><b>&nbsp;&nbsp;并请您不要删除主题版权信息，谢谢配合!</b></span></div>";
	
	//基础设置
	$IndexName = new Typecho_Widget_Helper_Form_Element_Text('IndexName', NULL, NULL, _t('站点名称'), _t('首页名称，会在一些地方调用。'));
    $form->addInput($IndexName);
	
	$IndexDecoration = new Typecho_Widget_Helper_Form_Element_Text('IndexDecoration', NULL, NULL, _t('站点介绍'), _t('用一句话来介绍你的网站'));
    $form->addInput($IndexDecoration);
	
	$IndexIcon = new Typecho_Widget_Helper_Form_Element_Text('IndexIcon', NULL, NULL, _t('LOGO图标'), _t('显示在导航栏的站点名之前，参考font-awesome或者bootstrap内置图标的class'));
    $form->addInput($IndexIcon);
	
	$news = new Typecho_Widget_Helper_Form_Element_Text('news', NULL, NULL, _t('首页公告'), _t('公告，显示在首页文章列表之前'));
    $form->addInput($news);
	
	$avatar = new Typecho_Widget_Helper_Form_Element_Text('avatar', NULL, NULL, _t('博主头像'), _t('填入一个图片url，作为博主头像显示在侧边栏（其他地方的图片自动调用gravatar）'));
    $form->addInput($avatar);
	
	$site_create_time = new Typecho_Widget_Helper_Form_Element_Text('site_create_time', NULL, NULL, _t('网站建立时间'), _t('格式为 2010-09-10 00:00:00 即 年-月-日 时:分:秒'));
    $form->addInput($site_create_time);
	
	//侧边栏社交按钮配置
    $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('github主页地址'), _t('输入你的github主页地址，显示在侧边栏，不填写则不显示'));
    $form->addInput($github);

    $QQ_num = new Typecho_Widget_Helper_Form_Element_Text('QQ_num', NULL, NULL, _t('QQ号'), _t('输入你的QQ号，在侧边栏点击后自动打开聊天窗口，不填写则不显示。'));
    $form->addInput($QQ_num);
	
    $QQ_group = new Typecho_Widget_Helper_Form_Element_Text('QQ_group', NULL, NULL, _t('QQ群'), _t('在qq群官网，找到加群组件，将里面超链接中的url复制过来，直接打开QQ群，显示在侧边栏，不填写则不显示。'));
    $form->addInput($QQ_group);
	
    $custom_social = new Typecho_Widget_Helper_Form_Element_Textarea('custom_social', NULL, NULL,_t('自定义社交按钮'), _t('和之前的github、qq、qq群按钮显示在一起，如有需要请根据主题wiki配置。'));
    $form->addInput($custom_social);
	
	//个性化设置
    $bg_url = new Typecho_Widget_Helper_Form_Element_Text('bg_url', NULL, NULL, _t('背景图url'), _t('填入一个图片url作为背景图，填入背景图后自动设置透明度。'));
    $form->addInput($bg_url);
	
	$lgimg_url = new Typecho_Widget_Helper_Form_Element_Text('lgimg_url', NULL, NULL, _t('首页大图url'), _t('填入一个图片url作为首页大图，不填则不显示，填写后背景图失效。'));
    $form->addInput($lgimg_url);
	
    $custom_nav = new Typecho_Widget_Helper_Form_Element_Textarea('custom_nav', NULL, NULL, _t('自定义导航'), _t('用li标签结合a标签书写，若不清楚可以查看主题wiki，设置之后会直接覆盖默认的导航。'));
    $form->addInput($custom_nav);
	
    $custom_sidebar = new Typecho_Widget_Helper_Form_Element_Textarea('custom_sidebar', NULL, NULL, _t('自定义侧边栏'), _t('显示在原有侧边栏之后，按照wiki书写。'));
    $form->addInput($custom_sidebar);
	
	//pjax
    $pjax = new Typecho_Widget_Helper_Form_Element_Select('pjax',array('0'=>'不启用','1'=>'启用'),'0','启用 PJAX (BETA)','是否启用 PJAX。如果你发现站点有点不对劲，又不知道这个选项是啥意思，请关闭此项。');
    $form->addInput($pjax);
	
    $pjax_reload = new Typecho_Widget_Helper_Form_Element_Textarea('pjax_reload', NULL, NULL, _t('Pjax重载函数'), _t('填入Pjax重载函数，不懂或者没有打开pjax请留空。'));
    $form->addInput($pjax_reload);
}
?>

