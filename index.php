<?
require_once('config/load.php');
$system->jsAdd("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
$system->jsAdd("tmpl/js/all.js");
$system->cssAdd("tmpl/css/all.css");


$block1=$system->load('News');
$block3=$system->load('auth_online');	
$block3.=$system->load('auth_login');	
$block3.=$system->load('auth_register');
	

$system->smarty->assign('module_body', $block1);
$system->smarty->assign('block3', $block3);

$settings=array();
$settings['scripts']=$system->jsGet();
$settings['styles']=$system->cssGet();

$system->smarty->assign('settings', $settings);
$system->smarty->assign('body', $content);
$system->smarty->display('index.tpl');

?>