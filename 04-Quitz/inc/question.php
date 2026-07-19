<?php

require_once __DIR__ . '/data.php';

$number = isset($_REQUEST[`q`]) ? (int)$_REQUEST[`q`] : 0;

if ($number < count($questions)) {
    echo "<h2>{$questions[$number]}</h2>";
    echo "<form id=`quizForm`>";

    for ($i = 0; $i < count($answers[$number]); $i++) {
        echo "<input type=`radio` name=`q{$number} id=`{$number}_{$i}` value=`{$i}`>";
        echo "<label for=`{$number}_{$i}`> {$answers[$number][$i]}</label>;<br>";
    }
    echo "<input type=`button` value=`Prev` onclick=`prevQuestion()`>";
    echo "<input type=`button` value=`Next` onclick=`nextQuestion()`>";
    echo "</form>";
} else {
    echo "<h2>Вы ответили на все вопросы/</h2>";
    echo "<div id='result'></div>";

    echo "<script>
        function showResults(){
            let correctAnswers = " . json_encode($correct_answers) . ";
            
            
    </script>";
    echo "<input type=`submit` value=`Посмотреть результат` onclick=`showResults()`>";
}
?>