<?php
//phpinfo();
require_once __DIR__ . '/create_table_row.php';

$server_name = "LAPTOP-4AUB2J6T\SQLEXPRESS";
$connection_info = array("Database" => "PD_321", "UID" => "PHP", "PWD" => "111", "CharacterSet" => "UTF-8");
$connection = sqlsrv_connect($server_name, $connection_info);

var_dump($connection);

if ($connection === false) 
{
    die(print_r(sqlsrv_errors(), true));
}

$query = "SELECT * FROM Directions";

// Выполняем запрос
$results = sqlsrv_query($connection, $query);

if ($results === false)
{
    die(print_r(sqlsrv_errors(), true));
}

$table_header_html = '<table><thead><tr>';

// Получаем метаданные полей запроса. Это массив, где каждый элемент описывает одно поле.
$field_metadata = sqlsrv_field_metadata($results);

if ($field_metadata) 
{
    foreach ($field_metadata as $field)
    {
        $table_header_html .= '<th>' . htmlspecialchars($field['Name']) . '</th>';
    }
} else $table_header_html .= '<th>Ошибка получения имен полей</th>';

$table_header_html .= '</tr></thead>';

$table_body_html = '<tbody>';

// Перебираем строки результатов запроса
while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) 
{
    $table_body_html .= create_table_row($row);
}

$table_body_html .= '</tbody>';

$table_footer_html = '</table>';

$full_table_html = "{$table_header_html}{$table_body_html}{$table_footer_html}";

// Выводим готовую HTML-таблицу
echo $full_table_html;

// --- Очистка ресурсов ---
sqlsrv_free_stmt($results);

sqlsrv_close($connection);

?>