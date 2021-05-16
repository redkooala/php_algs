<?php

namespace Tests\LinkedList;

use Algo\LinkedList\Node;
use Algo\LinkedList\Reverse;
use PHPUnit\Framework\TestCase;

class ReverseTest extends TestCase
{
    /**
     * @test
     */
    public function go(): void
    {
        $root = new Node(
            2, new Node(
                11, new Node(
                5, new Node(16)
                )
            )
        );

        $result = (new Reverse())->go($root);

        self::assertEquals(
            new Node(16,
                new Node(5,
                    new Node(11,
                        new Node(2)))),
            $result
        );
    }
}
