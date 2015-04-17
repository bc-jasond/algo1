<?php


$guess = 10000;
$num_tries = 0;

// binary search
$num_stories = 100;



// 1 and 2 steps up - n/2 worst case
$one_ptr = 2;
$two_ptr = 4;

while (1) {
    $num_tries++;
    $msg = ' floor in ' . $num_tries . ' tries.';

    if ($one_ptr > $guess)
        die($one_ptr - 1 . $msg);
    elseif ($one_ptr == $guess)
        die($one_ptr . $msg);
    elseif ($two_ptr > $guess)
        die($two_ptr - 1 . $msg);
    elseif ($two_ptr == $guess)
        die($two_ptr . $msg);

    $one_ptr = $two_ptr + 1;
    $two_ptr = $one_ptr + 1;
}