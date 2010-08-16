<?php
require_once("../default/index.php");

class news extends default {
    function execute () {
        $data=$this->mydb->query('SELECT * FROM news');
        
        $this->smarty->assign('header',$data['header']);
        $this->smarty->assign('msg',$data['msg']);
                
        return parent::action();
    }
}
?>