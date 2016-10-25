<?php
$host="localhost";
$user="miasesor_app";
$pwd="Papa020432";
$dbname="miasesor_app";

$link=mysql_connect($host,$user,$pwd);
$db = mysql_select_db($dbname,$link);
mysql_query("SET NAMES 'utf8'");
if(!$db) die("failed to connect to database.......");

?>