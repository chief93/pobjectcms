<?php
require_once("modules/Def/index.php");

class mod_menu extends Def{
	function execute () {	
			$data=$this->mydb->query("select * from menu where access like '%".$this->user->getAccess()."%' or access='-1'");
        	$this->smarty->assign('items',$data);
        	return parent::execute();	
	}
	function message($text){
		echo $text;
		exit();
	}
}
?>