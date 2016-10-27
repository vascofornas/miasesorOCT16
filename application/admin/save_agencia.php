<?php
include "../config.php";

$id_agencia = $_POST['id_agencia'];
$codigo_agencia = $_POST['codigo_agencia'];
$nombre_agencia = $_POST['nombre_agencia'];
$crud=$_POST['crud'];

if($crud=='N'){
	
	mysql_query("insert into tb_agencias(codigo_agencia,nombre_agencia) values('$codigo_agencia','$nombre_agencia')");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else if($crud == 'E'){
	mysql_query("update tb_agencias set codigo_agencia='$codigo_agencia',nombre_agencia='$nombre_agencia' where id_agencia= '".$id_agencia."'");
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