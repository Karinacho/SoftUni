<?php

$encryptedMessage =readline();

            $numberList = [];
           $charList = [];

            for($i=0;$i<strlen($encryptedMessage);$i++)
            {
                if (is_numeric($encryptedMessage[$i]))
                {
                    $num = intval($encryptedMessage[$i]);
                    array_push($numberList,$num);
                }
                else
                {
                   array_push($charList,$encryptedMessage[$i]);
                }
            }

            $takeList =[];
           $skipList = [];

            for ($i = 0; $i < count($numberList); $i++)
            {
                if ($i % 2 == 0)
                {
                    array_push($takeList,$numberList[$i]);
                }
                else
                {
                    array_push($skipList,$numberList[$i]);
                }
            }

           $result = '';
            $total = 0;

            for ($i = 0; $i < count($skipList); $i++)
            {
               $skipCount = $skipList[$i];
                $takeCount = $takeList[$i];
                $temp=implode('',$charList);
                $result .= substr($temp,$total,$takeCount);
                $total += $skipCount + $takeCount;
            }

            echo $result;