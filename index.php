<?
header("http/1.0 200 Ok");
require_once('config/load.php');

$is_module=0;
if($_SERVER['REDIRECT_URL']!=""){
	if(substr($_SERVER['REDIRECT_URL'], -1)=="/") $parametrs=substr($_SERVER['REDIRECT_URL'],1,-1);
	else $parametrs=substr($_SERVER['REDIRECT_URL'],1);
	
	$params=explode("/",$parametrs);

	if($params[0]=="admin"){
		$a="1234";
		include('secret_name/index.php');
		//echo substr($_SERVER['REDIRECT_URL'],1);
		//$admin=new admin($this->system,array());
		exit();
	}
	if(substr($parametrs,0,4)=="mod_"){
		$is_module=1;
		$where="(mod_menu='*' or mod_name='".$params[0]."')";	
	}
	else{
		$where="(mod_menu like '%,".$params[0].",%' or mod_menu='*')";	
	}
}
else{
	$where="mod_menu='*'";
}
$l_r=$system->mydb->query("select mod_name,mod_position,mod_settings,mod_admin_settings from modules where ".$where." and (mod_visible like '%".$system->user->getAccess()."%' or mod_visible='-1') order by mod_order");
$arr=array();
if(count($l_r)>0){
	foreach($l_r as $a){
		if($is_module) if($a['mod_name']==$params[0]) $a['mod_settings']=substr($parametrs,strlen($params[0])+1);
		$arr[$a['mod_position']].=$system->load($a['mod_name'],$a['mod_settings'],$a['mod_admin_settings'])."<br>";
	}
}


$system->smarty->assign('settings', array('scripts'=>$system->js,'styles'=>$system->css));
foreach($arr as $key => $value){
	$system->smarty->assign($key, $value);
}
$system->smarty->display('index.tpl');
?>