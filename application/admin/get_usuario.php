<?php
include "../config.php";

$id=$_POST['id'];
$query=mysql_query("select * from members where id= '".$id."'");
$array = array();
while($data = mysql_fetch_array($query)){
	$array['id']= $data['id'];
	$array['nombre']= $data['nombre'];
	$array['apellidos']= $data['apellidos'];
	$array['nivel_usuario']= $data['nivel_usuario'];
	$array['agencia_usuario']= $data['agencia_usuario'];
	$array['email']= $data['email'];
	$array['cargo_usuario']= $data['cargo_usuario'];
	$array['licencia_usuario']= $data['licencia_usuario'];
	$array['verified']= $data['verified'];
	$array['tel']= $data['tel'];

}
echo json_encode($array);

?>