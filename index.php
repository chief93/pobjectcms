<?
require_once('config/load.php');



$class_name="news";
$content=$system->load($class_name);	


$class_name="authorization";
$content=$system->load($class_name);	



$system->smarty->assign('body', $content);
$system->smarty->display('index.tpl');

?>