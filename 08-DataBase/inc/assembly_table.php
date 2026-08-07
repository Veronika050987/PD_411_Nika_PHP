<?php

require_once __DIR__ . '/create_table_header.php';
require_once __DIR__ . '/create_table_row.php';

function assembly_table($results, $html_id)
{
    $table_header = create_table_header($results, $html_id);
    $table_footer = '</tr></table>';
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