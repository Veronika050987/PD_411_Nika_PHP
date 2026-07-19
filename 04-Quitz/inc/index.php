<?php
session_start();

// 1. НАСТРОЙКИ И ДАННЫЕ
$questions = [
    'Кто создал игру Max Payne?',
    'На каком движке создана игра Crysis 2?',
    'Как зовут главного персонажа Vice City?',
    'В каком году вышла GTA-V?',
    'На каком движке разработана GTA-V?'
];

$answers = [
    ['Bethesda', 'Crytek', 'Rockstar', 'Remady'],
    ['Cryengine 3', 'Crytek', 'Cryengine 5', 'RAGE'],
    ['Max Payne', 'Tommy Vercetty', 'Ricardo Diaz', 'None'],
    ['2003', '2012', '2013', '2015'],
    ['Cryengine 3', 'Crytek', 'Cryengine 5', 'RAGE'],
];

$correct_answers = [3, 0, 1, 2, 3];

// Инициализация
if (!isset($_SESSION["number"])) {
    $_SESSION["number"] = 0;
    $_SESSION["user_answers"] = [];
    $_SESSION["score"] = 0;
}

// 2. ОБРАБОТКА ОТПРАВКИ ОТВЕТА
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['answer'])) {
        $curr = $_SESSION["number"];
        $_SESSION["user_answers"][$curr] = (int) $_POST['answer'];
        $_SESSION["number"]++;
    }

    if (isset($_POST['prev'])) {
        $_SESSION["number"] = max(0, $_SESSION["number"] - 1);
    }

    if (isset($_POST['reset'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}

// 3. ВЫВОД
$n = $_SESSION["number"];
?>

<!DOCTYPE html>
<html>
<head><title>Тест</title></head>
<body>
    <?php if ($n < count($questions)): ?>
        <h2>Вопрос <?php echo ($n + 1); ?> из <?php echo count($questions); ?></h2>
        <p><?php echo $questions[$n]; ?></p>
        
        <form method="POST">
            <?php foreach ($answers[$n] as $i => $text): ?>
                <input type="radio" name="answer" id="a<?php echo $i; ?>" value="<?php echo $i; ?>" 
                    <?php echo (isset($_SESSION["user_answers"][$n]) && $_SESSION["user_answers"][$n] == $i) ? 'checked' : ''; ?> required>
                <label for="a<?php echo $i; ?>"><?php echo $text; ?></label><br>
            <?php endforeach; ?>
            
            <br>
            <?php if ($n > 0): ?>
                <button type="submit" name="prev">Назад</button>
            <?php endif; ?>
            <button type="submit">Далее</button>
        </form>

    <?php else: ?>
        <?php
        // Подсчет результата
        $score = 0;
        foreach ($correct_answers as $idx => $correct) {
            if (isset($_SESSION["user_answers"][$idx]) && $_SESSION["user_answers"][$idx] === $correct) {
                $score++;
            }
        }
        ?>
        <h2>Тест завершен!</h2>
        <p>Ваш результат: <?php echo $score; ?> из <?php echo count($questions); ?></p>
        <form method="POST"><button type="submit" name="reset">Начать заново</button></form>
    <?php endif; ?>
</body>
</html>