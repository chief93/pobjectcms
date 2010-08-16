<?
class Database {
 
	var $link;
	var $active;
	var $host;
	var $login;
	var $password;
	var $database;
 
	function Database() {
		$this->host="localhost";
		$this->login="";
		$this->password="";
		$this->database="";
		$this->active=0; 		
	}
	function connect(){
		$this->link = new mysqli($this->host,$this->login,$this->password,$this->database); 
  		if (mysqli_connect_errno()) { 
			printf("SQL connection error: %s\n", mysqli_connect_error()); 
			exit; 
		} 
		$this->link->set_charset("utf8");
		$this->active=1;
	}
	function query($query){
		if($this->active==0) $this->connect();
		$result = $this->link->query($query);
  
		if($result != false){
			
$array=explode(" ",$query);
			
switch($array[0]){
  case 'ALTER':;
  case 'alter':;
  case 'DROP':;
  case 'drop':; case 'USE':;
  case 'use':;
  
				case 'CREATE':;
  case 'create':;
  case 'INSERT':;
  case 'insert':;
  case 'UPDATE':;
  case 'update':;
  case 'delete':;
  
				case 'DELETE': $outcome=$result; break;
  
				case 'SHOW':;
  case 'show':;
  case 'SELECT':;
  case 'select':  
					if($array[1]=='count(*)'||$array[1]=='COUNT(*)'){
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
  
				default: break;
 
			}
  
		}
  
		else{ echo "SQL connection error";echo $query;exit();} 
  
		return $outcome; 
 
}
	
function insert_id(){
		return $this->link->insert_id;
	}
}

?>