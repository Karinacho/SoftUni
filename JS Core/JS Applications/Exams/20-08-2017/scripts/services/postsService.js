let posts = (() => {

    function getAllPosts() {

        const endpoint = `posts?query={}&sort={"_kmd.ect": -1}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }

     function createPost(author,description,imageUrl,title,url) {
        let data = { author,description,imageUrl,title,url };
       return remote.post('appdata', 'posts', 'kinvey', data);
    }
    function createComment(author,content,postId){
        let data={author,content,postId};
        return remote.post('appdata', 'comments', 'kinvey', data);
    }

    function deleteComment(commentId) {
        const endpoint = `comments/${commentId}`;
        return remote.remove('appdata', endpoint, 'kinvey');
    }
    function getPostComments(postId){
        const endpoint=`comments?query={"postId":"${postId}"}&sort={"_kmd.ect": -1}`
        return remote.get('appdata',endpoint,'kinvey')
    }

    function editPost(postId,author,description,imageUrl,title,url) {
        const endpoint = `posts/${postId}`;
        let data = { author,description,imageUrl,title,url };
        return remote.update('appdata', endpoint, 'kinvey', data);
    }

    function deletePost(postId) {
        const endpoint = `posts/${postId} `;
        return remote.remove('appdata', endpoint, 'kinvey');
    }

    function getMyPosts() {
        let username = sessionStorage.getItem('username');
        const endpoint = `posts?query={"author":"${username}"}&sort={"_kmd.ect": -1}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }


    function postDetails(postId) {
        const endpoint = `posts/${postId}`;
        return remote.get('appdata', endpoint, 'kinvey');
    }

    return {
        getAllPosts,
        createPost,
        createComment,
        deleteComment,
        getPostComments,
        editPost,
        deletePost,
        getMyPosts,
        postDetails

    }
})();