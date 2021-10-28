<?php
	$database="registro_empleados";
	$user='root';
	$password='';

try {	
	$con=new PDO('mysql:host=localhost:33065;dbname='.$database,$user,$password);
} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}
?>