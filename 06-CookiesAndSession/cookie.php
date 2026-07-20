<?php
define('HOUR', 3600);
$visitor = false;
if (isset($_COOKIE['return'])) {
    $visitor = true;
} else {
    setcookie('return', '1', time() + 300);
}
#function ResetCookies()
#{
#		setcookie('return', '1', 0);
#}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Cookies</title>
</head>
<body>
    <h1>Cookies</h1>
	<h1>У этой страницы обязательно должна быть кодировка <br>(Unicode UTF-8 without signature) - Codepage 65001</h1>
	<h1>При смене расширения имени файла кодировка сбрасывается, и ее обязательно нужно менять на<br>(Unicode UTF-8 without signature) - Codepage 65001</h1>
	<h2>
		<?= $visitor ? 'Welcome back' : 'Hello'; ?>
	</h2>
	<button onclick='ResetCookies()'>Сбросить</button>
	<img src="CODEPAGE.png" style="width:1100px;height:600px;">

	<script>
		function ResetCookies()
		{
			let request = new XMLHttpRequest();
			request.onreadystatechange = function()
			{
				if (this.readyState == 4 && this.status == 200)
				{
					//TODO: вызвать функцию, которая стбосит печеньки
					alert(this.responseText);
				}
			}
			request.open("GET", "reset_cookies.php", true);
			request.send();
		}
	</script>
</body>
</html>