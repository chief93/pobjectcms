<?
header("http/1.0 200 Ok");
require_once('config/load.php');
$system->jsAdd("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js");
$system->jsAdd("/tmpl/js/all.js");
$system->cssAdd("/tmpl/css/all.css");


if($_SERVER['REDIRECT_URL']!=""){
	if(substr($_SERVER['REDIRECT_URL'], -1)=="/") $parametrs=substr($_SERVER['REDIRECT_URL'],1,-1);
	else $parametrs=substr($_SERVER['REDIRECT_URL'],1);
	$params=explode("/",$parametrs);
}
else $params=array("index");
$access=$system->user->getAccess();

//сначала пытаемся прогрузить левое и правое меню, для нашего меню и нашего доступа

$l_r=$system->mydb->query("select name,position from modules where (menu like '%,".$params[0].",%' or menu='*') and (visible='".$access."' or visible='-1') order by position_order");
$arr=array();
if(count($l_r)>0){
	foreach($l_r as $a){
		$arr[$a['position']].=$system->load($a['name'])."<br>";
	}
}
$settings=array();
$settings['scripts']=$system->jsGet();
$settings['styles']=$system->cssGet();
$system->smarty->assign('settings', $settings);
foreach($arr as $key => $value){
	$system->smarty->assign($key, $value);
}
$system->smarty->display('index.tpl');
?>