<?php
include "../config.php";
$query=mysql_query("SELECT @rownum := @rownum + 1 AS urutan,t.*,r.*
	FROM tb_licencias t LEFT JOIN tb_agencias r ON t.agencia_licencia = r.id_agencia , 
	(SELECT @rownum := 0) r") ;
$data = array();
while($r = mysql_fetch_assoc($query)) {
	$data[] = $r;
}
$i=0;
foreach ($data as $key) {
		// add new button
	$data[$i]['button'] = '<button type="submit" id_licencia="'.$data[$i]['id_licencia'].'" class="btn btn-primary btnedit" ><i class="fa fa-edit"></i></button> 
							   <button type="submit" id_licencia="'.$data[$i]['id_licencia'].'" cod_licencia="'.$data[$i]['cod_licencia'].'" class="btn btn-primary btnhapus" ><i class="fa fa-remove"></i></button>';
	$i++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>