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
	<script src="https://cdn.jsdelivr.net/npm/js-cookie/dist/js.min.js"></script>

	<style>
        body.light {
            background-color: #E0FFFF;
            color: #191970;
        }
        body.dark {
            background-color: #483D8B;
            color: #F0F8FF;
        }
		body{ transition: background-color 0.3s, color 0.3s; }
        
		.theme-toggle-button 
		{
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px; /* Отступ от других элементов */
        }

        body.light .theme-toggle-button {
            background-color: #e0e0e0;
            color: #000000;
        }

        body.dark .theme-toggle-button {
            background-color: #3a3a3a;
            color: #ffffff;
        }
	</style>
</head>
<body class="light">
    <h1>Cookies</h1>
	<h1>У этой страницы обязательно должна быть кодировка <br>(Unicode UTF-8 without signature) - Codepage 65001</h1>
	<h1>При смене расширения имени файла кодировка сбрасывается, и ее обязательно нужно менять на<br>(Unicode UTF-8 without signature) - Codepage 65001</h1>
	<h2>
		<?= $visitor ? 'Welcome back' : 'Hello'; ?>
	</h2>
	<button onclick='ResetCookies()'>Сбросить</button>
	<button id="theme-toggle-button" class="theme-toggle-button" onclick='toggle_theme()'>
        Сменить тему
    </button>
	<img src="CODEPAGE.png" style="width:1100px;height:600px;">

	<script>
		function get_color_theme()
		{
			return (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) ? "dark" : "light";
		}

		function apply_theme()
		{
			document.body.className = scheme;
		}

		function update_color_theme()
		{
			let scheme = get_color_theme();
			Cookies.set("color_scheme", scheme);
			apply_theme();
		}

		let $color_scheme = Cookies.get("color_scheme");

		if (typeof $color_scheme === "undefined")
		{
			$color_scheme = get_color_theme();
			Cookies.set("color_scheme", $color_scheme);
		}

		apply_theme();

		if (window.matchMedia)
		{
			window.matchMedia("(prefers-color-scheme: dark)").addListener(update_color_scheme);
		}

		function ResetCookies()
		{
			let request = new XMLHttpRequest();
			request.onreadystatechange = function()
			{
				if (this.readyState == 4 && this.status == 200)
				{
					Cookies.remove("color_scheme");
					//TODO: вызвать функцию, которая стбосит печеньки
					apply_theme("color_scheme");
					alert("Настройки сброшены" + this.responseText);
				}
			}
			request.open("GET", "reset_cookies.php", true);
			request.send();
		}
	</script>
</body>
</html>