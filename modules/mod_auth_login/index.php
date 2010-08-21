<?php
require_once("modules/Def/index.php");
class mod_auth_login extends Def{
	function execute () {	
		if($this->user->isAuth()) return "";
		if($this->action=="") $this->action="show_short_auth";
		switch($this->action){
			case "show_short_auth": $_out=$this->show_short_auth(); break;
			case "auth_try": $this->auth_try();
		}
        	$this->smarty->assign('text',$_out);
        	return parent::execute();	
	}
	function auth_try(){
		$_GET['array']['password']=md5(md5($_GET['array']['password'].$this->user->salt));
		$result=$this->forms->check_data_inc($_GET['array'],'users');
		if($result==1){
			setcookie ("login", $_GET['array']['login'],time()+36000);
			setcookie ("password", $_GET['array']['password'],time()+36000);
		}
		$this->message($result);
	}
	function message($text){
		echo $text;
		exit();
	}
	function show_short_auth(){
		$_out="Авторизация";
		return $_out;
	}
}
?>