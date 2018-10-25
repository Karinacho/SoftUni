<?php

$x1 = floatval(readline());
$y1 = floatval(readline());
$x2 = floatval(readline());
$y2 =floatval(readline());




        function closestPointToCenter($x1, $y1, $x2, $y2)
        {
           $coordinates = "";
            if ( pow($x1, 2) + pow($y1, 2) <= pow($x2, 2) + pow($y2, 2)) {
                $coordinates = "($x1, $y1)";
            } else {
                $coordinates = "($x2, $y2)";
            }
            return $coordinates;
            }

           echo closestPointToCenter($x1,$y1,$x2,$y2);