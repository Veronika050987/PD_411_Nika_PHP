<?php
session_start();

$questions = ["Вопрос 1", "Вопрос 2", "Вопрос 3", "Вопрос 4", "Вопрос 5"];
$answers = [
    ['Bethesda', 'Crytek', 'Rockstar', 'Remedy'], // 3 
    ['Cryengine 3', 'Crytek', 'Cryengine 5', 'RAGE'], // 0
    ['Max Payne', 'Tommy Vercetty', 'Ricardo Diaz', 'None'], // 1
    ['2003', '2012', '2013', '2015'], // 2
    ['Cryengine 3', 'Crytek', 'Cryengine 5', 'RAGE'], // 1
];

$correct_answers = [3, 0, 1, 2, 1];

// 2. ИНИЦИАЛИЗАЦИЯ
if (!isset($_SESSION["score"])) 
{
    $_SESSION["score"] = 0;
    $_SESSION["number"] = 0;
}

// 3. ОБРАБОТКА ОТВЕТА
if (isset($_POST['answer'])) 
{
    $current = $_SESSION["number"];
    // Получаем индекс выбранного ответа из POST (например, "3_0" -> 0)
    list($qIdx, $aIdx) = explode('_', $_POST['answer']);

    // Сравниваем выбранный индекс с правильным
    if ((int) $aIdx === $correct_answers[$current]) {
        $_SESSION["score"] += 1;
    }

    $_SESSION["number"] += 1; // Переход к следующему
}

// 4. ВЫВОД
$number = $_SESSION["number"];

if ($number < count($questions)) {
    echo "<h2>" . $questions[$number] . "</h2>";
    echo "<form method='POST'>";

    for ($i = 0; $i < count($answers[$number]); $i++) {
        // value передаем как "номерВопроса_номерОтвета"
        $val = "{$number}_{$i}";
        echo "<input type='radio' name='answer' id='{$val}' value='{$val}' required>";
        echo "<label for='{$val}'> {$answers[$number][$i]}</label><br>";
    }

    echo "<br><input type='submit' value='Следующий вопрос'>";
    echo "</form>";
    echo "Текущий счет: " . $_SESSION["score"];

} else {
    // 5. РЕЗУЛЬТАТ
    echo "<h2>Тест завершен!</h2>";
    echo "<p>Ваш результат: " . $_SESSION["score"] . " из " . count($questions) . "</p>";

    if (isset($_POST['reset'])) {
        session_destroy();
        header("Refresh:0");
    }
    echo "<form method='POST'><input type='submit' name='reset' value='Начать заново'></form>";
}

//$number = $_REQUEST['q'];
//$answer;

//shuffle($questions);

//if ($number < count($questions)) {
//    echo $number;
//    $response = "<h2>{$questions[$number]}</h2>";
//    for ($i = 0; $i < count($answers[$number]); $i++) {
//        $response .= "<input type=\"radio\" id=\"{$number}_{$i}\" value=\"{$number}_{$i}\">";
//        $response .= "<label for=\"{$number}_{$i}\">\"{$answers[$number][$i]}\"</label>;<br>";
//    }
//    $response .= "<input type=\"button\" value=\"Prev\" onclick=\"prevQuestion()\">";
//    $response .= "<input type=\"button\" value=\"Next\" onclick=\"nextQuestion()\">";
//    echo $response;
//} 
//else {
//    $response = "<h2>Вы ответили на все вопросы/</h2>";
//    $response .= "<input type=\"submit\" value=\"Посмотреть результат\">";
//    echo $response;
//}

?>