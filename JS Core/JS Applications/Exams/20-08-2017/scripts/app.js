$(()=>{
    const app = Sammy('#container', function () {
        this.use('Handlebars', 'hbs');

        //GET method for the main page in app
        this.get('index.html', displayHome);


        //POST method for login
        this.post('#/login', function (ctx) {
            let username = ctx.params['username'];
            let password = ctx.params['password'];

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
            let password = ctx.params['password'];
            let passwordCheck = ctx.params['repeatPass'];

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
                    footer: './templates/common/footer.hbs',
                    header:'./templates/common/header.hbs',
                    loginForm: './templates/forms/loginForm.hbs',
                    registerForm: './templates/forms/registerForm.hbs'
                }).then(function () {
                    this.partial('./templates/viewHome.hbs');
                })
            } else {
                ctx.redirect('#/catalog');
            }
        }

        //get catalog
        this.get('#/catalog', function (ctx) {
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }

            posts.getAllPosts().then(function(posts){
                posts.forEach((f, i) => {
                         f.time=calcTime(f._kmd.ect )
                         f.rank=i+1;
                        f.isAuthor=f._acl.creator === sessionStorage.getItem('userId');

                });


                ctx.isAuth=auth.isAuth();
                ctx.post=posts
                ctx.username = sessionStorage.getItem('username');
                ctx.loadPartials({
                    footer:'./templates/common/footer.hbs',
                    navigation: './templates/navigation.hbs',
                    header: './templates/common/header.hbs'

                }).then(function(){
                    this.partial('./templates/viewCatalog.hbs')
                })
            })

        })


        //get submit
        this.get('#/submit',function(ctx){
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }
            ctx.isAuth=auth.isAuth();
            ctx.username = sessionStorage.getItem('username');
            ctx.loadPartials({
                footer:'./templates/common/footer.hbs',
                navigation: './templates/navigation.hbs',
                header: './templates/common/header.hbs'

            }).then(function(){
                this.partial('./templates/submitView.hbs')
            })
        })

        //post submit
        this.post('#/submit', function (ctx) {
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }
            ctx.isAuth = auth.isAuth();

            ctx.username = sessionStorage.getItem('username');
            let author= sessionStorage.getItem('username');
            let title=ctx.params.title;
            let description=ctx.params.comment;
            let url=ctx.params.url;
            let imageUrl=ctx.params.image;


            if (author.length === 0) {
                notify.showError('Author is required.')
            } else if (url.length === 0) {
                notify.showError('Url is required.')
            } else if (!url.startsWith('http')) {
                notify.showError('Url must be a valid link')
            } else {
                posts.createPost(author,description,imageUrl,title,url)
                    .then(function () {
                        notify.showInfo('Created post.');
                        ctx.redirect('#/catalog');
                    })
                    .catch(notify.handleError);
            }

        });

        this.get('#/myPosts',function(ctx){
            if (!auth.isAuth()) {
                displayHome(ctx)
                return;
            }

            posts.getMyPosts().then(function(posts){
                posts.forEach((f, i) => {
                           f.rank=i+1;
                    f.time=calcTime(f._kmd.ect )



                });
                ctx.post=posts

                ctx.isAuth=auth.isAuth();
                ctx.username = sessionStorage.getItem('username');
                ctx.loadPartials({
                    footer:'./templates/common/footer.hbs',
                    navigation: './templates/navigation.hbs',
                    header: './templates/common/header.hbs'

                }).then(function(){
                    this.partial('./templates/myPostsView.hbs')
                })

            })

        })

        this.get('#/edit/:postId', function (ctx) {
            let postId = ctx.params.postId;

            posts.postDetails(postId)
                .then(function(post)  {

                    ctx.isAuth = auth.isAuth();

                    ctx.username = sessionStorage.getItem('username');


                    ctx.post = post;

                    ctx.loadPartials({
                        footer: './templates/common/footer.hbs',
                        navigation: './templates/navigation.hbs',
                        header: './templates/common/header.hbs'
                    }).then(function () {
                        this.partial('./templates/editPostView.hbs');
                    })
                })
        });
        //POST edit
        this.post('#/edit/:postId', function (ctx) {
            let postId = ctx.params.postId;
            posts.postDetails(postId)
                .then(function (post) {

                ctx.post=post
                    let author= sessionStorage.getItem('username');
                    let title=ctx.params.title;
                    let description=ctx.params.description;
                    let url=ctx.params.url;
                    let imageUrl=ctx.params.image;



                    if (author.length === 0) {
                        notify.showError('Author is required.')
                    } else if (url.length === 0) {
                        notify.showError('Url is required.')
                    } else if (!url.startsWith('http')) {
                        notify.showError('Url must be a valid link')
                    } else {
                        posts.editPost(postId,author,description,imageUrl,title,url)
                            .then(function () {
                                notify.showInfo('Edited post.');
                                ctx.redirect('#/catalog');
                            })
                            .catch(notify.handleError);
                    }
                })
                .catch(notify.handleError);
        });

        //GET method  delete
        this.get('#/delete/:postId', function (ctx) {
            if (!auth.isAuth()) {
                ctx.redirect('#/catalog');
                return;
            }
            let postId = ctx.params.postId;

            posts.postDetails(postId)
                .then(function(post)  {



                    posts.deletePost(postId)
                        .then(function () {
                            notify.showInfo('Post deleted.');
                            ctx.redirect('#/catalog')
                        })
                        .catch(notify.handleError);
                })
                .catch(notify.handleError);
        });

        //get post details
        this.get('#/details/:postId', function (ctx) {
            let postId = ctx.params.postId;
            Promise.all([posts.postDetails(postId),posts.getPostComments(postId)])
                .then(function ([post,comments]) {

                    ctx.isAuth = auth.isAuth();
                    ctx.username = sessionStorage.getItem('username');
                    ctx.post = post;

                    ctx.comment=comments
                    post.time=calcTime(post._kmd.ect)
                    if(comments){
                        comments.forEach((c,i)=>{
                            c.commentAuthor = c._acl.creator === sessionStorage.getItem('userId');
                            c.time=calcTime(c._kmd.ect)
                        })
                    }


                    ctx.loadPartials({
                        footer: './templates/common/footer.hbs',
                        navigation: './templates/navigation.hbs',
                        header: './templates/common/header.hbs'
                    }).then(function () {
                        this.partial('./templates/commentsView.hbs');
                    })
                })
                .catch(notify.showInfo);
        });

        //POST for comment
        this.post('#/createComment', (ctx) => {
            let author = sessionStorage.getItem('username');
            let content = ctx.params.content;
            let postId = ctx.params.postId;

            if (content === '') {
                notify.showError('Cannot add empty comment!');
                return;
            }

            posts.createComment(author,content,postId)
                .then(() => {
                    notify.showInfo('Comment created!');
                    ctx.redirect(`#/details/${postId}`);
                })
                .catch(notify.showError);
        });

        this.get('#/:postId/comment/delete/:commentId',function(ctx){
            let commenttId=ctx.params.commentId;
            let postId=ctx.params.postId;
            console.log(postId)
            posts.deleteComment(commenttId).then( function(){
                notify.showInfo('Comment deleted!')
                ctx.redirect(`#/details/${postId}`)
            })



        })
        function calcTime(dateIsoFormat) {
            let diff = new Date - (new Date(dateIsoFormat));
            diff = Math.floor(diff / 60000);
            if (diff < 1) return 'less than a minute';
            if (diff < 60) return diff + ' minute' + pluralize(diff);
            diff = Math.floor(diff / 60);
            if (diff < 24) return diff + ' hour' + pluralize(diff);
            diff = Math.floor(diff / 24);
            if (diff < 30) return diff + ' day' + pluralize(diff);
            diff = Math.floor(diff / 30);
            if (diff < 12) return diff + ' month' + pluralize(diff);
            diff = Math.floor(diff / 12);
            return diff + ' year' + pluralize(diff);
            function pluralize(value) {
                if (value !== 1) return 's';
                else return '';
            }
        }




    })
    app.run();
    });