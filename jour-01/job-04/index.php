<?php

function my_fizz_buzz(int $length) : array
{
    $i = 0;
    $table = [];

    while ($i <= $length)
    {
        if($i % 5 === 0 && $i % 3 === 0)
        {
            $table[$i] = 'FizzBuzz';

        } elseif($i % 3 === 0)
        {
            $table[$i] = 'Fizz';

        } elseif ($i % 5 === 0)
        {
            $table[$i] = 'Buzz';

        } else
        {
            $table[$i] = $i;
        }
        $i++;
    }

    return $table;
}
echo '<pre>';
var_dump(my_fizz_buzz(50));
echo '</pre>';