<?php
require_once("modules/Def/index.php");

class mod_comments extends Def{
	function execute () {
		$by_page=$this->settings[1];
		if(isset($this->settings[3])&&$this->settings[3]>0) $page=$this->settings[3];
		else $page=1;
		$data=$this->mydb->query("select id,text,author,data from comments where module='".$this->settings[0]."' and module_id='".(int)$this->settings[2]."' and status=1 limit ".(($page-1)*$this->settings[1]).",".$this->settings[1]."");
		for($i=0;$i<count($data);$i++){
			if($data[$i]['author']==-1) $data[$i]['author']="Гость";
			$data[$i]['data']=date('h:i:s j-M-o', $data[$i]['data']);
		}		
		return $data;
	}
}
?>