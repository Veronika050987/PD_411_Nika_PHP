<?php
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/create_table_row.php';


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

$results = sqlsrv_query($connection, $query);



echo '<tbody>';
while($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC))
{
    echo create_table_row($row);
}
echo '</tbody>';

require_once __DIR__ . '/disconnect.php';

?>