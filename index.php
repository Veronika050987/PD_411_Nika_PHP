<meta charset="utf-8" />
<link rel="stylesheet" href="css/index.css">
<?php
    $title      = "Introduction to PHP";
    $definition = "PHP -Hyreptext Preprocessor";
    const EPSILON = 2.7; //Объявляет константу на этапе компиляции
    define("PI", 3.14); #Объявляет константу на этапе выполнения
const NOWSTRING = <<<'VINNY'
<pre>
Хорошо живет
на свете
Винни-Пух!\n
Вот и сказоче конец.
</pre>
VINNY;
function type_info($typename, $size, $min_value, $max_value)
{
	echo <<<INFO
<pre>
$typename:
Size - $size,
Range: $min_value ... $max_value;
</pre>
INFO;

	//echo "$typename: Size - $size, Range: $min_value ... $max_value;";
	////////////////////////////////////
	//echo '<pre>';
	//echo $typename;
	//echo ': Size - ';
	//echo $size;
	//echo '; Range:';
	//echo $min_value;
	//echo ' ... ';
	//echo $max_value;
	//echo ';';
	//echo '</pre>';
}
function dump_wrapper($value)
{
	echo '<pre>';
	var_dump($value);
	echo '</pre>';
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		<?php ECHO $title; ?>
	</title>
	<link rel="stylesheet" href="style.php">
</head>
<body>
	<h1>
		<?= $title;//Строчный комментарий ?>
	</h1>
	<details>
		<summary>Введение</summary>
		<h2>
			<?= $definition;#Строчный комментарий ?>
		</h2>
		<?php 3.14159; ?>
		<p>
			Число PI = <?= PI; ?>
		</p>
		<p>
			Epsilon = <?= EPSILON; ?>
		</p>
	</details>
	<details>
		<summary>Типы данных</summary>
		<h2>Типы данных PHP</h2>
		<pre>
			<?php
			var_dump($title);
			var_dump(PI);
            ?>
		</pre><?= NOWSTRING; ?>
		<ol>
			<li>
				Скалярные типы
				<ul>
					<li>
						<code>bool. FALSE: "", '', array(), [], null, SimpleXML;</code>
					</li>
					<li>
						<?php type_info('int', PHP_INT_SIZE, PHP_INT_MIN, PHP_INT_MAX)?>
					</li>
					<li>
						<code>
							int: <?php echo PHP_INT_SIZE; echo 'Bytes'; echo PHP_INT_MIN; echo '...'; echo PHP_INT_MAX?>
						</code>
					</li>
					<li>
						<?php type_info('FLOAT', PHP_FLOAT_DIG, PHP_FLOAT_MIN, PHP_FLOAT_MAX)?>
					</li>
					<li>
						<code>string</code>
						<ul>
							<li>
								single quotted: <?= 'Hello\nPHP!'?>
							</li>
							<li>double quotted &#8213; поддерживает Escape-последовательности и интерполяцию строк.</li>
							<li>heredoc syntax &#8213; RAW-строка, которая сохраняет переносы. heredoc поддерживает интерполяцию;</li>
							<li>nowdoc quotted &#8213; RAW-строка без интерполяции;</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>
				Составные типы
				<ul>
					<li>
						<code>array</code>
					</li>
					<li>
						<code>object</code>
					</li>
					<li>
						<code>callable</code>
					</li>
					<li>
						<code>iterable</code>
					</li>
				</ul>
			</li>
			<li>
				Специальные типы
				<ul>
					<li>
						<code>resourse</code>
					</li>
					<li>
						<code>null</code>
					</li>
				</ul>
			</li>
		</ol>
	</details>
	<details>
		<summary>Массивы</summary>
		<h3>Индексированные массивы:</h3>
		<?php
		$arr = array(3,5,8,13,21);
		//dump_wrapper($arr);
		print_r($arr);

		$arr2 = [3, 5, 8, 13, 21, 34, 55];
		//dump_wrapper($arr2);

		echo '<pre>';
		for($i=0; $i < count($arr2); $i++)
		{
			echo "$arr2[$i]\t\t";
		}
		echo "\n";
		$arr2[] = 89;	//Добавление элемента
		print_r($arr2);
		unset($arr2[3]);	//Удаление элемента из массива
		print_r($arr2);
		echo '</pre>';
        ?>
		<h3>Ассоциативные массивы:</h3>
		<?php
		$weekdays =
			[
			'Sunday' => 0,
			'Moonday' => 1,
			'Tuesday' => 2,
			'Wednesday' => 3,
			'Thursday' => 4,
			'Friday' => 5,
			'Saturnday' => 6,
			];
		//$weekdays['Sunday'] = 0;
		//$weekdays['Moonday'] = 1;
		//$weekdays['Tuesday'] = 2;
		//$weekdays['Wednesday'] = 3;
		//$weekdays['Thursday'] = 4;
		//$weekdays['Friday'] = 5;
		//$weekdays['Saturnday'] = 6;
		echo '<pre>';
		foreach($weekdays as $day => $value)
		{
			//$day - выводит значени по ключу
			//$day => $value; $day - выводит ключ, $value - значение по ключу;
			echo "$day\t\t";
		}
		echo "\n";
		print_r($weekdays);
		echo '</pre>';
		echo $weekdays['Wednesday'];
		?>
		<h3>Многомерные массивы</h3>
		<?php
		$multi =
			[
				[0, 1, 1, 2],
				[3, 5, 8, 13, 21],
				[34,55, 89],
				[144, 233, 377, 610, 987]
			];
		echo '<hr>';
		echo '<pre>';
		for($i=0; $i < count($multi); $i++)
		{
			for($j=0; $j < count($multi[$i]); $j++)
			{
				//echo $multi[$i][$j];
				echo $multi[$i][$j], "\t\t";
			}
			echo "\n";
		}
		echo '<hr>';
		foreach($multi as $row)
		{
			foreach($row as $element)
			{
				echo "$element\t\t";
			}
			echo "\n";
		}
		echo '<hr>';
		print_r($multi);
		echo '</pre>';
		?>
	</details>
	<details open>
		<summary>PHP array functions</summary>
		<pre>
		<?php

echo "<h1>1. Count an array\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		echo count($cars);
		echo '<hr>';

echo "<h1>2. Create and display an indexed array 1\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		var_dump($cars);
		echo '<hr>';

echo "<h1>3. Create and display an indexed array 2\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		print_r($cars);
		echo '<hr>';

echo "<h1>4. Create and display an indexed array 3\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		dump_wrapper($cars);
		echo '<hr>';

echo "<h1>5. Access an array item\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		echo $cars[1];
		echo '<hr>';

echo "<h1>6. Access an accosiative array item\n</h1>";
		$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
		echo $cars["year"];
		echo '<hr>';

echo "<h1>7. Delete an array element\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		unset($cars[2]);
		dump_wrapper($cars);
		echo '<hr>';

echo "<h1>8. Add an array element\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		$cars[] = 'Haval';
		dump_wrapper($cars);
		echo '<hr>';

echo "<h1>9. Change an array element\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		dump_wrapper($cars);
		$cars[1] = 'Ford';
		dump_wrapper($cars);
		echo '<hr>';

echo "<h1>10. Declare an empty array\n</h1>";
		$cars = [];
		$cars[0] = "Volvo";
		$cars[1] = "BMW";
		$cars[2] = "Toyota";
		dump_wrapper($cars);
		echo '<hr>';

echo "<h1>11. Declare an empty associative array\n</h1>";
		$myCar = [];
		$myCar["brand"] = "Ford";
		$myCar["model"] = "Mustang";
		$myCar["year"] = 1964;
		dump_wrapper($myCar);
		echo '<hr>';

echo "<h1>12. Mixing array keys\n</h1>";
		$myArr = [];
		$myArr[0] = "apples";
		$myArr[1] = "bananas";
		$myArr["fruit"] = "cherries";
		dump_wrapper($myArr);
		echo '<hr>';

echo "<h1>13. Execute a function item\n</h1>";
		function myFunction() {
		echo "I come from a function!";
		}

		$myArr = array("Volvo", 15, "myFunction");

		$myArr[2]();
		echo '<hr>';
		function myFunctions() {
		echo "I come from a fun function!";
		}

		$myArr = array("car" => "Volvo", "age" => 15, "message" => "myFunctions");

		$myArr["message"]();
		echo '<hr>';

echo "<h1>14. Update array items in a foreach loop\n</h1>";
		$cars = array("Volvo", "Citroen", "Audi");
		var_dump($cars);
		echo '<hr>';
		foreach ($cars as &$x) {
		$x = "Ford";
		}
		unset($x);
		var_dump($cars);
		echo '<hr>';

echo "<h1>15. Add a single array item\n</h1>";
		$fruits = array("Apple", "Banana", "Cherry");
		var_dump($fruits);
		$fruits[] = "Orange";
		var_dump($fruits);
		echo '<hr>';

echo "<h1>16. Add two or more array items\n</h1>";
		$fruits = array("Apple", "Banana", "Cherry");
		var_dump($fruits);
		$fruits[] = "Orange";
		$fruits[] = "Pears";
		var_dump($fruits);
		echo '<hr>';

echo "<h1>17. Add into an associative array\n</h1>";
		$cars = array("brand" => "Ford", "model" => "Mustang");
		var_dump($cars);
		$cars["color"] = "Red";
		var_dump($cars);
		echo '<hr>';

echo "<h1>18. Add into array functions</h1>";
//In PHP, you can add array items with several different methods:

//[] - adds a single item to the end of an array
//array_push() - adds one or more items to the end of an array
//array_unshift() - adds one or more items to the beginning of an array
//array_splice() - removes a portion of an array and replaces it with new elements
//array_merge() - merges two or more arrays
echo "<h2>1) array_push() function \n</h2>"; //The array_push() function is used to add one or more array items to the end of an existing array.
		$fruits = array("Apple", "Banana", "Cherry");
		var_dump($fruits);
		array_push($fruits, "Orange", "Kiwi", "Lemon");
		var_dump($fruits);
		echo '<hr>';

echo "<h2>2) Add mupltiple items to an associative array\n</h2>";
		$cars = array("brand" => "Ford", "model" => "Mustang");
		var_dump($cars);
		$cars += ["color" => "red", "year" => 1964];
		var_dump($cars);
		echo '<hr>';

echo "<h2>3) array_unshift() Function\n</h2>";//The array_unshift() function is used to add one or more array items to the beginning of an existing array
		$fruits = array("Apple", "Banana", "Cherry");
		var_dump($fruits);
		array_unshift($fruits, "Orange", "Kiwi", "Lemon");
		var_dump($fruits);
		echo '<hr>';

echo "<h2>4) array_splice() Function\n</h2>";//The array_splice() function is used remove a portion of an array and replace it with new items. If you specify an offset and a length of 0 (nothing to remove), you can insert an item at that position.
		$fruits = array("Apple", "Banana", "Cherry");
		var_dump($fruits);
		$new_fruit = "Orange";
		array_splice($fruits, 1, 0, $new_fruit);
		var_dump($fruits);
		echo '<hr>';

echo "<h2>5) array_merge() Function</h2>";//The array_merge() function is used to merge two or more arrays.
		$fruits1 = array("Apple", "Banana");
		var_dump($fruits1);
		$fruits2 = array("Cherry", "Orange");
		var_dump($fruits2);
		$result = array_merge($fruits1, $fruits2);
		var_dump($result);
		echo '<hr>';

echo "<h1>19. Delete array items functions</h1>";
//In PHP, you can remove/delete array items with several different functions:

//array_splice() - removes a portion of the array starting from a start position and length
//unset() - removes the element associated with a specific key
//array_diff() - remove items from an associative array
//array_pop() - removes the last array item
//array_shift() - removes the first array item

echo "<h2>1) array_splice() Function</h2>";//With the array_splice() function you specify the index (where to start) and how many items you want to delete. After the deletion, the array gets re-indexed automatically, starting at index 0.
		$cars = array("Volvo", "BMW", "Toyota");
		var_dump($cars);
		array_splice($cars, 1, 1);
		var_dump($cars);
		echo '<hr>';
echo "<h2>2) array_splice() Function for mupltiple elements</h2>";//With the array_splice() function you specify the index (where to start) and how many items you want to delete. After the deletion, the array gets re-indexed automatically, starting at index 0.
		$cars = array("Volvo", "BMW", "Toyota");
		var_dump($cars);
		array_splice($cars, 1, 2);
		var_dump($cars);
		echo '<hr>';
echo "<h2>3) unset() Function</h2>";//Note: The unset() function does not re-index the array. So, if you remove an element at index 1, the other elements (e.g., at index 0, 2, 3, etc.) will keep their original indices, leading to a "gap" in the sequence of indices.
		$cars = array("Volvo", "BMW", "Toyota");
		var_dump($cars);
		unset($cars[1]);
		var_dump($cars);
		echo '<hr>';
echo "<h2>4) unset() Function for mupltiple elements</h2>";//Note: The unset() function does not re-index the array. So, if you remove an element at index 1, the other elements (e.g., at index 0, 2, 3, etc.) will keep their original indices, leading to a "gap" in the sequence of indices.
		$cars = array("Volvo", "BMW", "Toyota");
		var_dump($cars);
		unset($cars[0], $cars[2]);
		var_dump($cars);
		echo '<hr>';
echo "<h2>5) array_diff() Function</h2>";//You can also use the array_diff() function to remove items from an associative array. This function returns a new array, without the specified items.
		$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
		var_dump($cars);
		$newarray = array_diff($cars, ["Mustang", 1964]);
		var_dump($newarray);
		echo '<hr>';
echo "<h2>6) array_pop() Function</h2>";//The array_pop() function removes the last item of an array.
		$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
		var_dump($cars);
		array_pop($cars);
		var_dump($cars);
		echo '<hr>';
echo "<h2>7) array_shift() Function</h2>";//The array_shift() function removes the first item of an array.
		$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
		var_dump($cars);
		array_shift($cars);
		var_dump($cars);
		echo '<hr>';
echo"<h1>20. Sorting arrays</h1>";
//Here are the main PHP array sorting functions:

//sort() - sorts an indexed array in ascending order
//rsort() - sorts an indexed array in descending order
//asort() - sorts an associative array in ascending order, according to the value
//ksort() - sorts an associative array in ascending order, according to the key
//arsort() - sorts an associative array in descending order, according to the value
//krsort() - sorts an associative array in descending order, according to the key
echo "<h2>1) sort() Function</h2>";//The sort() function sorts an indexed array in ascending order.
		$cars = array("Volvo", "BMW", "Toyota");
		var_dump($cars);
		sort($cars);
		var_dump($cars);
		echo '<hr>';
		$numbers = array(4, 6, 2, 22, 11);
		print_r($numbers);
		sort($numbers);
		print_r($numbers);
		echo '<hr>';
echo "<h2>2) rsort() Function</h2>";//The rsort() function sorts an indexed array in descending order.
		$cars = array("Volvo", "BMW", "Toyota");
		var_dump($cars);
		rsort($cars);
		var_dump($cars);
		echo '<hr>';
		$numbers = array(4, 6, 2, 22, 11);
		print_r($numbers);
		rsort($numbers);
		print_r($numbers);
		echo '<hr>';
echo "<h2>3) asort() Function</h2>";//The asort() function sorts an associative array in ascending order, according to the value.
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		var_dump($age);
		asort($cars);
		var_dump($age);
		echo '<hr>';
echo "<h2>4) arsort() Function</h2>";//The arsort() function sorts an associative array in descending order, according to the value.
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		var_dump($age);
		arsort($age);
		var_dump($age);
		echo '<hr>';
echo "<h2>5) ksort() Function</h2>";//The ksort() function sorts an associative array in ascending order, according to the key.
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		print_r($age);
		ksort($cars);
		print_r($age);
		echo '<hr>';
echo "<h2>6) krsort() Function</h2>";//The krsort() function sorts an associative array in descending order, according to the key.
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		print_r($age);
		krsort($age);
		print_r($age);
		echo '<hr>';
echo "<h1>21. array_combine() Function</h1>";//Create an array by using the elements from one "keys" array and one "values" array
		$fname = array("Peter", "Ben", "John");
		$age = array("15", "25", "30");
		$c = array_combine($fname,$age);
		print_r($c);
echo "<h1>22. array_diff() Function</h1>";//Compare the values of two arrays, and return the differences
		$a1 = array("a" => "red", "b" => "blue", "c" => "green");
		$a2 = array("a" => "red", "g" => "blue", "c" => "yellow");
		$result = array_diff($a1,$a2);
		print_r($result);
echo "<h1>23. array_reverse() Function</h1>";//Return an array in the reverse order
		$a=array("a"=>"Volvo","b"=>"BMW","c"=>"Toyota");
		print_r(array_reverse($a));
echo "<h1>24. array_unique() Function</h1>";//Remove duplicate values from an array
		$a=array("a"=>"red","b"=>"green","c"=>"red");
		print_r($a);
		print_r(array_unique($a));
		?>
		</pre>
	</details>
</body>
</html>