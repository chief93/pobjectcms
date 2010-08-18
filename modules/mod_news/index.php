<?php
require_once("modules/Def/index.php");

class mod_News extends Def{
    function execute () {
        $data=$this->mydb->query('SELECT * FROM news');
        $this->smarty->assign('source',$data);
        return parent::execute();
    }
}
?>