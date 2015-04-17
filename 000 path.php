<?php

$in = 'C:\hey\.\whatsup\..\cody.txt';

$a = explode('\\', $in);

$drive_letter = array_shift($a);

foreach ($a as $part) {
    if ($part == '..') {
        array_pop($out);
    }
    elseif ($part !== '.') {
        $out[] = $part;
    }
}

echo $drive_letter . '\\' . implode('\\', $out);