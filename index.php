<?
require_once('config/load.php');
$system->jsAdd("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
$system->jsAdd("tmpl/js/all.js");
$system->cssAdd("tmpl/css/all.css");



$class_name="News";
$content=$system->load($class_name);	
$class_name="Authorization";
$content.=$system->load($class_name);	


$settings=array();
$settings['scripts']=$system->jsGet();
$settings['styles']=$system->cssGet();
$system->smarty->assign('settings', $settings);
$system->smarty->assign('body', $content);
$system->smarty->display('index.tpl');
?>