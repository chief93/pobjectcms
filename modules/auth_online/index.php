<?php
require_once("modules/Def/index.php");

class auth_online extends Def{
	function execute () {	
		if(!$this->user->isAuth()) return "";
		$data=$this->user->getUserInfo(); 
		$_out="<br>������ ".$data['login']."! <a href='javascript:void(0)' onClick='auth_exit();'>�����</a>";
        	if($this->action=="logout") $this->logout();
        	$this->smarty->assign('text',$_out);
        	return parent::execute();	
	}
	function logout(){
		$this->user->user_logout();
		return true;
	}
}
?>