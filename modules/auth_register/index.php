<?php
require_once("modules/Def/index.php");

class auth_register extends Def{
	function execute () {	
			
		if($this->user->isAuth()) return "";
		if($this->action=="") $this->action="show_short_reg";
		switch($this->action){
			case "show_short_reg":$_out=$this->show_short_reg(); break;
			case "reg_try": $this->reg_try();
		}
        	$this->smarty->assign('text',$_out);
        	return parent::execute();	
	}
	function message($text){
		echo $text;
		exit();
	}
	function show_short_reg(){
		$_out="Регистрация";
		return $_out;
	}
	function reg_try(){	
		if(!isset($_GET['login'])||$_GET['login']=="") $this->message(1); 
		if(!isset($_GET['password'])||$_GET['password']=="") $this->message(2);		
		if(!isset($_GET['password2'])||$_GET['password2']=="") $this->message(3); 
		if(!isset($_GET['email'])||$_GET['email']=="") $this->message(4);
		if($_GET['password']!=$_GET['password2']) $this->message(5);
		if(!preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $_GET['email'])) $this->message(6);
		$this->message($this->user->regTry($_GET['login'],$_GET['password'],$_GET['email']));
	}
}
?>