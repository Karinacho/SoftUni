function attachEvents(){
    const USERNAME = 'peter'
    const PASSWORD = 'p'
    const BASE_64 = btoa(USERNAME + ':' + PASSWORD)
    const AUTH = {"Authorization": 'Basic ' + BASE_64}
$('#btnLoadPosts').on('click',function(){
    $('#posts').empty()
    const URL = 'https://baas.kinvey.com/appdata/kid_SJOg4rG4Q/'

    $.ajax({
        method:"GET",
        url: URL + 'posts',
        headers: AUTH
    }).then(function (res){
        for(let post in res){
            console.log(res[post]._id)
            let opt=$('<option>').attr('value',res[post]._id).text(res[post].title)
            $('#posts').append(opt)

        }
    })
})
    $('#btnViewPost').on('click',function(){
           let selected=$('#posts>option:selected').attr('value')
        let url=`https://baas.kinvey.com/appdata/kid_SJOg4rG4Q/`
        $.ajax({
            method:"GET",
            url:url+'posts/'+selected,
            headers: AUTH
        }).then(function(postRes){
            let url=`https://baas.kinvey.com/appdata/kid_SJOg4rG4Q/`
            $.ajax({
                method:"GET",
                url:url+`comments/?query={"post_id":"${selected}"}`,
                headers: AUTH
            }).then(function(commentsRes){
                $('#post-body').empty();
               $('#post-comments').empty()
                console.log((postRes))
                console.log(commentsRes)
                $('#post-title').text(postRes.title)
                $('#post-body').append($('<li>').text(postRes.body))
                for(let comm in commentsRes){
                    $('#post-comments').append($('<li>').text(commentsRes[comm].text))
                }
            })
        })

    })
}