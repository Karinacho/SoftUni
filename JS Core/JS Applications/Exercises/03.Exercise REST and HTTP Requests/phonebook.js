function attachEvents(){
    $('#btnLoad').on('click',function(){
        $('#phonebook').empty()
        let url='https://phonebook-e8588.firebaseio.com/phonebook'
        $.ajax({
            method: "GET",
            url: url+'.json'
        }).then(function (res){
            console.log(res)
            for(let pers in res){
                let li=$('<li>').text(res[pers].person +': ' + res[pers].phone)
                let btn=$('<button>').text('[Delete]').on('click',function(){
                    $.ajax({
                        method:"DELETE",
                        url: url+'/'+pers +'.json'
                    }).then(function(){
                        li.remove();
                    })

                })
                li.append(btn);
                $('#phonebook').append(li)
                console.log(res[pers].person)
            }
        })
    })
    $('#btnCreate').on('click',function(){
        let url='https://phonebook-e8588.firebaseio.com/phonebook'
        let person=$('#person').val();
        let phone=$('#phone').val();
        let data={person:person,phone:phone}
        $.ajax({
            method:"POST",
            url:url+'.json',
            data: JSON.stringify(data)
        }).then(function(){
            $('#person').val('');
            $('#phone').val('');
        })
    })
}