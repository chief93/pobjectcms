<?
############################
# Секция MySQL
############################
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "cms_db");
define("MYSQL_PREFIX", "cms_");
define("MYSQL_CHARSET", "cp1251");
define("MYSQL_DIR", str_replace("\\", "/", getcwd()).'../includes/classes/db/');

############################
# Секция шаблонов (smarty v3)
############################
define('SMARTY_DIR', str_replace("\\", "/", getcwd()).'../includes/lib/smarty/');
define("TMPL_DIR","./tmpl/");
define("TMPL_DEBUG",	false);
// [0 || 1 || 2] 0 - отключить кеширование по умолчанию 1 - кешировать без CACHE_LIFETIME  2 - кешировать с заданным CACHE_LIFETIME
define("TMPL_CACHING",	0);
define("TMPL_CACHE_LIFETIME", 10);
define("TMPL_CACHE_DIR", "./tmpl/system/cache/");
define("TMPL_COMPILE_DIR", "./tmpl/system/compile/");
define("TMPL_ALLOW_PHP", true);
############################
# Секция user
############################
define("USER_SALT", "random");
define("USER_DIR", str_replace("\\", "/", getcwd()).'../includes/classes/user/');

?>