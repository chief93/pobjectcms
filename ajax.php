<?
	if(!isset($_GET['module'])) {echo ""; exit();}
	$class_name=$_GET['module'];
	require_once('config/load.php');
	echo $system->load($class_name);
?>