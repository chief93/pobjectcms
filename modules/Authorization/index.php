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
			if($this->action=="") $this->action="show_short_auth";
			switch($this->action){
				case "show_short_reg":$_out=$this->show_short_reg(); break;
				case "show_short_auth": $_out=$this->show_short_auth(); break;
			}
		}
		
        	$this->smarty->assign('text',$_out);
        	return parent::execute();	
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
}
?>