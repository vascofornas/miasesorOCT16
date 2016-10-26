<?php
include "../config.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];

$crud=$_POST['crud'];
$newid = uniqid(rand(), false);
if($crud=='N'){
	mysql_query("insert into members(id,nombre,apellidos) values('$newid',$nombre','$apellidos')");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else if($crud == 'E'){
	mysql_query("update members set nombre='$nombre',apellidos='$apellidos' where id=$id");
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