<?
header("http/1.0 200 Ok");
if($a!="1234") die("РќРµСЃР°РЅРєС†РёРѕРЅРёСЂРѕРІР°РЅРЅС‹Р№ РґРѕСЃС‚СѓРї");
function microtime_float() {  
    list($usec, $sec) = explode(" ", microtime());  
    return ((float)$usec + (float)$sec);  
    }  

$time_start = microtime_float(); 

switch($system->user->getAccess()){
	case "0": $arr=load_auth($system);break;
	case "2": $arr=start_admin($system);break;
	default: die("РЈ Р’Р°СЃ РЅРµРґРѕСЃС‚Р°С‚РѕС‡РЅРѕ РїСЂР°РІ РґРѕСЃС‚СѓРїР°");break;
}
$system->smarty->assign('settings', array('scripts'=>$system->js,'styles'=>$system->css));
foreach($arr as $key => $value){
	$system->smarty->assign($key, $value);
}
$system->smarty->display('admin.tpl');
printf ("<font color=#C0C0C0>Render time: %.3f sec</font>",microtime_float()-$time_start);  

exit();
function load_auth($system){
	$arr=array();
	$arr['center']=$system->load('mod_auth_login','','')."<br>";
	return $arr;
}
function start_admin($system){
	$arr=array();
	$params=explode("/",substr($_SERVER['REDIRECT_URL'], strlen("admin")+2));
	$is_module=0;
	if($params[0]!=""){
		
		if(substr($params[0],0,10)=="mod_admin_"){
			$is_module=1;
			$where="(mod_menu='*' or mod_name='".$params[0]."')";	
		}
		else{
			$where="(mod_menu like '%,".$params[0].",%' or mod_menu='*')";	
		}
	}
	else{
		$where="(mod_menu='*' or mod_menu=',index,')";
	}
	
	$l_r=$system->mydb->query("select mod_name,mod_position,mod_settings,mod_admin_settings from admin_modules where ".$where." and mod_visible='-1' order by mod_order");
	$arr=array();
	if(count($l_r)>0){
		foreach($l_r as $a){
			if($is_module) if($a['mod_name']==$params[0]) $a['mod_settings']=substr($parametrs,strlen($params[0])+1);
			$arr[$a['mod_position']].=$system->load($a['mod_name'],$a['mod_settings'],$a['mod_admin_settings'])."<br>";
		}
	}
	
	$arr['center'].="Let's go!";
	return $arr;
}
/*


$is_module=0;



$system->smarty->assign('settings', array('scripts'=>$system->js,'styles'=>$system->css));
foreach($arr as $key => $value){
	$system->smarty->assign($key, $value);
}
$system->smarty->display('index.tpl');
*/

?>