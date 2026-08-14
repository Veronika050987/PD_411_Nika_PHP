<?php
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/assembly_table.php';

echo '<pre>';
print_r($_GET);
print_r($_REQUEST);
echo '</pre>';

$base_query = file_get_contents(__DIR__ . '/../SQL/' . $_REQUEST['q']);

if(isset($_REQUEST['filter']) && !empty($_REQUEST['filter']))
{
    $filter = $_REQUEST['filter'];

    if (strpos($filter, "'") !== false && strpos($filter, "N'") === false) {
        $filter = str_replace("='", "=N'", $filter);
    }

    $query .= "SELECT * FROM ({$base_query}) AS SubQuery WHERE {$filter}";
    echo "<script>alert('" . addslashes($filter) . "')</script>";
} else {
    $query = $base_query;
}

echo '<pre>';
echo '<h2>QUERY TEXT:</h2>';
echo htmlspecialchars($query);
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

if ($results === false) {
    echo "<h2 style='color:red;'>❌ Ошибка синтаксиса или выполнения SQL-запроса!</h2>";
    echo "<pre>";
    print_r(sqlsrv_errors());
    echo "</pre>";

    // Закрываем подключение и выходим, чтобы не вызывать assembly_table с ошибкой false
    require_once __DIR__ . '/disconnect.php';
    exit;
}

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