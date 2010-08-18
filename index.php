<?
header("http/1.0 200 Ok");
require_once('config/load.php');
$is_module=0;
if($_SERVER['REDIRECT_URL']!=""){
	if(substr($_SERVER['REDIRECT_URL'], -1)=="/") $parametrs=substr($_SERVER['REDIRECT_URL'],1,-1);
	else $parametrs=substr($_SERVER['REDIRECT_URL'],1);
	
	$params=explode("/",$parametrs);
	
	if(substr($parametrs,0,4)=="mod_"){
		$is_module=1;
		$where="(menu='*' or name='".$params[0]."')";	
	}
	else{
		$where="(menu like '%,".$params[0].",%' or menu='*')";	
	}
}
else{
	$where="menu='*'";
}
$l_r=$system->mydb->query("select name,position,settings from modules where ".$where." and (visible='".$system->user->getAccess()."' or visible='-1') order by position_order");
$arr=array();
if(count($l_r)>0){
	foreach($l_r as $a){
		if($is_module) if($a['name']==$params[0]) $a['settings']=substr($parametrs,strlen($params[0])+1);
		$arr[$a['position']].=$system->load($a['name'],$a['settings'])."<br>";
	}
}


$system->smarty->assign('settings', array('scripts'=>$system->js,'styles'=>$system->css));
foreach($arr as $key => $value){
	$system->smarty->assign($key, $value);
}
$system->smarty->display('index.tpl');
?>