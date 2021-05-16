<?php

namespace Algo\LinkedList;

class Reverse
{
    public function go(Node $node): Node
    {
        $current = $node;

        $result = null;

        while ($current) {
            $tmp = $current->next;

            $current->next = $result;
            $result = $current;
            $current = $tmp;
        }

        return $result;
    }
}
