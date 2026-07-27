<?php
require_once __DIR__ . '/create_table_row.php';

$server_name = "LAPTOP-4AUB2J6T\SQLEXPRESS";
$connection_info = array("Database" => "PD_321", "UID" => "PHP", "PWD" => "111", "CharacterSet" => "UTF-8");
$connection = sqlsrv_connect($server_name, $connection_info);

$query =
    "
    SELECT
            group_id        AS N'ID',
            group_name      AS N'Название группы',
            COUNT(stud_id)  AS N'Количество студентов',
            direction_name  AS N'Направление обучения'
    FROM    Students
    JOIN    Groups          ON ([group]=[group_id])
    JOIN    Directions      ON (direction=direction_id) 
    GROUP BY    group_id, group_name, direction_name;
";

$result = sqlsrv_query($connection, $query);



echo '<tbody>';
while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
{
    echo create_table_row($row);
}
echo '</tbody>';

sqlsrv_free_stmt($result);
sqlsrv_close($connection);

?>