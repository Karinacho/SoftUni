function loadContacts() {
    $('#phonebook').empty()
    let url = 'https://phonebook-e8588.firebaseio.com/phonebook.json'
    $.ajax({
        method: "GET",
        url: url

    }).then(function (res) {
     console.log(res)
for(let cont in res){
      let name=res[cont].person;
      let phone=res[cont].phone
    let li=$('<li>').text(name + ': ' + phone)
    let a=$('<a>').attr('href','#').text(' [Delete]').on('click',function(){
$.ajax({
    method: "DELETE",
    url: 'https://phonebook-e8588.firebaseio.com/phonebook/'+ cont +'.json'
}).then(function (){
    li.remove()
}).catch(function(err){

})
    });
      li.append(a)
    $('#phonebook').append(li)
}


    })
}
function createContact(){
    let person=$('#person').val()
    let phone=$('#phone').val()
    $.ajax({
        method: "POST",
        url: 'https://phonebook-e8588.firebaseio.com/phonebook.json',
        data: JSON.stringify({person,phone})
    }).then( function(){
        $('#person').val('')
        $('#phone').val('')
    }).catch(function (){

    })
}