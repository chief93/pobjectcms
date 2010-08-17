<?php
class Def
{
	protected $smarty;
	protected $mydb;
	protected $name;
	protected $user;
	protected $template='index.tpl';
	public function load($name,&$mysql,&$smarty,$user){
		$this->name=$name;
		$this->mydb=$mysql;
		$this->smarty = $smarty;
		$this->user=$user;
		return true;
	}
	public function execute(){
		return $this->smarty->fetch("modules/".$this->name."/".$this->template);
	} 	
}
?>