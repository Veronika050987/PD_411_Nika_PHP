<?php
require_once __DIR__ . '/header.php';
echo "Привет, {$_POST['first_name']} {$_POST['last_name']}, приятного прохождения ;-)";
echo '<pre>';
print_r(ROOT . "\n");
echo $_SERVER['DOCUMENT_ROOT'];
echo '</pre>';
?>
<form action="" method="post">
    <div class="quitz-content">
        <?php for($i=0; $i < count($questions); $i++): ?>
            <div class="question">
				<h3><?= $questions[$i] ?></h3>
				<?php for ($j = 0; $j < count($answers[$i]); $j++): ?>
					<input type="radio" name="<?= $questions[$i] ?>" id="<?= "{$i}_{$j}" ?>" value="<?= "{$i}_ {$j}" ?>" >
					<label for="<?= "{$i}_{$j}" ?>"> <?= $answers[$i][$j] ?> </label>;<br>
				<?php endfor ?>
			</div>
		<?php endfor ?>
	</div>
	<input type="submit" value="Отправить" >
</form>

<?php require_once __DIR__ . '/footer.php' ?>