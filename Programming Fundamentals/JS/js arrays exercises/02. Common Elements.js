"use strict";
function solve(array) {
    let halfSIze = (array.length / 2);
    let firstHalf = new Array();
    let secondHalf = [];
    let result = new Array;


    for (let i = 0; i < halfSIze; i++){
        firstHalf[i] = array[i];
        secondHalf[i] = array[array.length - 1 - i];
    }

    for (let i = 0; i < halfSIze; i++){
        for (let j = 0; j < halfSIze; j++){
            if ( firstHalf[i] === secondHalf[j]){
                result[i] = firstHalf[i];
                secondHalf.slice(j, 1);
            }

        }}

    //console.log(firstHalf);
   // console.log(secondHalf);

    for (let i = 0; i < result.length; i++){
        if (result[i] !== undefined){
            console.log(result[i]);
        }
    }

}
solve(['Hey', 'hello', 2, 4, 'Pesho', 'e', 'Pecho', 10, 'hey', 4, 'hello', '2']);
//solve(['S', 'o', 'f', 't', 'U', 'n', 'i', ' ', 's', 'o', 'c', 'i', 'a', 'l']);