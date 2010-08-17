<?
require_once('config/load.php');



$class_name="news";
$content=$system->load($class_name);	




if($system->user->isAuth()) $content.="Пользователь авторизован";
else $content.="Пользователь не авторизован";
$data=$system->user->getUserInfo();
$content.=". Привет ".$data['login']."!";
$system->smarty->assign('body', $content);
$system->smarty->display('index.tpl');

?>