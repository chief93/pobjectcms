<?php
require_once("modules/Def/index.php");

class Authorization extends Def{
    function execute () {	
	$_out="";
	if($this->user->isAuth()) $_out="����� ����������";
	else{
		$this->template='auth_form.tpl';
		$_out="�����������";
	}
	//$data=$this->user->getUserInfo();
	//$_out.="<br>������ ".$data['login']."!";
        $this->smarty->assign('text',$_out);
        return parent::execute();
    }
}
?>