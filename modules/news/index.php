<?php
require_once("modules/Def/index.php");

class news extends Def{
    function execute () {
        $data=$this->mydb->query('SELECT * FROM news');
        
        $this->smarty->assign('header',$data['header']);
        $this->smarty->assign('msg',$data['msg']);
                
        return parent::execute();
    }
}
?>