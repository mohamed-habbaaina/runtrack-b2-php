<?php
function my_str_search(string $haystack, string $needle) : int
{
    $i = 0;
    $lengh = 0;
    while (isset($haystack[$lengh]))
    {
        if($haystack[$lengh] === ($needle))
        {
            $i++;
        }
        $lengh++;
    }
    return $i;
}
$test = 'Bonjour La plateforme';
$strTest = 'l';

$result = my_str_search($test, $strTest);
var_dump($result);