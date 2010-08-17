<?
class User {
	protected $mydb;
	protected $salt;
	function User(&$mydb,$salt){
		$this->mydb=&$mydb;
		$this->salt=$salt;
		return true;
	}
	function isAuth(){
		if(!isset($_COOKIE["login"])||!isset($_COOKIE["password"])) return false;
		$data=$this->mydb->query("select password from users where login=".$_COOKIE["login"]);
		if(count($data)==0) return false;
		if(md5(md5($data[0]['password'].$this->salt))!=$_COOKIE["password"]) return false;
		else return true;
	}
	function getUserInfo(){
		if($this->isAuth) return array('login'=>"".$_COOKIE["login"]."",'email'=>"".$_COOKIE["email"]."");
		else return array('login'=>'Guest','email'=>'');
	}
	function authTry($a,$b){
		$data=$this->mydb->query("select password from users where login='".$a."'");
		if(count($data)==0) $this->message(3);
		if(md5(md5($data[0]['password'].$this->salt))!=$b) $this->message(3);
		setcookie ("login", $a,time()+36000);
		setcookie ("password", $b,time()+36000);
		$this->message(0);
	}
	function message($text){
		echo $text;
		exit();
	}
}
?>