<?php

namespace Greedy;

use phpDocumentor\Reflection\Types\Void_;

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

    public function check2($stations, $tankSize)
    {
        $result = [];
        $current = array_shift($stations);
        $tmpCur = false;
        while (($stations)) {
            $next = array_shift($stations);
            if ($next - $current <= $tankSize) {
                $tmpCur = $next;
            } else {
                if (!$tmpCur) {
                    return -1;
                }
                array_unshift($stations, $next);
                $current = $tmpCur;
                $result[] = $current;
                $tmpCur = false;

            }
        }

        return $result;
    }

    public function check3($stations, $tankSize)
    {
        $result = [];
        $currentStop = 0;

        while ($currentStop < count($stations)) {
            $nextStop = $currentStop;

            while (
                ($nextStop < count($stations)) &&
                ($stations[$nextStop + 1] - $stations[$currentStop] < $tankSize)
            ) {
                $nextStop++;
            }

            $currentStop = $nextStop;
            $result[] = $stations[$currentStop];
        }
    }
}

$stations = [0, 401, 550, 799, 900, 1000, 1200, 1500];
$tankSize = 400;


$g = new GasolineStations();
$res = ($g->check($stations, $tankSize));
$res2 = ($g->check2($stations, $tankSize));
$res3 = ($g->check3($stations, $tankSize));
print_r($res);
print_r($res2);
print_r($res3);