<?php

namespace Algo;

class Dijkstra
{
    function search(array $graph, string $start, string $end): array
    {
        $getLowCost = function ($costs, $processed): ?string {
            $res = null;
            foreach ($costs as $node => $cost) {
                if (!in_array($node, $processed) && ($res === null || $cost < $res)) {
                    $res = $node;
                }
            }

            return $res;
        };

        $processed = [];
        $costs = [];
        $parents = [];
        foreach ($graph as $node => $value) {
            $costs[$node] = $node === $start ? 0 : INF;
        }

        while ($low = $getLowCost($costs, $processed)) {
            $neighbors = $graph[$low];
            foreach ($neighbors as $node => $cost) {
                if (($costs[$low] + $cost) < $costs[$node]) {
                    $costs[$node] = $costs[$low] + $cost;
                    $parents[$node] = $low;
                }
            }
            $processed[] = $low;
        }

        $path = [];
        $current = $end;
        while ($current !== $start) {
            array_unshift($path, $current);
            $current = $parents[$current];
        }
        array_unshift($path, $current);

        return ['cost' => $costs[$end], 'path' => implode('.', $path)];
    }
}

$graph = [];
$graph['START'] = ['A' => 6, 'B' => 2, 'C' => 1];
$graph['B'] = ['A' => 3, 'END' => 5];
$graph['A'] = ['D' => 1];
$graph['END'] = [];
$graph['C'] = ['D' => 2];
$graph['D'] = ['END' => 2];

$dijkstra = new Dijkstra();
print_r($dijkstra->search($graph, 'START', 'END'));