<?php

$firstNumbers = array_map('intval',explode(' ',readline()));
           $secondNumbers = array_map('intval',explode(' ',readline()));
           
            $minLength = min(count($firstNumbers), count($secondNumbers));

           $numbers = [];
           $result = [];

            for ($i = 0; $i < $minLength * 2; $i++)
            {
                if ($i % 2 == 0)
                {
                   array_push($numbers,array_shift($firstNumbers));
                }
                else
                {
                    array_push($numbers,array_pop($secondNumbers));
                }
            }

            if (count($firstNumbers)!==0)
            {
                sort($firstNumbers);
                $end = array_pop($firstNumbers);
                $start = array_shift($firstNumbers);

                for ($i = 0; $i < count($numbers); $i++)
                {
                    if ($numbers[$i] > $start && $numbers[$i] < $end)
                    {array_push($result,$numbers[$i]);
                    }
                }

                sort($result);
                echo implode(' ',$result);

            }

            if (count($secondNumbers)!==0) {
                sort($secondNumbers);
                $end = array_pop($secondtNumbers);
                $start = array_shift($secondNumbers);

                for ($i = 0; $i < count($numbers); $i++) {
                    if ($numbers[$i] > $start && $numbers[$i] < $end) {
                        array_push($result, $numbers[$i]);
                    }
                }

               sort($result);
                echo implode(' ', $result);
            }