<?php

$arr= array_map('intval',explode(' ',readline()));

            $firstTotalTime = 0.0;
            $secondTotalTime = 0.0;

            for ($i = 0; $i < (count($arr) / 2)-1; $i++)
            {
                if ($arr[$i] === 0)
                {

                    $firstTotalTime = $firstTotalTime * 0.8;

                }
                else
                {
                    $firstTotalTime += $arr[$i];

                }
            }

            for ($i = count($arr) - 1; $i >= (count($arr) / 2)-1; $i--)
            {
                if ($arr[$i] === 0)
                {
                    $secondTotalTime = $secondTotalTime * 0.8;
                }
                else
                {
                    $secondTotalTime += $arr[$i];
                }
            }


            if ($firstTotalTime < $secondTotalTime)
            {
                echo "The winner is left with total time:$firstTotalTime";
            }
            else
            {
                echo "The winner is right with total time:$secondTotalTime";
            }