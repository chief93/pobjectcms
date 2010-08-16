<?

require_once('config/config.php');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = TMPL_DIR;
$smarty->debugging = TMPL_DEBUG;
$smarty->caching = TMPL_CACHING;
$smarty->cache_lifetime = TMPL_CACHE_LIFETIME;
$smarty->cache_dir = TMPL_CACHE_DIR;
$smarty->allow_php_tag = TMPL_ALLOW_PHP;
$smarty->compile_dir = TMPL_COMPILE_DIR;




$class_name="news";

require_once("modules/".$class_name."/index.php");
$object=new $class_name();
$object->setName($class_name);
$object->setDb($mydb);
$object->setSmarty($smarty);
$content=$object->execute();
	

$smarty->assign('body', $content);
$smarty->display('index.tpl');

?>