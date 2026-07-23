<?php
require_once __DIR__ . '/point.php';
require_once __DIR__ . '/inheritance.php';

/*
$A = new Point(2, 3);
$A->info();
$A->x = 7;
$A->y = 8;
echo $A;
*/

$human = new Human("Vercetty", "Tommy", 30);
echo $human . '<br>';

//$t_student = new Student($human, "Theft", "Vice", 90, 99);
//https://stackoverflow.com/questions/4697705/php-function-overloading

$student = new Student("Pinkman", "Jessie", 20, "Chemistry", "WW_220", 90, 95);
echo $student . '<br>';

$graduate = new Graduate
(
    "Schreder",
    "Hank",
    40,
    "Criminalistic",
    "OBN",
    50,
    70,
    "How to catch Hiesenberg"
);
echo $graduate . '<br>';


//my group variant :)
$list = [
    [
        "last_name" => "Pinkman",
        "first_name" => "Jessie",
        "age" => 20,
        "spec" => "Chemistry",
        "group" => "WW_220",
        "rating" => 90,
        "attendance" => 95 ],
    [
        "last_name" => "Vercetty",
        "first_name" => "Tommy",
        "age" => 30,
        "spec" =>"Criminalistic",
        "group" => "WW_225",
        "rating" => 93,
        "attendance" => 90],
    [
        "last_name" => "Rosenberg",
        "first_name" => "Ken",
        "age" => 29,
        "spec" => "Chemistry",
        "group" => "WW_220",
        "rating" => 57,
        "attendance" => 100],
    [
        "last_name" => "Carrington",
        "first_name" => "Avery",
        "age" => 32,
        "spec" => "Criminalistic",
        "group" => "WW_225",
        "rating" => 63,
        "attendance" => 78
    ],
    [
        "last_name" => "Cassidy",
        "first_name" => "Phil",
        "age" => 23,
        "spec" => "Chemistry",
        "group" => "WW_220",
        "rating" => 63,
        "attendance" => 78
    ]
];
$grouped = [];
foreach ($list as $item) {
    $grouped[$item['spec']][] = $item;
}
echo "<pre>";
print_r($grouped);
echo "</pre>";

///////////with file saving
$list = [
    [
        "last_name" => "Pinkman",
        "first_name" => "Jessie",
        "age" => 20,
        "spec" => "Chemistry",
        "group" => "WW_220",
        "rating" => 90,
        "attendance" => 95
    ],
    [
        "last_name" => "Vercetty",
        "first_name" => "Tommy",
        "age" => 30,
        "spec" => "Criminalistic",
        "group" => "WW_225",
        "rating" => 93,
        "attendance" => 90
    ],
    [
        "last_name" => "Rosenberg",
        "first_name" => "Ken",
        "age" => 29,
        "spec" => "Chemistry",
        "group" => "WW_220",
        "rating" => 57,
        "attendance" => 100
    ],
    [
        "last_name" => "Carrington",
        "first_name" => "Avery",
        "age" => 32,
        "spec" => "Criminalistic",
        "group" => "WW_225",
        "rating" => 63,
        "attendance" => 78
    ],
    [
        "last_name" => "Cassidy",
        "first_name" => "Phil",
        "age" => 23,
        "spec" => "Chemistry",
        "group" => "WW_220",
        "rating" => 63,
        "attendance" => 78
    ]
];
function array_group_by_multi(array $array, string ...$keys): array {
    $result = [];
    foreach ($array as $item) {
        $current = &$result;
        foreach ($keys as $key) {
            $value = $item[$key] ?? null;
            $current = &$current[$value];
        }
        $current[] = $item;
    }
    return $result;
}
$grouped = array_group_by_multi($list, "group");

$textData = print_r($grouped, true);

$fileName = "grouped_students.txt";

if (file_put_contents($fileName, $textData) !== false) //function for file storage
{
    echo "Data saved in file: " . $fileName;
} else
    "Error during file saving...";

echo "<pre>";
print_r($grouped);
echo "</pre>";

?>