<?php
include "../config.php";

$id_licencia=$_POST['id_licencia'];
$query=mysql_query("select * from tb_licencias where id_licencia= '".$id_licencia."'");
$array = array();
while($data = mysql_fetch_array($query)){
	$array['id_licencia']= $data['id_licencia'];
	$array['cod_licencia']= $data['cod_licencia'];
	$array['tipo_licencia']= $data['tipo_licencia'];
	$array['agencia_licencia']= $data['agencia_licencia'];
	

}
echo json_encode($array);

?>