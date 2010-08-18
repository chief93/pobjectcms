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
		$data=$this->mydb->query("select password from users where login='".$_COOKIE["login"]."'");
		if(count($data)==0) return false;
		if(md5(md5($_COOKIE["password"].$this->salt))!=$data[0]['password']) return false;
		else return true;
	}
	function getAccess(){
		if($this->isAuth()) return 1;
		else return 0;
	}
	function getUserInfo(){
		if($this->isAuth()) return array('login'=>"".$_COOKIE["login"]."",'email'=>"".$_COOKIE["email"]."");
		else return array('login'=>'Guest','email'=>'');
	}
	function authTry($a,$b){
		$data=$this->mydb->query("select password from users where login='".$a."'");
		if(count($data)==0) $this->message(3);
		if(md5(md5($b.$this->salt))!=$data[0]['password']) $this->message(3);
		setcookie ("login", $a,time()+36000);
		setcookie ("password", $b,time()+36000);
		$this->message(0);
	}
	function message($text){
		echo $text;
		exit();
	}
	function regTry($a,$b,$c){
		$data=$this->mydb->query("select id from users where login='".$a."'");
		if(count($data)!=0) $this->message(7);
		$pass=md5(md5($b.$this->salt));
		$this->mydb->query("insert into users values('','".$a."','".$pass."','".$c."')");
		setcookie ("login", $a,time()+36000);
		setcookie ("password", $b,time()+36000);
		$this->message(0);
	}
	function user_logout(){
		setcookie ("login","");
		setcookie ("password","");
	}
}
?>