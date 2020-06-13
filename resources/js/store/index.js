export default {
    state:{
        category:[],
        post:[],
        blogpost:[],
        singlepost:[],
        latestpost:[]
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
        latestpost(state){
            return state.latestpost
        }
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
            axios.get('/singlepost/'+id)
                .then((response)=>{
                    context.commit('singlePost',response.data.post)
                })
        },
        latestPost(context){
            axios.get('/latestpost')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('latestpost',response.data.posts)
                })
        },
        getPostByCatId(context,payload){
            axios.get('/categorypost/'+payload)
                .then((response)=>{
                    context.commit('getPostByCatId',response.data.posts)
                })
        },
        RealSearch(context,payload){
            //get or post => get why?
            //there is not data attach it in your http request
            //attach with uri only keyword search
            //when data in your link then request is get
            axios.get('search?s='+payload)
                .then((response)=>{
                    context.commit('getSearchPost',response.data.blogpost)
                })
        }
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
        latestpost(state,payload){
            state.latestpost = payload
        },
        getPostByCatId(state,payload){
            state.blogpost = payload
        },
        getSearchPost(state,payload){
            console.log(payload);
            state.blogpost = payload
        }

    }

}
