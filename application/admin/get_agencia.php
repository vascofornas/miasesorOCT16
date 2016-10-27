<?php
include "../config.php";

$id_agencia=$_POST['id_agencia'];
$query=mysql_query("select * from tb_agencias where id_agencia= '".$id_agencia."'");
$array = array();
while($data = mysql_fetch_array($query)){
	$array['id_agencia']= $data['id_agencia'];
	$array['codigo_agencia']= $data['codigo_agencia'];
	$array['nombre_agencia']= $data['nombre_agencia'];
	
	

}
echo json_encode($array);

?>