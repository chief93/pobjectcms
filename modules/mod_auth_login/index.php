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
		if(!isset($_GET['login'])||$_GET['login']=="") $this->message(1); 
		if(!isset($_GET['password'])||$_GET['password']=="") $this->message(2);
		$this->message($this->user->authTry($_GET['login'],$_GET['password']));
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