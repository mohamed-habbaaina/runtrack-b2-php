<?php
function my_is_multiple(int $divider, int $multiple) : bool
{
    if($divider % $multiple === 0)
    {
        return true;
    } else
    {
        return false;
    }
}

var_dump(my_is_multiple(5,2));
var_dump(my_is_multiple(8,2));
