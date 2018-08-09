$(()=> {

    const app = Sammy('#container', function () {
        this.use('Handlebars', 'hbs');

        //GET method for the main page in app
        this.get('index.html', displayHome);


        //POST method for login
        this.post('#/login', function (ctx) {
            let username = ctx.params['username'];
            let password = ctx.params['pass'];

            if (username === '' || password === '') {
                notify.showError('All fields are required.')
            } else {
               auth.login(username, password)
                    .then(function (userData) {
                        auth.saveSession(userData);
                        notify.showInfo('Login successful.');
                        ctx.redirect('#/catalog');
                    }).catch(notify.handleError);
            }
        });

        //POST method for registration
        this.post('#/register', function (ctx) {
            let username = ctx.params['username'];
            let password = ctx.params['pass'];
            let passwordCheck = ctx.params['checkPass'];

            if (!/^.{5,}$/.test(username)) {
                notify.showError('Username must be at least five characters long!')
                displayHome(ctx)
            } else if (password === '' || password.length === 0 || passwordCheck === '' || passwordCheck.length === 0) {
                notify.showError('Passwords input fields shouldn’t be empty.')
                displayHome(ctx)
            } else if (password !== passwordCheck) {
                notify.showError('Password do not match.')
                displayHome(ctx)
            } else {
               auth.register(username, password)
                    .then(function (userData) {
                        auth.saveSession(userData);
                        notify.showInfo('User registration successful.');
                        ctx.redirect('#/catalog');
                    }).catch(notify.handleError);
            }
        });

        this.get('#/catalog', function (ctx) {
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }

        flightService.getPublishedFlights().then(function(flights){
            flights.forEach((f, i) => {
                let fDate = new Date(f._kmd.lmt);
                console.log(fDate)
                f.date = fDate.getDay();
                console.log(f.date)

            });


            ctx.isAuth=auth.isAuth();
            ctx.flight=flights
            ctx.username = sessionStorage.getItem('username');
            ctx.loadPartials({
                footer:'./templates/common/footer.hbs',
                nav: './templates/common/nav.hbs',


            }).then(function(){
                this.partial('./templates/viewHome.hbs')
            })
})

        })

//POST method for logout
        this.get('#/logout', (ctx) => {
           auth.logout()
                .then(() => {
                    sessionStorage.clear();
                    notify.showInfo('Logout successful.');
                    displayHome(ctx)
                })
                .catch(notify.handleError);
        });
        function displayHome(ctx) {
            if (!auth.isAuth()) {

                ctx.loadPartials({
                    footer: './templates/common/footer.hbs'
                }).then(function () {
                    this.partial('./templates/welcome-anonymous.hbs');
                    })
            } else {
                ctx.redirect('#/catalog');
            }
        }
        //GET addFlight
        this.get('#/addFlight', function (ctx) {
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }
            ctx.isAuth = auth.isAuth();

            ctx.username = sessionStorage.getItem('username');
            ctx.loadPartials({
                footer: './templates/common/footer.hbs',
                nav: './templates/common/nav.hbs',
            }).then(function () {
                this.partial('./templates/addFlight.hbs');
            }).catch(notify.handleError)
        });
        //post addFlight
        this.post('#/addFlight', function (ctx) {
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }
            ctx.isAuth = auth.isAuth();

            ctx.username = sessionStorage.getItem('username');
           let destination= ctx.params.destination;
           let origin=ctx.params.origin;
           let departureDate=ctx.params.departureDate;
            let departureTime=ctx.params.departureTime;
           let seats=Number(ctx.params.seats)
            let cost=ctx.params.cost;
           let image=ctx.params.img;
           console.log(image)
          let isPublic='false'
          if(ctx.params.public==='on'){
              isPublic='true'
          }
            let validNumberType = /^\d+\.*\d*$/;

            if (destination.length === 0) {
                notify.showError('Destination is required.')
            } else if (origin.length === 0) {
                notify.showError('Origin is required.')
            } else if (!validNumberType.test(seats)) {
                notify.showError('Seats must be a valid number.')
            } else if (!validNumberType.test(cost)) {
                notify.showError('Cost must be a valid number.')
            } else {
                flightService.createFlight(departureTime,isPublic,image,cost,seats,departureDate,origin,destination)
                    .then(function () {
                        notify.showInfo('Created flight.');
                        ctx.redirect('#/catalog');
                    })
                    .catch(notify.handleError);
            }

            });
        //get flight details
        this.get('#/details/:flightId', function (ctx) {
            let flightId = ctx.params.flightId;
            flightService.flightDetails(flightId)
                .then(function (flight) {
                    ctx.isAuth = auth.isAuth();
                    ctx.username = sessionStorage.getItem('username');
                     ctx.flight = flight;

                    ctx.loadPartials({
                        footer: './templates/common/footer.hbs',
                        nav: './templates/common/nav.hbs',
                    }).then(function () {
                        this.partial('./templates/flightDetails.hbs');
                    })
                })
                .catch(notify.showInfo);
        });
        //GET edit
        this.get('#/edit/:flightId', function (ctx) {
            let flightId = ctx.params.flightId;

            flightService.flightDetails(flightId)
                .then((flight) => {
                    if(flight._acl.creator !== sessionStorage.getItem('userId')){
                        ctx.redirect('#/catalog');
                        notify.showError('You can edit only your flight.');
                        return;
                    }
                    ctx.isAuth = auth.isAuth();

                    ctx.username = sessionStorage.getItem('username');

                    if(flight.isPublished === 'true'){
                        ctx.isPublished = 'true'
                    }else {
                        ctx.isPublished = 'false'
                    }

                    ctx.flight = flight;

                    ctx.loadPartials({
                        footer: './templates/common/footer.hbs',
                        nav: './templates/common/nav.hbs',
                    }).then(function () {
                        this.partial('./templates/viewEditFlight.hbs');
                    })
                })
        });

        //POST edit
        this.post('#/edit/:flightId', function (ctx) {
            let flightId = ctx.params.flightId;
            flightService.flightDetails(flightId)
                .then(function (flight) {
                    if(flight._acl.creator !== sessionStorage.getItem('userId')){
                        ctx.redirect('#/catalog');
                        notify.showError('You can delete only your flight.');
                        return;
                    }

                    let destination = ctx.params['destination'];
                    let origin = ctx.params['origin'];
                    let departureDate = ctx.params['departureDate'];
                    let departureTime = ctx.params['departureTime'];
                    let seats = ctx.params['seats'];
                    let cost = ctx.params['cost'];
                    let img = ctx.params['img'];
                    let isPublic = 'false';

                    if (ctx.params['public'] === 'on') {
                        isPublic = 'true';
                    }

                    let validNumberType = /^\d+\.*\d*$/;

                    if (destination.length === 0 || origin.length === 0) {
                        notify.showError('Destination and  origin are required.')
                    } else if (!validNumberType.test(seats)) {
                        notify.showInfo('Seats must be a valid number.')
                    } else if (!validNumberType.test(cost)) {
                        notify.showInfo('Cost must be a valid number.')
                    } else {
                        flightService.editFlight(flightId, isPublic, img, cost, seats, departureDate, departureTime, origin, destination)
                            .then(function () {
                                notify.showInfo('Successfully edited flight.');
                                ctx.redirect('#/details/' + flightId);
                            })
                            .catch(notify.handleError);
                    }
                })
                .catch(notify.handleError);
        });
        //GET my flights
        this.get('#/flights', function (ctx) {
            flightService.getMyFlights()
                .then(function (fligths) {


                    ctx.isAuth = auth.isAuth();
                    ctx.username = sessionStorage.getItem('username');
                    ctx.flights = fligths;

                    ctx.loadPartials({
                        footer: './templates/common/footer.hbs',
                        nav: './templates/common/nav.hbs',
                    }).then(function () {
                        this.partial('./templates/viewMyFlights.hbs')
                    })
                })
                .catch(notify.handleError);
        });

//GET method  delete
        this.get('#/delete/:flightId', function (ctx) {
            if (!auth.isAuth()) {
                ctx.redirect('#/catalog');
                return;
            }
            let flightId = ctx.params.flightId;

            flightService.flightDetails(flightId)
                .then(function (fligth) {
                    if(fligth._acl.creator !== sessionStorage.getItem('userId')){
                        ctx.redirect('#/catalog');
                        notify.showError('You can delete only your flight.');
                        return;
                    }

                    flightService.deleteFlight(flightId)
                        .then(function () {
                            notify.showInfo('Flight deleted.');
                            ctx.redirect('#/flights')
                        })
                        .catch(notify.handleError);
                })
                .catch(notify.handleError);
        });



    })
    app.run()
})