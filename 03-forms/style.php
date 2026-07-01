<?php

header("Content-type:text/css; charset=UTF-8");

$first_color = "lightskyblue";
$second_color = "pink";

?>

body
{
	background-image: linear-gradient(to bottom right, <?php echo $first_color; ?>, <?php echo $second_color; ?>);
	background-attachment: fixed;
}
form
{
	font-size:32px;
}