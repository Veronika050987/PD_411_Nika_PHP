<?php
require_once __DIR__ . '/connect.php';
require_once __DIR__ . '/assembly_table.php';

echo '<pre>';
print_r($_GET);
print_r($_REQUEST);
echo '</pre>';

echo '<form method="POST" action="index.php">
        <input type="hidden" name="q" value="groups.sql">
        <select name="dir">
            <option value="">Все направления</option>
            <option value="Разработка программного обеспечения">Разработка программного обеспечения</option>
            <option value="Компьютерная графика и дизайн">Компьютерная графика и дизайн</option>
            <option value="Java development">Java development</option>
        </select>
        <button type="submit">Показать</button>
      </form>';

//$query = file_get_contents(__DIR__ . '/../SQL/' . $_REQUEST['q']);
if (isset($_GET['q'])) {
    $direction = $_GET['dir'] ?? null;
    $query = file_get_contents(__DIR__ . '/../SQL/' . $_GET['q']);
    $params = array($direction, $direction);
    $results = sqlsrv_prepare($connection, $query, $params);

    if (sqlsrv_execute($results)) {
        echo assembly_table($results);
    }
}

require_once __DIR__ . '/disconnect.php';

?>