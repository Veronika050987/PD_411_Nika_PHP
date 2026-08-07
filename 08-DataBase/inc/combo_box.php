<?php
    //require_once __DIR__ . '/connect.php';

    $combo_query = file_get_contents(__DIR__ . "/../SQL/directions.sql");
    $combo_items = sqlsrv_query($connection, $combo_query);

    echo '<h2>ComboBox</h2>';
    //echo '<pre>';
    //print_r($query);
    //print_r($results);
    //var_dump($results);
    //echo '</pre>';

    //$combo_box = "<form action=\"load_table.php\" method=\"post\">";
    $combo_box = "<select name=\"direction\" onchange=\"filterTable(event)\">";
    $combo_box .= "<option value=\"disabled\">---Выберите направление обучения---</option>";
    echo '<pre>';
    while($row = sqlsrv_fetch_array($combo_items, SQLSRV_FETCH_ASSOC))
    {  
        $combo_box .= "<option value=\"{$row['ID']}\">{$row['Направление обучения']}</option>";
        #print_r($row);
    }
    echo '</pre>';
    $combo_box .= "</select>";   
    //$combo_box .= "</form>";

    echo $combo_box;
    //require_once __DIR__ . '/disconnect.php';
?>