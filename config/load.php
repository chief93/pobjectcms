<?

#############################
# Старт всех важных классов
#############################
require_once(SMARTY_DIR . 'Smarty.class.php');
require_once(MYSQL_DIR . 'mysql.php');
require_once(USER_DIR . 'user.php');
$smarty = new Smarty;
$smarty->template_dir = TMPL_DIR;
$smarty->debugging = TMPL_DEBUG;
$smarty->caching = TMPL_CACHING;
$smarty->cache_lifetime = TMPL_CACHE_LIFETIME;
$smarty->cache_dir = TMPL_CACHE_DIR;
$smarty->allow_php_tag = TMPL_ALLOW_PHP;
$smarty->compile_dir = TMPL_COMPILE_DIR;
$mydb=new Database(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE,MYSQL_CHARSET,MYSQL_PREFIX);
$user=new User($mydb,USER_SALT);

?>