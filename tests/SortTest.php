<?php

include '../vendor/autoload.php';
require '../sort.php';



class SortTest extends \PHPUnit\Framework\TestCase
{
    public function testQSort(): void
    {
        $data = [1, -1, 3, 5, 0, -10, 22];
        $this->assertEquals(
            [-10, -1, 0, 1, 3, 5, 22],
            fastSort($data)
        );
    }

    public function testInsertSort(): void
    {
        $data = [1, -1, 3, 5, 0, -10, 22];
        $this->assertEquals(
            [-10, -1, 0, 1, 3, 5, 22],
            insertSort($data)
        );
    }

    public function testMergeSort(): void
    {
        $data = [1, -1, 3, 5, 0, -10, 22];
        $this->assertEquals(
            [-10, -1, 0, 1, 3, 5, 22],
            mergeSort($data)
        );
    }

    public function testBubbleSort(): void
    {
        $data = [1, -1, 3, 5, 0, -10, 22];
        $this->assertEquals(
            [-10, -1, 0, 1, 3, 5, 22],
            bubbleSort($data)
        );
    }
}