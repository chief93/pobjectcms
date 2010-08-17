<?php
class Def
{
	protected $smarty;
	protected $mydb;
	protected $name;
	protected $user;
	protected $template='index.tpl';
	protected $action;
	public function load($name,&$mysql,&$smarty,&$user,&$js){
		$this->name=$name;
		$this->mydb=&$mysql;
		$this->smarty = &$smarty;
		$this->user=&$user;
		if(isset($_GET['action'])) $this->action=$_GET['action'];
		else $this->action="";
		$js=$this->load_res("js",$js);
		return true;
	}
	public function setAction($act){
		$this->action=$act;
		return true;
	}
	public function execute(){
		return $this->smarty->fetch("modules/".$this->name."/".$this->template);
	} 	
	protected function load_res($type,$arr){
		$folder="tmpl/modules/".$this->name."/".$type."/";
		if (is_dir($folder)){
			if ($dir = opendir($folder)){
				while (false !== ($file = readdir($dir))){
					if (end(explode(".", $file))==$type){ 
						$arr[]=$folder.$file;
					}
				}
			}
		}
		return $arr;
	}
}
?>