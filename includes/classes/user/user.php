<?
class User {
	protected $mydb;
	protected $salt;
	function User(&$mydb,$salt){
		$this->mydb=$mydb;
		$this->salt=$salt;
		return true;
	}
	function isAuth(){
		if(!isset($_COOKIE["login"])||!isset($_COOKIE["password"])) return false;
		$data=$this->mydb->query("select password from cms_user where login=".$_COOKIE["login"]);
		if(count($data)==0) return false;
		if(md5(md5($data[0]['password'].$this->salt))!=$_COOKIE["password"]) return false;
		else return true;
	}
}
?>