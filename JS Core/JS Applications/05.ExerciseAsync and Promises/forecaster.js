function attachEvents(){
$('#submit').on('click',submitClick)

    function submitClick(){
        let url='https://judgetests.firebaseio.com/locations.json'
        $.ajax({
            method:"GET",
            url: url
        }).then(function(res){
           let location=$('#location').val()
            let code=''
           for(let cod in res){
               if(res[cod].name===location){
                   code=res[cod].code
               }
           }
currentConditions(code)
            threeDays(code)


        })

        }
    function currentConditions(code){
        $.ajax({
            method:"GET",
            url: `https://judgetests.firebaseio.com/forecast/today/${code}.json`
        }).then(function(res){
            $('#forecast').attr("style", "display:block")
            $('#current').empty();
            $('#current')
                .append($(' <div class="label">Current conditions</div>'))

            $('#current').append($(`<span class="condition symbol">${symbols(res.forecast.condition)}</span>`));
            $('#current').append($('<span>').addClass('condition').append($('<span>').addClass('forecast-data').text(res.name))
                .append($('<span>')
                    .addClass('forecast-data')
                    .html(`${res.forecast.low}&#176;/${res.forecast.high}&#176;`))
                .append($('<span>')
                    .addClass('forecast-data').text(res.forecast.condition)))
        })


    }
    function threeDays(code){
        $.ajax({
            method:"GET",
            url: `https://judgetests.firebaseio.com/forecast/upcoming/${code}.json`
        }).then(function(res){
            $('#upcoming').empty();
            $('#upcoming')
                .append($('<div class="label">Three-day forecast</div>'))


            for(let x in res.forecast) {
                $('#upcoming').append($('<span>').addClass('upcoming')
                    .append($('<span>').addClass('symbol').html(symbols(res.forecast[x].condition)))
                   .append($('<span>').addClass('forecast-data').html(`${res.forecast[x].low}&#176;/${res.forecast[x].high}&#176;`))
                    .append($('<span>').addClass('forecast-data').html(res.forecast[x].condition))
                )
            }
        })
    }
    function symbols(symb){
    switch(symb){
        case 'Sunny':
            return  '&#x2600;'

        case 'Partly sunny':
        return '&#x26C5;'

        case 'Overcast':
            return '&#x2601;'

        case 'Rain':
            return '&#x2614;'


    }
    }
    }
