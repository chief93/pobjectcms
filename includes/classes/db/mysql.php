<?
class Database {
 
	var $link;
	var $active;
	var $host;
	var $login;
	var $password;
	var $database;
 	car $charset;
	function Database($host,$login,$password,$database,$charset) {
		$this->host=$host;
		$this->login=$login;
		$this->password=$password;
		$this->database=$database;
		$this->charset=$charset;
		$this->active=0; 		
	}
	function connect(){
		$this->link = new mysqli($this->host,$this->login,$this->password,$this->database); 
  		if (mysqli_connect_errno()) { 
			printf("SQL connection error: %s\n", mysqli_connect_error()); 
			exit; 
		} 
		$this->link->set_charset($charset);
		$this->active=1;
	}
	function query($query){
		if($this->active==0) $this->connect();
		$result = $this->link->query($query);
		if($result != false){
			$array=explode(" ",$query);
			$array[0]=strtolower($array[0]);			
			switch($array[0]){
				case 'show':;
				case 'select':  
				if($array[1]=='count(*)'){
					$counts=$result->fetch_row();
					$outcome=$counts[0];
				}
				else {
					if($result->num_rows > 0){
						while($data = $result->fetch_assoc()){
							$outcome[]=$data;
						}
					}
					else $outcome=Array();
				} break;
				default: $outcome=$result; break; 
			}
		}
		else{ echo "SQL connection error";exit();} 
		return $outcome; 
}
	
function insert_id(){
		return $this->link->insert_id;
	}
}

?>