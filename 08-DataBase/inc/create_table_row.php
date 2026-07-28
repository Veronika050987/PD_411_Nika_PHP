<?php

function create_table_row($row)
{
    $formatted_row = '<tr>';
    foreach ($row as $item) {
        $formatted_row .= '<td>';

        // Проверяем, является ли значение объектом (например, DateTime)
        if ($item instanceof DateTime) {
            $formatted_row .= $item->format('Y-m-d'); // Преобразуем дату в строку
        }
        // Если это массив или объект другого типа, выводим что-то понятное
        elseif (is_array($item) || is_object($item)) {
            $formatted_row .= '---';
        }
        // Обычные типы (строки, числа) выводим как есть
        else {
            $formatted_row .= htmlspecialchars((string) $item);
        }

        $formatted_row .= '</td>';
    }
    $formatted_row .= '</tr>';
    return $formatted_row;
}

?>