$(()=>{
    const usernameReg = /^[A-Za-z]{5,}$/;

    const app = Sammy('#container', function () {
        this.use('Handlebars', 'hbs');

//GET method for the main page in app
        this.get('index.html', displayHome);
        this.get('#/home', displayHome);

        //POST method for login
        this.post('#/login', function (ctx) {
            let username = ctx.params['username-login'];
            let password = ctx.params['password-login'];

            if (!usernameReg.test(username)) {
                notify.showError('Username must contains only english alphabet letters and must be at least five characters long!')
            } else if (password==='') {
                notify.showError('Password required!')
            } else {
                auth.login(username, password)
                    .then(function (userData) {
                        auth.saveSession(userData);
                        notify.showInfo('User login successful!');
                        ctx.redirect('#/catalog');
                    }).catch(notify.handleError);
            }
        });

        //POST method for registration
        this.post('#/register', function (ctx) {
            let username = ctx.params['username-register'];
            let password = ctx.params['password-register'];
            let repeatPass = ctx.params['password-register-check'];

            if (!usernameReg.test(username)) {
                notify.showError('Username must contains only english alphabet letters and must be at least five characters long!')
            } else if (password==='' || repeatPass==='') {
                notify.showError('Password !required1')
            } else if (password !== repeatPass) {
                notify.showError('Password do not match!')
            } else {
                auth.register(username, password)
                    .then(function (userData) {
                        auth.saveSession(userData);
                        notify.showInfo('User registration successful!');
                        ctx.redirect('#/catalog');
                    }).catch(notify.handleError);
            }
        });
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

        //GET method for catalog
        this.get('#/catalog', function (ctx) {
            if (!auth.isAuth()) {
                ctx.redirect('#/home');
                return;
            }

            receipt.getActiveReceipt()
                .then(function (receipts) {
let receiptId;
                    let total=0;
                 if(receipts.length===0){
                     receipt.createReceipt(0,0,true)
                     console.log('created')
                 }else {
                      receipts.forEach((r, index) => {
                       ctx.id=r._id;
                       receiptId=r._id;

                     //     post.cretedTime = calcTime(post._kmd.ect);
                     //     post.isAuthor = post._acl.creator === sessionStorage.getItem('userId');
                      });
                 }

                     ctx.isAuth = auth.isAuth();
                     ctx.username = sessionStorage.getItem('username');
                    // ctx.posts = posts;
                    receipt.getEntriesByReceiptId(receiptId).then(function(entries){

                             ctx.entry=entries;
                             ctx.productCount=entries.length;
                        entries.forEach((e, index) => {
                                       e.subtotal=(e.qty*e.price).toFixed(2);

                                    total+=Number(e.subtotal);

                            ctx.redirect('#/catalog')

                            //     post.cretedTime = calcTime(post._kmd.ect);
                            //     post.isAuthor = post._acl.creator === sessionStorage.getItem('userId');
                        });

ctx.total=total.toFixed(2)
                        ctx.loadPartials({
                            header: './templates/common/header.hbs',
                            footer: './templates/common/footer.hbs',
                            //post: './templates/catalog/post.hbs'
                        }).then(function () {
                            this.partial('./templates/displayHome.hbs')
                        })
                        //
                    })
                })
                .catch(notify.handleError);
        });
//allreceipts

        this.get('#/myPosts',function(ctx){
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }
let total=0;
           receipt.getMyReceipts().then(function(rec){
                rec.forEach((f, i) => {
                    total+=Number(f.total)
                    let date = new Date(f._kmd.lmt);
                    let year = date.getFullYear();
                    let month = date.getMonth();
                    let day = date.getUTCDate();
                    let hour = date.getHours();
                    let minutes = date.getMinutes();

                   f.date =  `${year}-${month}-${day} ${hour}:${minutes}`;

                });
ctx.totally=total.toFixed(2)
                ctx.receipt=rec

                ctx.isAuth=auth.isAuth();
                ctx.username = sessionStorage.getItem('username');
                ctx.loadPartials({
                    footer:'./templates/common/footer.hbs',

                    header: './templates/common/header.hbs'

                }).then(function(){
                    this.partial('./templates/allReceipts.hbs')
                })

            })

        })
//POST checkout
        this.post('#/checkout/:receiptId', function (ctx) {
            let receiptId = ctx.params.receiptId;


            //total,productCount,active


                    let total=ctx.params.total;
                    let productCount=ctx.params.productCount



             if (productCount===0) {
                        notify.showError('Cannot checkout empty receipt.')

                    }
                    else {
                        receipt.commitReceipt(receiptId,total,productCount,false)
                            .then(function () {
                                notify.showInfo('Receipt checked out');

                                ctx.redirect('#/catalog');
                            })
                            .catch(notify.handleError);
                    }


        });

        //GET for details entry
        this.get('#/details/:receiptId',function (ctx) {
            let receiptId = ctx.params.receiptId;
            receipt.receiptDetails(receiptId)
                .then(function (receiptd) {

                    receipt.getEntriesByReceiptId(receiptId)
                        .then(function (entries) {
                            entries.forEach((entry,index) => {
                                entry.subtotal = entry.price * entry.qty;
                            });

                            ctx.username = sessionStorage.getItem('username');
                            ctx.entries = entries;

                            ctx.loadPartials({
                                footer: './templates/common/footer.hbs',
                                header: './templates/common/header.hbs',
                            }).then(function () {
                                this.partial('./templates/detailsView.hbs')
                            }).catch(notify.handleError)
                        })
                        .catch(notify.handleError);
                })
                .catch(notify.handleError)
        })

        this.post('#/addEntry' ,function(ctx){
            if (!auth.isAuth()) {
                ctx.redirect('#/home');
                return;
            }
            let type = ctx.params.type;

            let qty = ctx.params.qty;
            let price = ctx.params.price;
            let receiptId=ctx.params.receiptId;

            if (type===''){
                notify.showError('Product name required!')
            } else if (isNaN(qty)) {
                notify.showError('Valid quality required')
            } else if (isNaN(price)) {
                notify.showError('Valid price required')
            } else {
                receipt.addEntry(receiptId, price, qty, type)
                    .then(function () {
                        notify.showInfo('Entry created.');
                        ctx.redirect('#/catalog');
                    })
                    .catch(notify.handleError)
            }
        })

        //GET for delete entry
        this.get('#/deleteEntry/:entryId/:subtotal',function (ctx) {
            let entryId = ctx.params.entryId;

           receipt.deleteEntry(entryId)
                .then(function () {
                    notify.showInfo('Entry deleted.');
                    ctx.redirect('#/catalog');
                })
                .catch(notify.handleError)
        })
//Show different view if user isAuth
        function displayHome(ctx) {
            if (!auth.isAuth()) {
                ctx.loadPartials({

                    footer: './templates/common/footer.hbs',
                    loginForm: './templates/forms/loginForm.hbs',
                   registerForm: './templates/forms/registerForm.hbs'
                }).then(function () {
                    this.partial('./templates/welcomeView.hbs');
                })
            } else {
                ctx.redirect('#/catalog');
            }
        }




    })
    app.run();
    });