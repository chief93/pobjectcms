<?php
require_once("modules/Def/index.php");

class menu extends Def{
	function execute () {	
		$data=$this->mydb->query("select * from menu");
        	$this->smarty->assign('items',$data);
        	return parent::execute();	
	}
	function message($text){
		echo $text;
		exit();
	}
}
?>