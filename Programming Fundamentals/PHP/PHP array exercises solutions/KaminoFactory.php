<?php


$sequenceLength=intval(readline());
$sequences='';
$biggestCount=0;
$index=0;
$bestStart=-1;
$currentstart=-1;
$currentCount=0;
$currentBest=0;
$bestCurrentStart=-1;
$currentSum=0;
$currentBestSum=0;
$currentIndex=-1;
$arr=[];
while(($sequences=readline())!== "Clone them!"){


    $currentSequence=trim(str_replace("!","",$sequences));
    $currentSequence=str_split ( $currentSequence );
    $currentSequence=array_map('intval',$currentSequence);
    $currentIndex++;
   // print_r ($currentSequence);

    array_push($arr,$currentSequence);
    // You should select the sequence with the longest subsequence of ones.
    for($k=0;$k<count($currentSequence);$k++){

        if($currentSequence[$k]===1){
            $currentCount++;

            if($currentstart===-1){
                $currentstart=$k;
            }
        }else{
            if($currentBest<$currentCount){
                $currentBest=$currentCount;
                $bestCurrentStart=$currentstart;

            }
            $currentCount=0;
            $currentstart=-1;


        }
        if($currentBest<$currentCount){
            $currentBest=$currentCount;
            $bestCurrentStart=$currentstart;

        }



    }

    $currentSum=array_sum($currentSequence);
    //If there are several sequences with same length of subsequence of ones, print the one with the leftmost starting index
    // if there are several sequences with same length and starting index, select the sequence with the greater sum of its elements
    if($currentBest>$biggestCount){
        $biggestCount=$currentBest;
        $index=$currentIndex;
        $bestStart=$bestCurrentStart;
        $currentBestSum=$currentSum;
    }
    else if($currentBest===$biggestCount){
        if($bestCurrentStart<$bestStart){
            $index=$currentIndex;
            $bestStart=$bestCurrentStart;
            $currentBestSum=$currentSum;

        }else if($bestCurrentStart===$bestStart){
            if($currentSum>$currentBestSum){
                $currentBestSum=$currentSum;
                $index=$currentIndex;
            }
        }
    }//else if(bestCurrentStart===bestStart){
    // if(currentBest>biggestCount){
    //   index=i;

    // }
    // }
    $currentCount=0;
    $currentstart=-1;
    $currentBest=0;
    $bestCurrentStart=-1;
}
$currentInd=$index+1;
echo "Best DNA sample $currentInd with sum: ${currentBestSum}.".PHP_EOL;
echo implode(' ',$arr[$index]).PHP_EOL;
// echo     "$currentSum";


