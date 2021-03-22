<?php

namespace Algo;

class Bfs
{
    public function bfs(array $graph, string $name, string $needle): ?string
    {
        $queue = $queue ?? new \SplQueue();
        if (isset($graph[$name])) {
            foreach ($graph[$name] as $name) {
                unset($graph[$name]);
                $queue->enqueue($name);
            }
            while (!$queue->isEmpty()) {
                $current = $queue->dequeue();
                if ($current === $needle) {
                    return $current;
                }
                if (isset($graph[$current])) {
                    foreach ($graph[$current] as $name) {
                        unset($graph[$name]);
                        $queue->enqueue($name);
                    }
                }
            }
        }

        return null;
    }
}


$graph = [];

$graph['you'] = ['alice', 'bob', 'claire', 'valli'];
$graph['alice'] = ['peggy'];
$graph['bob'] = ['lolly', 'bolly', 'sanny'];
$graph['claire'] = ['ronni', 'ganni'];
$graph['peggy'] = ['value', 'nanni', 'alice'];
$graph['ganni'] = ['misterio'];

$bfs = new Bfs();

print_r($bfs->bfs($graph, 'you', 'alice'));
