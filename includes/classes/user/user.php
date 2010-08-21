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
	function message($text){
		echo $text;
		exit();
	}
	function regTry($array,$module_name){
		$data=$this->mydb->query("select * from form_rules where module_name='".$module_name."'");
		$arr=array();
		foreach($data as $d){
			$arr[$d['field_name']]['empty_check']=$d['empty_check'];
			$arr[$d['field_name']]['error_empty_text']=$d['empty_check_error_text'];
			$arr[$d['field_name']]['unoriginal_check']=$d['unoriginal_check'];
			$arr[$d['field_name']]['error_unoriginal_text']=$d['unoriginal_check_error_text'];
			$arr[$d['field_name']]['equality_check']=$d['equality_check'];
			$arr[$d['field_name']]['error_equality_text']=$d['equality_check_error_text'];
			$arr[$d['field_name']]['regular_check']=$d['regular_check'];
			$arr[$d['field_name']]['error_regular_text']=$d['regular_check_error_text'];
		}
		$this->fields=$arr;
		//print_r($this->fields['login']);
		foreach($array as $id => $value){
			if($this->fields[$id]['empty_check']=="1"&&$value=="") $this->message($this->fields[$id]['error_empty_text']);
			if($this->fields[$id]['unoriginal_check']=="1"){
				$data=$this->mydb->query("select count(*) from users where ".$id."='".$value."'");
				if($data>0) $this->message($this->fields[$id]['error_unoriginal_text']);
			}
			if($this->fields[$id]['equality_check']!=""){
				if($value!=$array[$this->fields[$id]['equality_check']]) $this->message($this->fields[$id]['error_equality_text']);
			}	
			if($this->fields[$id]['regular_check']!=""){
				if(!preg_match($this->fields[$id]['regular_check'],$value)) $this->message($this->fields[$id]['error_regular_text']);
			}
			
		}
		echo "ok";
	}
	function user_logout(){
		setcookie ("login","");
		setcookie ("password","");
	}
}
?>