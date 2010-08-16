<?php
class default
{
	protected $smarty;
	public function setSmarty(Smarty &$smarty)
	{
		$this->smarty = &$smarty;
		return true;
	}
	public function execute()
	{
		return $this->smartyObject->fetch('index.tpl');
	} 	
}
?>