<?php
   
function create_table_header($results)
{
    //echo '<hr>';
    //echo '<h2>Getting table header</h2>';
    $metadata = sqlsrv_field_metadata($results);
    //print_r($metadata);
    //echo '<h2>Complete</h2>';
    $table_header = '<table><thead><tr>';
    for($i = 0; $i < sqlsrv_num_fields($results); $i++)
    {
        //echo $metadata[$i]['Name'] . '<br>';
        $table_header .= "<th>{$metadata[$i]['Name']}</th>";
    }
    echo '<hr>';


    $table_header .= '</tr></thead>';
    return $table_header;
}

?>