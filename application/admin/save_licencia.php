<?php
include "../config.php";

$id_licencia = $_POST['id_licencia'];
$cod_licencia = $_POST['cod_licencia'];
$tipo_licencia = $_POST['tipo_licencia'];
$agencia_licencia = $_POST['agencia_licencia'];
$crud=$_POST['crud'];

if($crud=='N'){
	
	mysql_query("insert into tb_licencias(cod_licencia,tipo_licencia,agencia_licencia) values('$cod_licencia','$tipo_licencia','$agencia_licencia')");
	if(mysql_error()){
		$result['error']=mysql_error();
		$result['result']=0;
	}else{
		$result['error']='';
		$result['result']=1;
	}
}else if($crud == 'E'){
	mysql_query("update tb_licencias set cod_licencia='$cod_licencia',tipo_licencia='$tipo_licencia',agencia_licencia='$agencia_licencia' where id_licencia= '".$id_licencia."'");
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