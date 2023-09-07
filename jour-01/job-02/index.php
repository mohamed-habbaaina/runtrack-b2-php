<?php
function my_str_reverse(string $str) : string
{
    $str_reverse = '';
    $lengh = 0;

    while (isset($str[$lengh]))
    {
        $lengh++;
    }

    for($i = $lengh - 1; $i >= 0; $i--) 
    {
        $str_reverse .= $str[$i];

    }
    return $str_reverse;
    
}
$test = 'Salut tout le monde';
var_dump(my_str_reverse($test));