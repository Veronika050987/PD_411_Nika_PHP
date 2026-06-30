<?php

header("Content-type: text/css; charset=UTF-8");

$primaryColor	= "#4682B4";
$secondColor	= "#6495ED";
$thirdColor		= "#4B0082";

?>

body {

}
h1
{
	color: <?php echo $primaryColor; ?>;
}

h2
{
	color: <?php echo $secondColor; ?>;
}
summary
{
	color: <?php echo $thirdColor; ?>;
}
hr
{
	border: none;
    height: 1px;
    background-color: #9932CC;
    margin: 20px 0;
}