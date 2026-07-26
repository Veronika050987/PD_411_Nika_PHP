<?php

function create_table_row($row)
{
	$formatted_row = '<tr>';
	foreach($row as $item)
	{
		$formatted_row .= '<td>';	
		$formatted_row .= $item;
		$formatted_row .= '</td>';	
	}
	return $formatted_row;
}

?>