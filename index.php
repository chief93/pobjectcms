<?
header("http/1.0 200 Ok");
require_once('config/load.php');
if($_SERVER['REDIRECT_URL']!=""){
	if(substr($_SERVER['REDIRECT_URL'], -1)=="/") $parametrs=substr($_SERVER['REDIRECT_URL'],1,-1);
	else $parametrs=substr($_SERVER['REDIRECT_URL'],1);
	$params=explode("/",$parametrs);
	if(substr($parametrs,0,4)=="mod_"){
		$where="(menu='*' or name='".$params[0]."')";	
	}
	else{
		$where="(menu like '%,".$params[0].",%' or menu='*')";	
	}
}
else{
	$where="menu='*'";
}
$l_r=$system->mydb->query("select name,position from modules where ".$where." and (visible='".$system->user->getAccess()."' or visible='-1') order by position_order");
$arr=array();
if(count($l_r)>0){
	foreach($l_r as $a){
		$arr[$a['position']].=$system->load($a['name'])."<br>";
	}
}


$system->smarty->assign('settings', array('scripts'=>$system->js,'styles'=>$system->css));
foreach($arr as $key => $value){
	$system->smarty->assign($key, $value);
}
$system->smarty->display('index.tpl');
?>