<?php
require_once("modules/Def/index.php");
class mod_admin_register extends Def{
	function execute () {
		if($this->action=="") $this->action="show_form";
		switch($this->action){
			case "show_form":$data=$this->show_form(); break;
			case "hello": $this->save();break;
		}
		$this->smarty->assign('source',$data);
        return parent::execute();	
	}
	function save(){
		print_r($_GET['array']);
		echo "aaaa";
		exit();
	}
	function show_form(){
		$data=$this->mydb->query("select * from form_rules where module_name='mod_auth_register' order by id");
        return $data;
	}
}
?>