<?php
include "../config.php";

$id_licencia = $_POST['id_licencia'];

mysql_query("delete from tb_licencias where id_licencia= '".$id_licencia."'");
if(mysql_error()){
	$result['error']=mysql_error();
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);

?>