<?
class User {
	protected $mydb;
	protected $salt;
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
	function regTry($array){
		if(!$this->errors) $this->load_register_settings();
		$result=0;
		foreach($array as $param){
			$mod=$param[0];
			if($this->fields->$mod->empty_check=="1"&&$param[1]=="") $this->message($this->fields->$mod->error_empty_text);
			if($this->fields->$mod->unoriginal_check=="1"){
				$data=$this->mydb->query("select count(*) from users where ".$param[0]."='".$param[1]."'");
				if($data>0) $this->message($this->fields->$mod->error_unoriginal_text);
			}
			if($this->fields->$mod->equality_check=="1"){
				$mods=$this->fields->$mod->equality_name;
				if($param[1]!=$this->fields->$mods->value) $this->message($this->fields->$mod->error_equality_text);
			}
			$this->fields->$mod->value=$param[1];
		}
		echo "ok";
		
		//print_r($this->fields);
		//return count($parametrs);
	}
	function user_logout(){
		setcookie ("login","");
		setcookie ("password","");
	}
}
?>