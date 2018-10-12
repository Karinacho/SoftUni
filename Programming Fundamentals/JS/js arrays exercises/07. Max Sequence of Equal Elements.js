'use strict';
function solve(array) {
    let arrNew = array[0].split(' ');
    for (let i = 0; i < arrNew.length; i++){
        let temp = arrNew[i];
        temp = Number(temp);
        arrNew[i] = temp;
    }

    // console.log(arrNew);
    let tempCount = 0;
    let maxArray = [];
    let prev = 0;
    let curr = 0;

    for (let i = 1; i <= arrNew.length; i++){
        prev = arrNew[i - 1];
        curr = arrNew[i];
        tempCount++;
        if (prev !== curr){
            let index = maxArray[tempCount];
            if (index === undefined){
                maxArray[tempCount] = prev;
            }

            tempCount = 0;
        }
    }

    let indexLast = maxArray[tempCount];
    if (indexLast === undefined){
        maxArray[tempCount] = prev;
    }

    let result =  maxArray[maxArray.length - 1];
    let repeat= maxArray.length - 1;

    let lastArr = [];

    for (let i = 0; i < repeat; i++ ){
        lastArr[i] = result;
    }

    console.log(lastArr.join(' '));


}

solve(['2 1 1 2 3 3 2 2 2 1']);

 solve(['1 1 1 2 3 1 3 3']);
 solve(['1, 1, 1, 2, 3, 1, 3, 3']);
 solve(['4 4 4 4']);
 solve(['0 1 1 5 2 2 6 3 3']);

