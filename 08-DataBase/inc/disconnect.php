<?php

// 1. Освобождаем память, только если запрос успешно выполнился и вернул ресурс
if (isset($results) && is_resource($results)) {
    sqlsrv_free_stmt($results);
}

// 2. Закрываем соединение, только если оно существует и является активным ресурсом
if (isset($connection) && is_resource($connection)) {
    sqlsrv_close($connection);
}
    
?>