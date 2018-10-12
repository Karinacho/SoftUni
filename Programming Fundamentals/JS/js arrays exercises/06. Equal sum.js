'use strict';
function solve(array) {
    let index = 0;
    let result = [];

    for (let i = 0; i <array.length; i++){
        let leftSum = 0;
        let rightSum = 0;

        for (let j = 0; j < array.length; j++){
            if (j < i){
                leftSum += array[j];
            } else if (j > i) {
                rightSum += array[j];
            }
        }

        index = i;

        if (leftSum === rightSum){
            result.push(index);
        }


    }

    if (result.length > 0){
        console.log(result.join(' '));
    } else {
        console.log('no');
    }


}

solve([1, 2, 3, 3]);
solve([0, 0, 0]);
solve([1, 2]);
solve([1]);
solve([1, 2, 3]);
solve([10, 5, 5, 99, 3, 4, 2, 5, 1, 1, 4]);
solve([1, 1, 1, 1]);


// second solution
// 'use strict';
// function solve(array) {
//     let result = [];
//
//     for (let i = 0; i <array.length; i++){
//         let substrLeft = [];
//         let substrRight = [];
//         let leftSum = 0;
//         let rightSum = 0;
//         substrLeft = array.slice(0, i);
//         substrRight = array.slice(i + 1,);
//
//         if (substrLeft.length === 0){
//             leftSum = 0;
//         } else {
//             leftSum = substrLeft.reduce((a, b) => a + b);
//         }
//
//         if (substrRight.length === 0){
//             rightSum = 0;
//         } else {
//             rightSum = substrRight.reduce((a, b) => a + b);
//         }
//
//         if (leftSum === rightSum){
//             result.push(i);
//         }
//
//
//     }
//
//     if (result.length > 0){
//         console.log(result.join(' '));
//     } else {
//         console.log('no');
//     }
//
//
// }

// solve([1, 2, 3, 3]);
// solve([0, 0, 0]);
// solve([1, 2]);
// solve([1]);
// solve([1, 2, 3]);
// solve([10, 5, 5, 99, 3, 4, 2, 5, 1, 1, 4]);
// solve([1, 1, 1, 1]);
