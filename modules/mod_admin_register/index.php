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
		$arr=$_GET['array'];
		$result="";
		$num=count($_GET['array'])/9;
		for($i=1;$i<=$num;$i++){
			if($arr['ch_empty_'.$i]=="on") $arr['ch_empty_'.$i]=1;
			else $arr['ch_empty_'.$i]=0;
			if($arr['ch_unor_'.$i]=="on") $arr['ch_unor_'.$i]=1;
			else $arr['ch_unor_'.$i]=0;
			if($result!="") $result.=", ";
			$result.="('','mod_auth_register','".$arr['text_'.$i]."','".$arr['ch_empty_'.$i]."','".$arr['empty_error_'.$i]."','".$arr['ch_unor_'.$i]."','".$arr['unor_error_'.$i]."','".$arr['ch_equ_'.$i]."','".$arr['unor_equ_'.$i]."','".$arr['ch_reg_'.$i]."','".$arr['unor_reg_'.$i]."')";
		}
		$this->mydb->query("delete from form_rules where module_name='mod_auth_register'");
		$result="insert into form_rules values ".$result;
		$this->mydb->query($result);
		echo "ok";
		exit();
	}
	function show_form(){
		$data=$this->mydb->query("select * from form_rules where module_name='mod_auth_register' order by id");
        return $data;
	}
}
?>