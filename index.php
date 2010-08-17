<?
require_once('config/load.php');



$class_name="News";
$content=$system->load($class_name);	


$class_name="Authorization";
$content.=$system->load($class_name);	



$system->smarty->assign('body', $content);
$system->smarty->display('index.tpl');

?>