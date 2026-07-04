<?php
require_once __DIR__ . '/header.php';
$name = isset($_POST['first_name']) ? ($_POST['first_name']) : 'Гость';
$lastname = isset($_POST['last_name']) ? ($_POST['last_name']) : '';

echo "Привет, $name $lastname, приятного прохождения ;-)";
echo '<pre>';
print_r(ROOT . "\n");
echo $_SERVER['DOCUMENT_ROOT'];
echo '</pre>';

$score = 0;
$showResult = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $showResult = true;
    for ($i = 0; $i < count($questions); $i++) {
        // Проверяем, пришел ли ответ на вопрос с индексом $i
        if (isset($_POST["question_$i"])) {
            $userAnswer = (int) $_POST["question_$i"];
            // Сравниваем с массивом правильных ответов
            if ($userAnswer === $correct_answers[$i]) {
                $score++;
            }
        }
    }
}
?>

<?php if ($showResult == false || $i == 0): ?>
    <div class="result-message">
        <!--<h2>Вы набрали <?= $score ?> из <?= count($questions) ?> баллов!</h2>-->
        <!--<a href="quitz.php"></a>-->
    </div>
<?php else: ?>
    <form action="" method="post">
        <div class="quitz-content">
            <?php for ($i = 0; $i < count($questions); $i++): ?>
                <div class="question">
                    <h3><?= $questions[$i] ?></h3>
                    <?php for ($j = 0; $j < count($answers[$i]); $j++): ?>
                        <input type="radio" name="question_<?= $i ?>" id="<?= "{$i}_{$j}" ?>" value="<?= $j ?>" required>
                        <label for="<?= "{$i}_{$j}" ?>"> <?= $answers[$i][$j] ?> </label><br>
                    <?php endfor ?>
                </div>
            <?php endfor ?>
        </div>
        <div class="button-container">
            <button type="submit">Отправить</button>
        </div>
    </form>
        <h2>Вы набрали <?= $score ?> из <?= count($questions) ?> баллов!</h2>
        <a href="quitz.php">Пройти снова</a>
<?php endif; ?>

<?php require_once __DIR__ . '/footer.php' ?>