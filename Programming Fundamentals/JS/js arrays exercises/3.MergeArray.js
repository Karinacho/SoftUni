function solve(first, second){
    let result=[];
    for(let i=0;i<first.length;i++){
        if(i%2!==0){
            result[i]=first[i]+second[i];
        }else{
            result[i]=Number(first[i])+Number(second[i]);
            }
    }
    console.log(result.join(' - '));
}
solve(["13", "12312", "5", "77", "4"],
    ["22", "333", "5", "122", "44"]

)