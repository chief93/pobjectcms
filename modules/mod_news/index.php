<?php
require_once("modules/Def/index.php");

class mod_News extends Def{
    function execute () {
	$sql="SELECT id,title,s_text,next_text FROM news";
	if(isset($this->settings[0])&&$this->settings[0]>0){
		$settings=$this->name."/5/".implode("/",$this->settings);
		require_once("modules/mod_comments/index.php");
		$comments=new mod_comments();
		$arr=array();
		$comments->load("mod_comments",$settings,$this->mydb,$this->smarty,$this->user,$arr,$arr);	
		$data=$comments->execute();
		$this->smarty->assign('comments',$data);
 		$sql= "SELECT title,f_text FROM news where id=".(int)$this->settings[0]." order by position";
		$this->template="full_news.tpl";
	}
        $data=$this->mydb->query($sql);

        $this->smarty->assign('source',$data);
        return parent::execute();
    }
}
?>