export default {
    state:{
        category:[],
        post:[],
        blogpost:[],
        singlepost:[],
    },
    getters:{
        getCategory(state){
            return state.category
        },
        getPost(state){
            return state.post
        },
        getblogPost(state){
            return state.blogpost
        },
        singlepost(state){
            return state.singlepost
        },
    },
    actions:{
        allCategory(context){
            axios.get('/category')
                .then((response)=>{
                    // debugger;
                    // console.log(response.data.categories);
                    context.commit('categories',response.data.categories)
                })
        },
        allPost(context){
            axios.get('/post')
                .then((response)=>{
                    // debugger;
                    // console.log(response.data.posts);
                    context.commit('posts',response.data.posts)
                })
        },
        getblogPost(context){
            axios.get('/blogpost')
                .then((response)=>{
                    // debugger;
                    // console.log(response.data.blogpost);
                    context.commit('blogs',response.data.blogpost)
                })
        },
        getPostById(context,id){
            debugger;
            axios.get('/singlepost/'+id)
                .then((response)=>{
                    console.log(response.data.post);
                    context.commit('singlePost',response.data.post)
                })
        },
    },
    mutations:{
        categories(state,data){
            return state.category=data;
        },
        posts(state,data){
            return state.post=data;
        },
        blogs(state,data){
            return state.blogpost=data;
        },
        singlePost(state,payload){
            return state.singlepost = payload
        },
    }

}
