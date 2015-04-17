<?php

$fp = fopen($argv[1], 'r');
while ($line = trim(fgets($fp))) {
    $tmp = explode("\t", $line);
    $vertex = array_shift($tmp);
    $a[$vertex] = $tmp;
}
unset($vertex, $line, $fp);

/* Karger Min Cut
 *
 *  While there are more than 2 vertices:
 *   pick a remaining edge (u,v) uniformly at random
 *   merge (or “contract” ) u and v into a single vertex
 *   remove self-loops
 *   return cut represented by final 2 vertices
 */
function kargerMinCut($a) {
    while (count($a) > 2) {
        $vertex = array_rand($a);
        $e1_key = array_rand($a[$vertex]);
        $e = $a[$vertex][$e1_key];
        foreach ($a[$vertex] as $i => $edge) {
            if ($edge == $e) {
                unset($a[$vertex][$i]);
            }
        }

        foreach ($a[$e] as $edges_edge) {
            if ($edges_edge != $vertex) {
                foreach ($a[$edges_edge] as $i => $edges_edges_edge) {
                    if ($edges_edges_edge == $e) {
                        $a[$edges_edge][$i] = $vertex;
                    }
                }
                $a[$vertex][] = $edges_edge;
            }
        }

        unset($a[$e]);
    }
    return count(array_pop($a));
}

$min_cuts = [];
for ($i = 0; $i < 10; $i++) {
    $min_cuts[] = kargerMinCut($a);
}

echo min($min_cuts);

