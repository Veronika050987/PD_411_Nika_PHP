<?php

header("Content-type:text/css; charset=UTF-8");

$first_color = "lightskyblue";
$second_color = "pink";

echo __FILE__;

?>

body
{
	background-image: <?php echo "linear-gradient(to bottom right, $first_color, $second_color);"; ?>
}
form
{
	font-size:32px;
}