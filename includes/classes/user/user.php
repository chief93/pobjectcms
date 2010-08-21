<?
class User {
	protected $mydb;
	public $salt;
	protected $fields;
	protected $errors;
	function User(&$mydb,$salt){
		$this->errors=0;
		$this->mydb=&$mydb;
		$this->salt=$salt;
		return true;
	}
	function load_register_settings(){
		$json_data=array("login"=>array("empty_check"=>"1","unoriginal_check"=>"1","error_empty_text"=>"Логин не указан","error_unoriginal_text"=>"Этот логин уже занят"),"password"=>array("empty_check"=>"1","unoriginal_check"=>"1","error_empty_text"=>"Пароль не указан"),"password2"=>array("empty_check"=>"1","equality_check"=>"1","equality_name"=>"password","error_equality_text"=>"Пароли не совпадают","error_empty_text"=>"Дополнительный пароль не указан"),"email"=>array("empty_check"=>"1","unoriginal_check"=>"1","error_empty_text"=>"Email не указан","error_unoriginal_text"=>"Этот email уже занят"));
		$json=json_encode($json_data);
		$this->fields=json_decode($json);
		$this->errors=1;
	}
	function isAuth(){
		if(!isset($_COOKIE["login"])||!isset($_COOKIE["password"])||!isset($_COOKIE["access"])) return false;
		$data=$this->mydb->query("select password from users where login='".$_COOKIE['login']."' and access=".(int)$_COOKIE['access']);
		if(count($data)==0) return false;
		if($_COOKIE["password"]!=$data[0]['password']) return false;
		else return true;
	}
	function getAccess(){
		if($this->isAuth()) return $_COOKIE["access"];
		else return 0;
	}
	function getUserInfo(){
		if($this->isAuth()) return array('login'=>"".$_COOKIE["login"]."",'email'=>"".$_COOKIE["email"]."");
		else return array('login'=>'Guest','email'=>'');
	}
	function message($text){
		echo $text;
		exit();
	}
	function login($login,$password,$access){
			setcookie ("login", $login,time()+36000);
			setcookie ("password", $password,time()+36000);
			setcookie ("access", $access,time()+36000);
	}
	function logout(){
			setcookie ("login", "");
			setcookie ("password", "");
			setcookie ("access", "");
	}
}
?>