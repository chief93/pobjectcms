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
		$json_data=array("login"=>array("empty_check"=>"1","unoriginal_check"=>"1","error_empty_text"=>"Р›РѕРіРёРЅ РЅРµ СѓРєР°Р·Р°РЅ","error_unoriginal_text"=>"Р­С‚РѕС‚ Р»РѕРіРёРЅ СѓР¶Рµ Р·Р°РЅСЏС‚"),"password"=>array("empty_check"=>"1","unoriginal_check"=>"1","error_empty_text"=>"РџР°СЂРѕР»СЊ РЅРµ СѓРєР°Р·Р°РЅ"),"password2"=>array("empty_check"=>"1","equality_check"=>"1","equality_name"=>"password","error_equality_text"=>"РџР°СЂРѕР»Рё РЅРµ СЃРѕРІРїР°РґР°СЋС‚","error_empty_text"=>"Р”РѕРїРѕР»РЅРёС‚РµР»СЊРЅС‹Р№ РїР°СЂРѕР»СЊ РЅРµ СѓРєР°Р·Р°РЅ"),"email"=>array("empty_check"=>"1","unoriginal_check"=>"1","error_empty_text"=>"Email РЅРµ СѓРєР°Р·Р°РЅ","error_unoriginal_text"=>"Р­С‚РѕС‚ email СѓР¶Рµ Р·Р°РЅСЏС‚"));
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