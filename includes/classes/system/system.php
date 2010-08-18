<?
class System {
	var $user;	
	var $mydb;
	var $smarty; 
	var $js;
	var $css;
	function System(){
		require_once(SMARTY_DIR . 'Smarty.class.php');
		require_once(MYSQL_DIR . 'mysql.php');
		require_once(USER_DIR . 'user.php');
		$this->smarty = new Smarty;
		$this->smarty->template_dir = TMPL_DIR;
		$this->smarty->debugging = TMPL_DEBUG;
		$this->smarty->caching = TMPL_CACHING;
		$this->smarty->cache_lifetime = TMPL_CACHE_LIFETIME;
		$this->smarty->cache_dir = TMPL_CACHE_DIR;
		$this->smarty->allow_php_tag = TMPL_ALLOW_PHP;
		$this->smarty->compile_dir = TMPL_COMPILE_DIR;
		$this->mydb=new Database(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE,MYSQL_CHARSET,MYSQL_PREFIX);
		$this->user=new User($this->mydb,USER_SALT);
		$this->js=$this->load_res("js");
		$this->css=$this->load_res("css");
		return true;
	}
	function load($class_name,$settings=""){
		require_once("modules/".$class_name."/index.php");
		$object=new $class_name();
		$object->load($class_name,$settings,$this->mydb,$this->smarty,$this->user,$this->js,$this->css);
		return $object->execute();
	}
	protected function load_res($type){
		$arr=array();
		$folder="tmpl/system/".$type."/";
		if (is_dir($folder)){
			if ($dir = opendir($folder)){
				while (false !== ($file = readdir($dir))){
					if (end(explode(".", $file))==$type){ 
						$arr[]="/".$folder.$file;
					}
				}
			}
		}
		return $arr;
	}
}
?>