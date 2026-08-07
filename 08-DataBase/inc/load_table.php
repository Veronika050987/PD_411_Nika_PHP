<?php
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/assembly_table.php';

echo '<pre>';
print_r($_GET);
print_r($_REQUEST);
echo '</pre>';

$query = file_get_contents(__DIR__ . '/../SQL/' . $_REQUEST['q']);
if(isset($_REQUEST['filter']))
{
    $filter = $_REQUEST['filter'];
    $query .= " WHERE {$filter}";
    echo "<script>alert({$filter})</script>";
}

echo '<pre>';
echo '<h2>QUERY TEXT:</h2>';
echo $query;
echo '</pre>';
//"
//    SELECT
//            group_id        AS N'ID',
//            group_name      AS N'Название группы',
//            COUNT(stud_id)  AS N'Количество студентов',
//            direction_name  AS N'Направление обучения'
//    FROM    Students
//    JOIN    Groups          ON ([group]=[group_id])
//    JOIN    Directions      ON (direction=direction_id) 
//    GROUP BY    group_id, group_name, direction_name;
//";

$results = sqlsrv_query($connection, $query);
$html_id = $_REQUEST['html_id'];
require_once(__DIR__ . "/combo_box.php");
echo assembly_table($results, $html_id);
/*echo '<tbody>';
while($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC))
{
    echo create_table_row($row);
}
echo '</tbody>';*/

require_once __DIR__ . '/disconnect.php';

?>