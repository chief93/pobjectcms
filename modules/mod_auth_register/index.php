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
		$_out="�����������";
		return $_out;
	}
	function reg_try(){	
		print_r($_GET['massiv']);
		$this->message($this->user->regTry($_GET['massiv']));
	}
}
?>