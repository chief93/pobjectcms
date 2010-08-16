<?
############################
# Секция MySQL
############################
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "cms_db");
define("MYSQL_PREFIX", "cms_");
define("MYSQL_CHARSET", "utf8");
############################
# Секция Smarty
############################
define('SMARTY_DIR', str_replace("\\", "/", getcwd()).'../includes/lib/smarty/');
?>