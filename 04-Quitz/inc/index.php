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
    ['Max Payne', 'Tommy Vercetty', 'Ricardo Diaz', ' Winnie-the-Pooh'],
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
<head><title>Тест</title>
   <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>

	<style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');

        body {
            font-family: Roboto Condensed;
            font-size: 20px;
        }

        body.light {
            background-color: #E0FFFF;
            color: #191970;
        }
        body.dark {
            background-color: #483D8B;
            color: #F0F8FF;
        }
		body{ transition: background-color 0.3s, color 0.3s; }

        .reset-button
        {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }

		.theme-toggle-button 
		{
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 10px; 
            font-size: 18px;
        }

        body.light .theme-toggle-button
        {
            background-color: #4682B4;
            color: #F0F8FF;
        }

        body.dark .theme-toggle-button
        {
            background-color: #7FFFD4;
            color: #191970;
        }
        body.light .theme-toggle-button:hover {
            background-color: #191970;
            color: #F0F8FF;
        }

        body.dark .theme-toggle-button:hover {
            background-color: #40E0D0;
            color: #191970;
        }
        div
        {
            margin: 0;
            height: 10vh;
            display: grid;
            place-items: center;
        }
            div .theme-toggle-button 
            {
                margin: 230px;
                place-items: center;
            }
        .answers-container
        {
            display: flex;
            flex-direction: column;
            margin: 0 auto;
            width: fit-content;
            gap: 10px;
        }
        .answers-item
        {
            align-self: flex-start;
            display: flex;
            align-items: center;
        }
	</style> 
</head>
<body class="light">
    <div> 
    <?php if ($n < count($questions)): ?>
        <h2>Вопрос <?php echo ($n + 1); ?> из <?php echo count($questions); ?></h2>
        <p><?php echo $questions[$n]; ?></p>
        
        <form method="POST">
            <div class="answers-container">
            <?php foreach ($answers[$n] as $i => $text): ?>
                <div class="answers-item">
                <input type="radio" name="answer" id="a<?php echo $i; ?>" value="<?php echo $i; ?>" 
                    <?php echo (isset($_SESSION["user_answers"][$n]) && $_SESSION["user_answers"][$n] == $i) ? 'checked' : ''; ?> required>
                <label for="a<?php echo $i; ?>"><?php echo $text; ?></label><br>
                </div>
            <?php endforeach; ?>
            </div>
            <br>
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
    </div>
    <br>
    <div><button onclick='toggle_theme()' class="theme-toggle-button">Сменить тему</button></div>
    <script>
		 // Функция применения темы
        function apply_theme(scheme) {
            document.body.className = scheme;
        }

        // Функция переключения
        function toggle_theme() {
            let current = Cookies.get("color_scheme") || "light";
            let next = (current === "dark") ? "light" : "dark";
            
            Cookies.set("color_scheme", next, { expires: 365 });
            apply_theme(next);
        }
        // Функция сброса
        function ResetCookies() {
{
                Cookies.remove("color_scheme");
                // Возвращаем к системной настройке после сброса
                let systemScheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                apply_theme(systemScheme);
                alert("Настройки сброшены");
            };
        }

        //Инициализация при загрузке
        (function() {
            let saved = Cookies.get("color_scheme");
            if (saved) {
                apply_theme(saved);
            } else {
                let system = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                apply_theme(system);
            }
        })();
	</script>
</body>
</html>