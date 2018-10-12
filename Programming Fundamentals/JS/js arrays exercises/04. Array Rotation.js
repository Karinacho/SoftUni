"use strict";
function solve(array, round) {

    for (let i = 0; i < round; i++){
        let firstEl = array[0];
        array.splice(0, 1);
        array.push(firstEl);
    }

    console.log(array.join(' '));

}

solve([51, 47, 32, 61, 21], 2);
solve([32, 21, 61, 1], 4);
solve([2, 4, 15, 31], 5);