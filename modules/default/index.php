<?php
class default
{
	protected $smarty;
	protected $mydb;
	public function setDb(MySQL &$mysql) {
        	$this->mydb=&$mysql;
		return true;
	}
	public function setSmarty(Smarty &$smarty){
		$this->smarty = &$smarty;
		return true;
	}
	public function execute(){
		return $this->smartyObject->fetch('index.tpl');
	} 	
}
?>