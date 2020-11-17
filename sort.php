<?php

include 'vendor/autoload.php';

function fastSort(array $data)
{
    $size = count($data);
    if ($size < 2) {
        return $data;
    }

    $base = 0;
    $baseValue = $data[$base];

    $left = [];
    $right = [];

    for ($i = 1; $i < $size; $i++) {
        if ($i === $base) {
            continue;
        }
        if ($baseValue > $data[$i]) {
            $right[] = $data[$i];
        } else {
            $left[] = $data[$i];
        }
    }

    return array_merge(fastSort($right), [$baseValue], fastSort($left));
}


function insertSort(array $data): array
{
    $size = count($data);

    for ($i = 1; $i < $size; $i++) {
        $current = $data[$i];
        $j = $i - 1;
        while ($j > -1 && $current < $data[$j]) {
            $data[$j + 1] = $data[$j];
            $j--;
        }
        $data[$j + 1] = $current;
    }

    return $data;
}

function mergeSort(array $data): array
{
    $size = count($data);
    if ($size < 2) {
        return $data;
    }

    $base = (int)floor($size / 2);
    $right = array_splice($data, $base);

    return merge(mergeSort($data), mergeSort($right));
}

function merge(array $left, array $right): array
{
    $result = [];
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }

    return array_merge($result, $right, $left);
}

function bubbleSort(array $data): array
{
    $size = (int)count($data);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 1; $j < $size; $j++) {
            if ($data[$j-1] > $data[$j]) {
                $swp = $data[$j -1];
                $data[$j-1] = $data[$j];
                $data[$j] = $swp;
            }
        }
    }

    return $data;
}

class BrainTest extends \PHPUnit\Framework\TestCase
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