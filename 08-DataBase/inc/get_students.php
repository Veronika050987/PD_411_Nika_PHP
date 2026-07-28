<?php
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/assembly_table.php';


$query = file_get_contents(__DIR__ . '/../SQL/students.sql');
echo '<pre>';
echo $query;
echo '</pre>';
$query = preg_replace('/^\xEF\xBB\xBF/', '', $query);
$query = trim($query);

$stmt = sqlsrv_query($connection, $query);

if ($stmt === false) {
    // ВЫВОДИТ ОШИБКУ, ЕСЛИ ЗАПРОС НЕ ВЫПОЛНИЛСЯ
    echo "Ошибка SQL: ";
    print_r(sqlsrv_errors());
    exit;
}
//echo '<pre>';
//echo $query;
//echo '</pre>';

echo assembly_table($stmt);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // здесь ваш вывод строк таблицы
}
//$results = sqlsrv_query($connection, $query);


require_once __DIR__ . '/disconnect.php';

?>