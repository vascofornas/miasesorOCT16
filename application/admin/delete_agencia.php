<?php
include "../config.php";

$id_agencia = $_POST['id_agencia'];

mysql_query("delete from tb_agencias where id_agencia= '".$id_agencia."'");
if(mysql_error()){
	$result['error']=mysql_error();
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);

?>