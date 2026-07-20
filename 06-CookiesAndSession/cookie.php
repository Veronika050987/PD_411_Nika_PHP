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
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>

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
            margin-left: 10px; 
        }

        body.light .theme-toggle-button, .reset-button {
            background-color: #4682B4;
            color: #F0F8FF;
        }

        body.dark .theme-toggle-button, .reset-button {
            background-color: #7FFFD4;
            color: #191970;
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

	<button onclick='toggle_theme()' class="theme-toggle-button">Сменить тему</button>
	<button onclick='ResetCookies()' class="reset-button">Сбросить</button>

	<img src="CODEPAGE.png" style="width:1100px;height:600px;">

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
            fetch('reset_cookies.php').then(() => {
                Cookies.remove("color_scheme");
                // Возвращаем к системной настройке после сброса
                let systemScheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                apply_theme(systemScheme);
                alert("Настройки сброшены");
            });
        }

        // Инициализация при загрузке
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