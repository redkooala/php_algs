<?php

namespace Algo\Greedy;


class GasolineStations
{
    public function check($stations, $tankSize)
    {
        $result = [];
        $current = $stations[0];
        $size = count($stations);

        for ($i = 1; $i < $size; $i++) {
            if (($stations[$i] - $stations[$i - 1] > $tankSize)) {
                return -1;
            }
            if ($stations[$i] - $current > $tankSize) {
                $current = $stations[$i - 1];
                array_push($result, $current);
            }
        }

        return $result;
    }
}

$stations = [0, 401, 550, 799, 900, 1000, 1200, 1500];
$tankSize = 400;


$g = new GasolineStations();
$res = ($g->check($stations, $tankSize));
print_r($res);
