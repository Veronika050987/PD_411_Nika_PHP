<?php
setcookie('return', 0, time() - 3600);
echo "Должно было сбросить, но это не точно";
?>