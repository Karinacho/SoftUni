<?php

$x1 = floatval(readline());
$y1 = floatval(readline());
$x2 = floatval(readline());
$y2 = floatval(readline());

$x3 = floatval(readline());
$y3 = floatval(readline());
$x4 = floatval(readline());
$y4 = floatval(readline());

$lengthOfFirstPair = LineLength($x1, $y1, $x2, $y2);
$lengthOfSecondPair = LineLength($x3, $y3, $x4, $y4);
$result = "";
            if ($lengthOfFirstPair >= $lengthOfSecondPair)
            {
                $result = closestPointToCenter($x1, $y1, $x2, $y2);
               echo $result;
            }
            else
            {
                $result = closestPointToCenter($x3, $y3, $x4, $y4);
                echo $result;
            }


       function LineLength($x1, $y1, $x2, $y2)
        {
            $differenceBetwenX = abs($x1 - $x2);
            $differenceBetwenY = abs($y1 - $y2);
            $line = sqrt(pow($differenceBetwenX,2)+ pow($differenceBetwenY,2));
            return $line;
        }

        function closestPointToCenter($x1, $y1, $x2, $y2)
        {
            $coordinates = "";
            if (pow($x1, 2) + pow($y1, 2) <= pow($x2, 2) + pow($y2, 2)) {
                $coordinates = "($x1, $y1)($x2, $y2)";
            } else {
                $coordinates = "($x2, $y2)($x1, $y1)";
            }
            return $coordinates;
        }