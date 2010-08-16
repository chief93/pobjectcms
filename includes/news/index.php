<?php
include "../default/default.php";

class news extends execute {
	function execute () {
		$data=$this->mydb->query('SELECT * FROM news');
		
		$this->smarty->assign('header',$data['header']);
		$this->smarty->assign('msg',$data['msg']);
				
		return parent::action();
	}
}
?>