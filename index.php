<?

		require_once('include/lib/smarty/Smarty.class.php');
		$smarty = new Smarty();
		$smarty->template_dir = './themes/default/tpl/';
		$smarty->compile_dir = './themes/default/tpl/compile/';
		$smarty->cache_dir = './themes/default/tpl/cache/';
		$smarty->caching = false;
		$smarty->error_reporting = E_ALL; // LEAVE E_ALL DURING DEVELOPMENT
		$smarty->debugging = false;
		$smarty->assign('name', 'world');
		$smarty->display('index.tpl');

?>