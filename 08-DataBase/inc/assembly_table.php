<?php

require_once __DIR__ . '/create_table_header.php';
require_once __DIR__ . '/create_table_row.php';

function assembly_table($results, $html_id)
{
    // 1. ЗАЩИТА: Если запрос ранее упал и вернул false, немедленно прерываем работу
    if ($results === false || !is_resource($results)) {
        return "<p style='color:red; font-weight:bold;'>
                 Ошибка: Невозможно собрать таблицу, так как SQL-запрос вернул false или некорректен.
                </p>";
    }

    $table_header = create_table_header($results, $html_id);
    $table_footer = '</table>';
    $table_body = "<tbody>";
    while($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC))
    {
        $table_body .= create_table_row($row); 
    }
    $table_body .= '</tbody>';

    $table = "{$table_header}{$table_body}{$table_footer}";
    return $table;
}

?>