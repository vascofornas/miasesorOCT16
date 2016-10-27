<?php
include "../config.php";

function get_agencia($agencia){
$query=mysql_query("SELECT * FROM tb_agencias WHERE id_agencia = '".$agencia."'") ;
$data = array();
while($r = mysql_fetch_assoc($query)) {
	$data[] = $r;
}
$i=0;
foreach ($data as $key) {
	// add new button
	$nombre_agencia = $data[$i]['nombre_agencia'] ;
	$i++;
}
return $nombre_agencia;
}
?>
                        