<?
class Forms {
	protected $fields;
	function Forms(&$mydb){
		$this->mydb=&$mydb;
		return true;
	}
	function check_form($array,$module_name,$table){
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
		foreach($array as $id => $value){
			if($this->fields[$id]['empty_check']=="1"&&$value=="") return $this->fields[$id]['error_empty_text'];
			if($this->fields[$id]['unoriginal_check']=="1"){
				$data=$this->mydb->query("select count(*) from ".$table." where ".$id."='".$value."'");
				if($data>0) return $this->fields[$id]['error_unoriginal_text'];
			}
			if($this->fields[$id]['equality_check']!=""){
				if($value!=$array[$this->fields[$id]['equality_check']]) return $this->fields[$id]['error_equality_text'];
			}	
			if($this->fields[$id]['regular_check']!=""){
				if(!preg_match($this->fields[$id]['regular_check'],$value)) return $this->fields[$id]['error_regular_text'];
			}
			
		}
		return 0;
	}
	function check_data_inc($array,$table){
		$where="";
		foreach($array as $id => $value)
			if($where=="") $where="where ".$id."='".$value."'";
			else $where.=" and ".$id."='".$value."'";
		$data=$this->mydb->query("select count(*) from ".$table." ".$where);
		return $data;
	}
}
?>