<?
############################
# РЎРµРєС†РёСЏ MySQL
############################
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "");
define("MYSQL_DATABASE", "cms_db");
define("MYSQL_PREFIX", "cms_");
define("MYSQL_CHARSET", "utf8");
define("MYSQL_DIR", str_replace("\\", "/", getcwd()).'../includes/classes/db/');

############################
# РЎРµРєС†РёСЏ С€Р°Р±Р»РѕРЅРѕРІ (smarty v3)
############################
define('SMARTY_DIR', str_replace("\\", "/", getcwd()).'../includes/lib/smarty/');
define("TMPL_DIR","./tmpl/");
define("TMPL_DEBUG",	false);
// [0 || 1 || 2] 0 - РѕС‚РєР»СЋС‡РёС‚СЊ РєРµС€РёСЂРѕРІР°РЅРёРµ РїРѕ СѓРјРѕР»С‡Р°РЅРёСЋ 1 - РєРµС€РёСЂРѕРІР°С‚СЊ Р±РµР· CACHE_LIFETIME  2 - РєРµС€РёСЂРѕРІР°С‚СЊ СЃ Р·Р°РґР°РЅРЅС‹Рј CACHE_LIFETIME
define("TMPL_CACHING",	0);
define("TMPL_CACHE_LIFETIME", 10);
define("TMPL_CACHE_DIR", "./tmpl/system/cache/");
define("TMPL_COMPILE_DIR", "./tmpl/system/compile/");
define("TMPL_ALLOW_PHP", true);
############################
# РЎРµРєС†РёСЏ user
############################
define("USER_SALT", "random");
define("USER_DIR", str_replace("\\", "/", getcwd()).'../includes/classes/user/');


define("FORMS_DIR", str_replace("\\", "/", getcwd()).'../includes/classes/forms/');
header('Content-type: text/html; charset=utf-8');
?>