<?php


namespace Algo\LinkedList;


class Node
{
    /**
     * @var Node|null
     */
    public $next;

    /**
     * @var int
     */
    public $value;

    public function __construct(int $value, Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }
}

