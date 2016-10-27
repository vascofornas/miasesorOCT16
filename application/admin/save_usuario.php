<?php
include "../config.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$nivel_usuario = $_POST['nivel_usuario'];
$agencia_usuario = $_POST['agencia_usuario'];

$email = $_POST['email'];
$newid = uniqid(rand(), false);
$crud=$_POST['crud'];

if($crud=='N'){
	mysql_query("insert into members(id,nombre,apellidos,nivel_usuario,agencia_usuario,email) values('$newid','$nombre','$apellidos','$nivel_usuario','$agencia_usuario','$email')");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else if($crud == 'E'){
	mysql_query("update members set nombre='$nombre',apellidos='$apellidos',nivel_usuario='$nivel_usuario',agencia_usuario='$agencia_usuario',email='$email' where id= '".$id."'");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else{

	$result['error']='Invalid Order';
	$result['result']=0;
}
$result['crud']=$crud;
echo json_encode($result);

?>