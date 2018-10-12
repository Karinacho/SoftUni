"use strict";
function solve(array) {
    // let sumIn = array.reduce((a, b) => a + b);
    let sumOrigin = 0;
    let sumChanged = 0;

    for (let i = 0; i < array.length; i++ ){
        let temp = array[i];
        sumOrigin += temp;

        if (temp % 2 === 0){
            array[i] = temp + i;
        } else {
            array[i] = temp - i;
        }

        sumChanged += array[i];
    }

    // let sumOut = array.reduce((a, b) => a + b);

    console.log(array);
    // console.log(sumIn);
    console.log(sumOrigin);
    // console.log(sumOut);
    console.log(sumChanged);

}
solve([-5, 11, 3, 0, 2]);