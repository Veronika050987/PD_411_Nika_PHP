<?php

    $queries = glob(__DIR__ . '/../SQL/*');

    //echo '<pre>';
    //print_r($queries);
//echo '</pre>';

    $menu = '';
    //$menu = '<nav>';
    foreach($queries as $query)
    {
        $item = explode('/', $query);
        $menu .= "<button id={$item[count($item) - 1]}>{$item[count($item) - 1]}</button>";
    }
    //$menu .= '</nav>';

    echo $menu;

?>