<?php
require_once("modules/Def/index.php");

class Authorization extends Def{
	function execute () {		
		$_out="";
		if($this->user->isAuth()){
			$data=$this->user->getUserInfo();
			$_out="<br>������ ".$data['login']."!";
		}
		else{
			if($this->action=="") $this->action="auth";
			switch($this->action){
				case "register":$_out=$this->register(); break;
				case "auth": $_out=$this->auth(); break;
			}
		}
		
        	$this->smarty->assign('text',$_out);
        	return parent::execute();	
	}
	function register(){
		$this->template='reg_form.tpl';
		$_out="�����������<br><a href='javascript:void(0);' onClick=\"toggle('".$this->name."','auth');\">��������������</a>";
		return $_out;
	}
	function auth(){
		$this->template='auth_form.tpl';
		$_out="�����������<br><a href='javascript:void(0);' onClick=\"toggle('".$this->name."','register');\">������������������</a>";
		return $_out;
	}
}
?>