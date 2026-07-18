<?php

require_once __DIR__ . '/data.php';

$number = $_REQUEST['q'];
$answer;

if($number < count($questions))
{
	echo $number;
	$response = "<h2>{$questions[$number]}</h2>";
	for($i=0; $i < count($answers[$number]); $i++)
	{
		$response .= "<input type=\"radio\" id=\"{$number}_{$i}\" value=\"{$number}_{$i}\">";
		$response .= "<label for=\"{$number}_{$i}\">\"{$answers[$number][$i]}\"</label>;<br>";
	}
	$response .= "<input type=\"button\" value=\"Prev\" onclick=\"prevQuestion()\">";
	$response .= "<input type=\"button\" value=\"Next\" onclick=\"nextQuestion()\">";
	echo $response;
}
else
{
	$response = "<h2>Вы ответили на все вопросы/</h2>";
	$response .= "<input type=\"submit\" value=\"Посмотреть результат\">";
	echo $response;
}

?>