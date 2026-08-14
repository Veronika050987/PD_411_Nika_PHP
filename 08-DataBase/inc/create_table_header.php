<?php
   
function create_table_header($results, $html_id)
{
    // 1. ЗАЩИТА: проверяем, что передан валидный ресурс, а не false
    if ($results === false || !is_resource($results)) {
        // Выводим ошибку SQL Server, чтобы сразу понять, почему запрос не сработал
        $error_message = "<p style='color:red;'>Ошибка: Передан неверный ресурс запроса в create_table_header.</p>";
        if (function_exists('sqlsrv_errors')) {
            $error_message .= "<pre>" . print_r(sqlsrv_errors(), true) . "</pre>";
        }
        return $error_message;
    }

    $metadata = sqlsrv_field_metadata($results);

    // Если метаданные не прочитались, тоже защищаем код от падения
    if ($metadata === false) {
        return "<p style='color:red;'>Ошибка получения метаданных колонок.</p>";
    }

    $table_header = "<table id=\"{$html_id}\"><thead><tr>";

    $num_fields = sqlsrv_num_fields($results);
    for($i = 0; $i < $num_fields; $i++)
    {
        //echo $metadata[$i]['Name'] . '<br>';
        $table_header .= "<th>{$metadata[$i]['Name']}</th>";
    }
    echo '<hr>';


    $table_header .= '</tr></thead>';
    return $table_header;
}

?>