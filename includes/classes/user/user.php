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
		$str="login/2/password/1/password2/password/email/2";
		$settings_arr=explode("/",$str);
		$str="Логин не указан....Этот логин уже занят/Пароль не указан/Пароли не совпадают/Email не указан....Этот email уже занят";
		$txt_arr=explode("/",$str);
		$n=0;
		for($i=0;$i<count($settings_arr);$i+=2){
			$this->fields[$settings_arr[$i]][0]=$settings_arr[$i+1];
			if($settings_arr[$i+1]==2){
				$a=explode("....",$txt_arr[$n]);
				$this->fields[$settings_arr[$i]][1]=$a[0];
				$this->fields[$settings_arr[$i]][2]=$a[1];
			}
			else
				$this->fields[$settings_arr[$i]][1]=$txt_arr[$n];	
			$n++;
		}
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
		$str="login/2/password/1/password2/password/email/2";
		$str="Логин не указан....Этот логин уже занят/Пароль не указан/Пароли не совпадают/Email не указан....Этот email уже занят";
		
		$json_data=array("login"=>array("check"=>"2","empty_text"=>"heloрус"),"password"=>"123");
		print_r($json_data);
		echo json_encode($json_data);
		//$json_string='{"result":{"name":"123"},{"name":"124"}}';
		///$obj=json_decode($json_string);
		//$obj=$obj->result;
		//print_r($obj);
		/*
		if(!$this->errors) $this->load_register_settings();
		$result=0;
		foreach($array as $param){
			$mod=$param[0];
			if(($this->fields[$mod][0]==1||$this->fields[$mod][0]==2)&&$param[1]=="") $this->message($this->fields[$mod][1]);
			if($this->fields[$mod][0]==2){
				$data=$this->mydb->query("select count(*) from users where ".$param[0]."='".$param[1]."'");
				if($data>0) $this->message($this->fields[$mod][2]);
			}
			if(!is_numeric($this->fields[$mod][0])){
				if($param[1]!=$this->fields[$this->fields[$mod][0]][10]) $this->message($this->fields[$mod][1]);
			}
			$this->fields[$mod][10]=$param[1];
		}
		echo "ok";*/
		
		//print_r($this->fields);
		//return count($parametrs);
	}
	function user_logout(){
		setcookie ("login","");
		setcookie ("password","");
	}
}
?>