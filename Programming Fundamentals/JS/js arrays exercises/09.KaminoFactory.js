function solve(input){
    let seqLength=input.shift();
    let biggestCount=0;
    let index=0;
    let bestStart=-1;
    let currentstart=-1;
    let currentCount=0;
    let currentBest=0;
    let bestCurrentStart=-1;
    let currentSum=0;
    let currentBestSum=0;

    for(let i=0;i<input.length;i++){
        let currentArr=input[i].split('!').map(Number);
        // You should select the sequence with the longest subsequence of ones.

        for(let k=0;k<currentArr.length;k++){

            if(currentArr[k]===1){
                currentCount++;

                if(currentstart===-1){
                    currentstart=k;
                }
            }else{
                if(currentBest<currentCount){
                    currentBest=currentCount;
                    bestCurrentStart=currentstart;

                }
                currentCount=0;
                currentstart=-1;


            }
            if(currentBest<currentCount){
                currentBest=currentCount;
                bestCurrentStart=currentstart;

            }



        }

        currentSum=currentArr.reduce(function(a,b) {return a+b},0)
        //If there are several sequences with same length of subsequence of ones, print the one with the leftmost starting index
        // if there are several sequences with same length and starting index, select the sequence with the greater sum of its elements
        if(currentBest>biggestCount){
            biggestCount=currentBest;
            index=i;
            bestStart=bestCurrentStart;
            currentBestSum=currentSum;
        }
        else if(currentBest===biggestCount){
            if(bestCurrentStart<bestStart){
                index=i;
                bestStart=bestCurrentStart;
                currentBestSum=currentSum;

            }else if(bestCurrentStart===bestStart){
                if(currentSum>currentBestSum){
                    currentBestSum=currentSum;
                    index=i;
                }
            }
        }//else if(bestCurrentStart===bestStart){
        // if(currentBest>biggestCount){
        //   index=i;

        // }
        // }
        currentCount=0;
        currentstart=-1;
        currentBest=0;
        bestCurrentStart=-1;
    }
   let arrFinal=input[index].split('');
    arrFinal=arrFinal.filter(w=>w!=='!');

    //console.log(arrFinal)
    console.log(`Best DNA sample ${index+1} with sum: ${currentBestSum}`);
    console.log(arrFinal.join(' '));
   // console.log()
}
solve([4,
    '1!1!0!1',
    '1!0!0!1',
    '1!1!0!0'
])
solve([5,
    '1!0!1!1!0',
    '0!1!1!0!0'
])
solve([5,
    '1!0!1!1!1!',
    '0!1!1!1!0!',
    '1!1!1!0!0!',
    '1!1!1!0!0!',
    '1!1!1!0!0!'])
solve([3,
    '0!0!0',
    '0!0!0',
    '0!0!0'])
solve([4,
    '1!1!1!1',
    '1!1!1!1',
    '1!1!1!1'])
solve([9,
    '1!0!1!1!0!1!1!0!0',
    '1!0!1!1!0!1!1!0!0',
    '1!0!1!1!0!1!1!0!1'])
solve([8,
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!0!1!1!1!1!1!1',
    '1!1!1!1!1!1!1!1'])
solve([10,
    '1!0!1!1!0!1!1!!1!0!1',
    '1!0!1!1!0!1!1!!1!1!!0',
    '1!1!0!1!1!!1!1!!0!1!0'])
solve([20,
    '1!0!1!1!0!1!1!!1!0!1!!!1!0!1!1!0!1!1!!1!0!1',
    '1!0!1!1!0!1!1!!1!1!!0!!!1!0!1!1!0!1!1!!1!1!!0',
    '1!1!0!1!1!!1!1!!0!1!0!!!1!1!0!1!1!!1!1!!0!1!0'])
solve([1,
    '1',
    '1',
    '1'])
solve([10,
    '1!0!1!1!0!1!1!!1!0!1'])
solve([100,
    '1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1!1!0!1!1!0!1!1!!1!0!1'])