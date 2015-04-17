<?php
/**
 * Created by PhpStorm.
 * User: jason.dubaniewicz
 * Date: 5/17/14
 * Time: 3:38 PM
 */
$a = array(6,3,8,1,4,2,5,7);
$a = array(2,3,4,5,6,7,8,1);
$a = array();
$inversions = 0;

$fp = fopen($argv[1], 'r');
while ($line = trim(fgets($fp))) {
    $a[] = (int) $line;
}


function merge_sort(array $in, &$cnt) {
    $in_cnt = count($in);

    if ($in_cnt == 1) {
        return $in;
    }
    else {
        $left = array_splice($in, 0, $in_cnt / 2);
        return merge(merge_sort($left, $cnt), merge_sort($in, $cnt), $cnt);
    }
}

function merge(array $a, array $b, &$cnt) {
    $c = array();
    $i = 0;
    $j = 0;
    $a_done = false;
    $b_done = false;

    for ($k = 0; $k < count($a) + count($b); $k++) {
        if ($b_done || (!$a_done && $a[$i] < $b[$j])) {
            $c[$k] = $a[$i++];
            if ($i == count($a))
                $a_done = true;
        }
        else {
            $c[$k] = $b[$j++];
            $cnt+= count($a) - $i;
            if ($j == count($b))
                $b_done = true;
        }
    }

    return $c;
}

print_r(merge_sort($a, $inversions));
echo "\n" . '# of inversions: ' . $inversions . "\n";