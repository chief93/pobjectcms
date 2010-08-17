<?php
class Def
{
	protected $smarty;
	protected $mydb;
	protected $name;
	protected $user;
	protected $template='index.tpl';
	protected $action;
	public function load($name,&$mysql,&$smarty,$user){
		$this->name=$name;
		$this->mydb=$mysql;
		$this->smarty = $smarty;
		$this->user=$user;
		if(isset($_GET['action'])) $this->action=$_GET['action'];
		else $this->action="";
		return true;
	}
	public function setAction($act){
		$this->action=$act;
	}
	public function execute(){
		return $this->smarty->fetch("modules/".$this->name."/".$this->template);
	} 	
}
?>