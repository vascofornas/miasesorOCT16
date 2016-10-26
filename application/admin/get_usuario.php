<?php
include "../config.php";

$id=$_POST['id'];
$query=mysql_query("select * from members where id= '".$id."'");
$array = array();
while($data = mysql_fetch_array($query)){
	$array['id']= $data['id'];
	$array['nombre']= $data['nombre'];
	$array['apellidos']= $data['apellidos'];
	

}
echo json_encode($array);

?>