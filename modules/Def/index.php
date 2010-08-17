<?php
class Def
{
	protected $smarty;
	protected $mydb;
	protected $name;
	protected $template='index.tpl';
	public function setName($name){
		$this->name=$name;
		return true;
	}
	public function setDb(&$mysql) {
        	$this->mydb=$mysql;
		return true;
	}
	public function setSmarty(Smarty &$smarty){
		$this->smarty = $smarty;
		return true;
	}
	public function execute(){
		return $this->smarty->fetch($this->name."/".$this->template);
	} 	
}
?>