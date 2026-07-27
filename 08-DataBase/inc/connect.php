<?php
$server_name = "LAPTOP-4AUB2J6T\SQLEXPRESS";
$connection_info = array("Database" => "PD_321", "UID" => "PHP", "PWD" => "111", "CharacterSet" => "UTF-8");
$connection = sqlsrv_connect($server_name, $connection_info);

var_dump($connection);
?>