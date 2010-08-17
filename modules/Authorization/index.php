<?php
require_once("modules/Def/index.php");

class Authorization extends Def{
	function execute () {		
		$_out="";
		if($this->user->isAuth()){
			$data=$this->user->getUserInfo();
			$_out="<br>Привет ".$data['login']."!";
		}
		else{
			if($this->action=="") $this->action="show_short_reg";
			switch($this->action){
				case "show_short_reg":$_out=$this->show_short_reg(); break;
				case "show_short_auth": $_out=$this->show_short_auth(); break;
				case "auth_try": $this->auth_try();
				case "reg_try": $this->reg_try();
			}
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
	function show_short_reg(){
		$this->template='reg_form.tpl';
		$_out="Регистрация<br><a href='javascript:void(0);' onClick=\"toggle('".$this->name."','show_short_auth');\">Авторизоваться</a>";
		return $_out;
	}
	function show_short_auth(){
		$this->template='auth_form.tpl';
		$_out="Авторизация<br><a href='javascript:void(0);' onClick=\"toggle('".$this->name."','show_short_reg');\">Зарегистрироваться</a>";
		return $_out;
	}
	function reg_try(){	
		print_r($_GET);
		if(!isset($_GET['login'])||$_GET['login']=="") $this->message(1); 
		if(!isset($_GET['password'])||$_GET['password']=="") $this->message(2);		
		if(!isset($_GET['password2'])||$_GET['password2']=="") $this->message(3); 
		if(!isset($_GET['email'])||$_GET['email']=="") $this->message(4);
		if($_GET['password']!=$_GET['password2']) $this->message(5);
		echo $_GET['password2'];
		
	}
}
?>