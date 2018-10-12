"use strict";
function solve(array) {
    let result = [];
    let indexOfMax = 0;

    for (let i = 0; i < array.length; i++){
        let maxElement = array[i];
        let resultLast = result[result.length - 1];
        for (let j = i; j < array.length; j++) {
            let temp = array[j];

            if (maxElement < temp) {
                maxElement = temp;
                indexOfMax = j;
                i = indexOfMax;
            }

        }
        if (!result.includes(maxElement)) {
            result.push(maxElement);
        }

    }

    console.log(result.join(' '));

}

solve([1, 4, 3, 2]);
solve([14, 24, 3, 19, 15, 17]);
solve([27, 19, 42, 2, 13, 45, 48]);
solve([0, 0, 0]);
solve([41, 41, 34, 20]);
solve([-141, -41, 34, 20]);