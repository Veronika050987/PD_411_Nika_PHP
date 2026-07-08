<?php
/*echo '<pre>';
print_r($_POST);
echo '</pre>';*/
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/header.php';

$asked_questions = array_keys($_POST);
$user_answers = array_values($_POST);
$score = 0;
for($i=0; $i < count($user_answers); $i++)
{
    //$answer = explode('_', $user_answers[$i])[1];
    //$answer = $user_answers[$i][3];
    $answer = $user_answers[$i][strlen($user_answers[$i]) - 1];
    //echo $answer;
    if ($answer == $correct_answers[$i])$score++;

}
$score_message = "Correct answers: {$score}.";
//$receipient = 'kovtun_ol@t.top-academy.ru';
//$receipient = 'jv00000@pcma.tech';
$receipient = 'batumivice@yandex.ru';
$sender = 'nika@PD411.academy';
//$sender = 'veronicaviv@mail.ru';
//$headers = 'MIME-Version: 1.0\r\n';
//$headers = 'Content-type: text/html; charset=utf-8\r\n';
//$headers = "To: {$receipient}\r\n";
$headers = "From: {$sender}\r\n";

echo '<div class="result">';
echo $score_message;
echo '<br>';
echo mail($receipient, 'Test results', 
    $score_message, $headers);
echo '</div>';
require_once __DIR__ . '/footer.php';
?>