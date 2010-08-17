<?

require_once('config/config.php');



$class_name="news";
require_once("modules/".$class_name."/index.php");
$object=new $class_name();
$object->load($class_name,$mydb,$smarty,$user);
$content=$object->execute();
	




if($user->isAuth()) $content.="Пользователь авторизован";
else $content.="Пользователь не авторизован";
$data=$user->getUserInfo();
$content.=". Привет ".$data['login']."!";
$smarty->assign('body', $content);
$smarty->display('index.tpl');

?>