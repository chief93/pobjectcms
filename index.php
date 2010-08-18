<?
header("http/1.0 200 Ok");
require_once('config/load.php');
$system->jsAdd("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
$system->jsAdd("tmpl/js/all.js");
$system->cssAdd("tmpl/css/all.css");


$block3=$system->load('News');
$block3.=$system->load('auth_online');	
$block3.=$system->load('auth_login');
	

$settings=array();
$settings['scripts']=$system->jsGet();
$settings['styles']=$system->cssGet();

$system->smarty->assign('settings', $settings);
$system->smarty->assign('body', $block3);
$system->smarty->display('index.tpl');

?>