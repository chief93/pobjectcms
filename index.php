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
$system=array();
$system[]="Hello";
$system[]="World";
$system[]="From";
$system[]="Array!";

$smarty->assign('system', $system);

$smarty->assign('name', 'world');


$arr = array( 1001,1002,1003);
$smarty->assign('custid', $arr);


$smarty->display('index.tpl');

?>