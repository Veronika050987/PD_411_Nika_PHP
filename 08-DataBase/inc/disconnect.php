<?php

global $results, $connection;
if (isset($results)) {
    sqlsrv_free_stmt($results);
}
if (isset($connection)) {
    sqlsrv_close($connection);
}
    
?>