function attachEvents(){
    $('#submit').on('click',function (){
        let data = {
            author: $('#author').val(),
            content: $('#content').val(),
            timestamp: Date.now()
        };
        $.ajax({
            url: 'https://messenger-9c8f0.firebaseio.com/messanger/.json',
            method: 'POST',
            data: JSON.stringify(data)

        }).then(function(){

                $('#content').val('');
                refresh();
        })
    })
    $('#refresh').on('click',refresh)
        function refresh(){
        $.ajax({
            method: "GET",
            url: 'https://messenger-9c8f0.firebaseio.com/messanger/.json',

        }).then(function(res){
            let messages = [];
            for (let message in res) {
                messages.push(res[message]);
            }
            messages = messages.sort((a,b) => a.timestamp > b.timestamp)
                .map(m => `${m.author}: ${m.content}`).join('\n');

            $('#messages').text(messages);


        })
    }
}