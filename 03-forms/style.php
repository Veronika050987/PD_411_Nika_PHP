<?php

header("Content-type:text/css; charset=UTF-8");

$first_color = "lightskyblue";
$second_color = "pink";
$but = "white";
$but_font = "#008000";
$but_hover = "#66CDAA";
$text = "#7B68EE";

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
input
{
	color: <?php echo $text; ?>;
}
button
{
	color: <?php echo $but; ?>;
	background-color: <?php echo $but_font; ?>;
	cursor: pointer;
	border-raduis: 10px;
}
button:hover
{
	background-color: <?php echo $but_hover; ?>;
}