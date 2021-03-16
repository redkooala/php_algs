<?php

include 'vendor/autoload.php';

function insertSort(array $data): array
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


    return array_merge($result, $left, $right);
}


function bubbleSort(array $data): array
{
    $k = 0;
    $size = (int)count($data);
    for ($i = 0; $i < $size; $i++) {
        ++$k;
        for ($j = 0; $j < $size - $i - 1; $j++) {
            ++$k;
            if ($data[$j] > $data[$j + 1]) {
                $tmp = $data[$j];
                $data[$j] = $data[$j + 1];
                $data[$j + 1] = $tmp;
            }
        }
    }

    var_dump($k);
    return $data;
}

$data = [7, 3, 5, 1, 12, -5,2, 4, 3, 15, 22, -4 , 121, 0 ,18 ,3 , 5, 22, 21, 16, 13, 12, 12, 14];
$res = (bubbleSort($data));

$k = 0;
function fastSort(array $data)
{
    global $k;
    $size = count($data);

    if ($size < 2) {
        return $data;
    }

    $baseValue = array_shift($data);
    $left = [];
    $right = [];
    while (count($data)) {
        $k ++;

        $value = array_shift($data);
        if ($value >= $baseValue) {
            $right [] = $value;
        } else {
            $left[] = $value;
        }
    }
    var_dump($k);
    return array_merge(fastSort($left), [$baseValue], fastSort($right));
}

var_dump($k);
$res = (fastSort($data));
print_r($res);