<?php
//phpinfo();

$server_name = "LAPTOP-4AUB2J6T\SQLEXPRESS";
$connection_info = array("Database" => "PD_321", "UID" => "PHP", "PWD" => "111", "CharacterSet" => "UTF-8");
$connection = sqlsrv_connect($server_name, $connection_info);

var_dump($connection);

$query = "SELECT * FROM Directions";
$results = sqlsrv_query($connection, $query);

var_dump($results);

echo '<table>';
echo '<tr>';
echo '<th>';
echo 'ID';
echo '</th>';

echo '<th>';
echo 'Направление обучения';
echo '</th>';


while($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC))
{
    echo '<tr>';
    echo '<td>';
    echo $row['direction_id'];
    echo '</td>';
    echo '<td>';
    echo $row["direction_name"];
    echo '</td>';
    echo '</tr>';
}

echo '</tr>';
echo '</table>';
?>