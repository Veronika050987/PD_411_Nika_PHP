<?php

echo '<pre>';
#echo $_GET['last_name'];
#echo $_GET['first_name'];
#echo $_GET['email'];

/*echo <<<INFO
$_GET[last_name]
$_GET[first_name]
$_GET[email]
\n
INFO;

print_r($_GET);

foreach($_GET as $value)
    {
        echo "$value\t";
    }
echo "\n";

for($i=0; $i<count($_GET); $i++)
    echo $_GET[$i];

echo '</pre>';
*/

echo '<pre>';
print_r($_POST);
echo '</pre>';

?>