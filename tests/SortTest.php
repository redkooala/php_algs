<?php

namespace Tests;

use Algo\Sort;
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{

    public function sortProvider(): array
    {
        return [
            [
                [7, 12, -4, 155, 0, 12, 3, -6],
                [-6, -4, 0, 3, 7, 12, 12, 155]
            ]
        ];
    }

    /**
     * @test
     * @dataProvider sortProvider
     */
    public function fastSort($data, $expected)
    {
        $sortClass = new \Algo\Sort();

        $result = $sortClass->fastSort($data);
        self::assertEquals($expected, $result);
    }

   /**
     * @test
     * @dataProvider sortProvider
     */
    public function mergeSort($data, $expected): void
    {
        $sortClass = new \Algo\Sort();

        $result = $sortClass->mergeSort($data);
        self::assertEquals($expected, $result);
    }

    /**
     * @test
     * @dataProvider sortProvider
     */
    public function bubleSort($data, $expected): void
    {
        $sortClass = new \Algo\Sort();

        $result = $sortClass->bubbleSort($data);
        self::assertEquals($expected, $result);
    }

      /**
     * @test
     * @dataProvider sortProvider
     */
    public function insertSort($data, $expected): void
    {
        $sortClass = new \Algo\Sort();

        $result = $sortClass->insertSort($data);
        self::assertEquals($expected, $result);
    }
}