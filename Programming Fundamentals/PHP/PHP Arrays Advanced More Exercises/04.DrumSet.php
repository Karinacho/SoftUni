<?php


$savings = floatval(readline());
            $drums = array_map('intval',explode(' ',readline()));
            $copy = $drums;

            $input = null;

            while (($input =readline())!= "Hit it again, Gabsy!")
            {
                $hitPower = intval($input);

                for ($index = 0; $index < count($drums); $index++)
                {
                    $drums[$index] -= $hitPower;
                }
                for ($index = 0; $index < count($drums); $index++)
                {
                    if ($drums[$index] <= 0)
                    {
                        $price = $copy[$index] * 3;
                        if ($price > $savings)
                        {
                            array_splice($drums,$index,1);
                            array_splice($copy,$index,1);

                        }
                        else
                        {
                            $savings -= $price;
                            $drums[$index] = $copy[$index];
                        }
                    }
                }


            }

            echo implode(' ',$drums).PHP_EOL;
         printf ("Gabsy has %.2flv.",$savings);