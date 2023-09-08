<?php

require_once('./Student.php');

$test_1 = new Student(1,2, 'mo@la.com', 'toto', new DateTime("2000-01-16"), 'male' );
$test_2 = new Student();

echo '<pre>';
var_dump($test_1);
echo '</pre>';

echo '*** *** ***';

echo '<pre>';
var_dump($test_2);
echo '</pre>';
