<?
require_once('config/load.php');
$system->jsAdd("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
$system->jsAdd("tmpl/js/all.js");



$class_name="News";
$content=$system->load($class_name);	
$class_name="Authorization";
$content.=$system->load($class_name);	


$settings=array();
$settings['scripts']=$system->jsGet();
$system->smarty->assign('settings', $settings);
$system->smarty->assign('body', $content);
$system->smarty->display('index.tpl');
?>