<?php

namespace Algo;

class Sort {
    public static function insertSort(array $data): array
    {
        $size = count($data);

        for ($i = 1; $i < $size; $i++) {
            $j = $i;
            while ($j > 0 && $data[$j - 1] > $data[$j]) {
                $tmp = $data[$j];
                $data[$j] = $data[$j - 1];
                $data[$j - 1] = $tmp;
                $j--;
            }
        }

        return $data;
    }

    public function mergeSort(array $data): array
    {
        $size = count($data);
        if ($size < 2) {
            return $data;
        }


        $base = (int)floor($size / 2);
        $right = array_splice($data, $base);

        return self::merge($this->mergeSort($data), $this->mergeSort($right));
    }

    public static function merge(array $left, array $right): array
    {
        $result = [];
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0] < $right[0]) {
                $result[] = array_shift($left);
            } else {
                $result[] = array_shift($right);
            }
        }


        return array_merge($result, $left, $right);
    }

    public function bubbleSort(array $data): array
    {
        $size = (int)count($data);
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - $i - 1; $j++) {
                if ($data[$j] > $data[$j + 1]) {
                    $tmp = $data[$j];
                    $data[$j] = $data[$j + 1];
                    $data[$j + 1] = $tmp;
                }
            }
        }

        return $data;
    }

    public function fastSort(array $data)
    {
        $size = count($data);

        if ($size < 2) {
            return $data;
        }

        $baseValue = array_shift($data);
        $left = [];
        $right = [];
        while (count($data)) {
            $value = array_shift($data);
            if ($value >= $baseValue) {
                $right [] = $value;
            } else {
                $left[] = $value;
            }
        }

        return array_merge($this->fastSort($left), [$baseValue], $this->fastSort($right));
    }
}