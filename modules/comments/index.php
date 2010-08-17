<?php
require_once("modules/Def/index.php");

class comments extends Def{
	var $module;
	
	function execute () {
		$data=$this->mydb->query("SELECT * FROM comments WHERE module='$this->module'");
		$this->smarty->assign('source',$data);
		return parent::execute();
	}
}
?>