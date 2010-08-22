<?php
require_once("modules/Def/index.php");

class mod_admin_panel extends Def{
	function execute () {	
			$data=$this->mydb->query("select * from admin_panel order by position");
        	$this->smarty->assign('source',$data);
        	return parent::execute();	
	}
}
?>