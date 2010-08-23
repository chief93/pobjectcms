<?
//подключаем все
require_once('config/config.php');
require_once(MYSQL_DIR . 'mysql.php');
require_once(SMARTY_DIR . 'Smarty.class.php');//эту строку убираешь(зачем тебе смарти)
//запрос в бд. не трогать
$mydb=new Database(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE,MYSQL_CHARSET,MYSQL_PREFIX);
$data=$mydb->query("select * from form_rules where module_name='mod_auth_register' order by id");
//блок активации смарти. убираешь весь, меняешь своим
$smarty = new Smarty;
$smarty->template_dir = TMPL_DIR;
$smarty->debugging = TMPL_DEBUG;
$smarty->caching = TMPL_CACHING;
$smarty->cache_lifetime = TMPL_CACHE_LIFETIME;
$smarty->cache_dir = TMPL_CACHE_DIR;
$smarty->allow_php_tag = TMPL_ALLOW_PHP;
$smarty->compile_dir = TMPL_COMPILE_DIR;
//конец блока активации смарти

//засекаем время
function microtime_float() {  
    list($usec, $sec) = explode(" ", microtime());  
    return ((float)$usec + (float)$sec);  
}
$time_start = microtime_float(); 
//забиваем в шаблон данные. заменяешь своим
$smarty->assign("source",$data);
//отображаем шаблон. заменяешь своим
$smarty->display('all.tpl');
//выводим время
printf ("<font color=#C0C0C0>Render time: %.3f sec</font>",microtime_float()-$time_start); 
?>