<?php
require_once("modules/Def/index.php");

class mod_News extends Def{
    function execute () {
	$sql="SELECT id,title,s_text,next_text FROM news";
	if(isset($this->settings[0])&&$this->settings[0]>0){
 		$sql= "SELECT title,f_text FROM news where id=".(int)$this->settings[0]." order by position";
		$this->template="full_news.tpl";
	}
        $data=$this->mydb->query($sql);
        $this->smarty->assign('source',$data);
        return parent::execute();
    }
}
?>