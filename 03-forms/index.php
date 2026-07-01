<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Forms</title>
	<link rel="stylesheet" href="style.php">
</head>
<body>
	<h1>Forms</h1>
	<?= __DIR__ ?>
	<form action="form.php" method="POST">
		<input type="text" name="last_name" placeholder="Имя">
		<input type="text" name="first_name" placeholder="Фамилия">
		<input type="email" name="email" placeholder="E-mail">
		<button type="submit">Отправить</button>
	</form>
</body>
</html>