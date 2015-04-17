<?php

// Quicksort - Hoare circa 1961

// simple array swap function
function swap_arr(array &$a, $position_1, $position_2) {
    $tmp = $a[$position_1];
    $a[$position_1] = $a[$position_2];
    $a[$position_2] = $tmp;
    return;
}

// median-of-three pivot rule
function choose_pivot($a, $length) {
    if ($length <= 2) {
        asort($a);
        return key($a);
    }
    else {
        $median = $length % 2 == 0 ? $length / 2 - 1 : floor($length / 2);
        $tmp[0] = $a[0];
        $tmp[$median] = $a[$median];
        $tmp[$length - 1] = $a[$length - 1];
        asort($tmp);
        next($tmp);
        return key($tmp);
    }
}

function partition(array &$a) {
    $length = count($a);
    $pivot_key = choose_pivot($a, $length);
    swap_arr($a, 0, $pivot_key);
    $p = $a[0];
    $i = 1;
    for ($j = 1; $j < $length; $j++) {
        if ($a[$j] < $p) {
            swap_arr($a, $j, $i);
            $i++;
        }
    }
    swap_arr($a, 0, $i - 1);
    return $i - 1;
}

// $m for homework only
function quick_sort(array $a, &$m) {
    if (count($a) <= 1) return $a;
    else {
        $m += count($a) - 1;
        $pivot_key = partition($a);
        $left = array_splice($a, 0, $pivot_key);
        $pivot = array_splice($a, 0, 1);
        //$right = $a now
        return array_merge(quick_sort($left, $m), $pivot, quick_sort($a, $m));
    }
}

$test_input = [6,3,8,1,4,2,5,7];

$fp = fopen($argv[1], 'r');
while ($line = trim(fgets($fp))) {
    $a[] = (int) $line;
}

$m = 0;
$a = quick_sort($a, $m);
echo print_r($m, true);