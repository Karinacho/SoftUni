"use strict";
function solve(array) {
    let arrNew = array[0].split(' ');
    for (let i = 0; i < arrNew.length; i++){
        let temp = arrNew[i];
        temp = Number(temp);
        arrNew[i] = temp;
    }
    let control = Number(array[1]);

    for (let i = 0; i < arrNew.length - 1; i++){
        for (let j = i + 1; j < arrNew.length; j++){
            let first = arrNew[i];
            let second = arrNew[j];

            if (first + second === control){
                console.log(`${first} ${second}`);
            }

        }
    }

}

//solve(['1 7 6 2 19 23', 8]);
//solve(['14 20 60 13 7 19 8', 27]);
solve(['1 2 3 4 5 6', 6]);
