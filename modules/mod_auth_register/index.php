<?php
require_once("modules/Def/index.php");

class mod_auth_register extends Def{
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
		$result=$this->forms->check_form($_GET['array'],$this->name,'users');
		if($result=="0"){		
			$_GET['array']['password']=md5(md5( $_GET['array']['password'].$this->user->salt));
			$this->mydb->query("insert into users values ('','1','".$_GET['array']['login']."','".$_GET['array']['password']."','".$_GET['array']['email']."','".date(U)."','".date(U)."')");
			$this->user->login($_GET['array']['login'],$_GET['array']['password'],'1');
		}
		$this->message($result);	
	}
}
/*
таблица доступов
0-забаненный
1-обычный
2-админ

*/
?>