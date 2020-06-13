<template>
    <span id="sidebar">
        <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" @keyup="RealSearch" v-model="keyword" type="text" class="input-medium search-query">
<!--                 Todo:submit when (keyup=>'realtime' or click search button)-->
                    <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
<!--                    //here-->
                  <li v-for="category in getAllCategories"><i class="icon-angle-right"></i>
                      <router-link :to="`/categories/${category.id}`">{{category.cat_name}}
                      </router-link><span> (20)</span></li>
                </ul>
              </div>

                <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">

                  <li v-for="(post,index) in blogpost"  v-if="index<12">
                    <img :src="`uploadimage/${post.photo}`" class="pull-left" alt="" width="40" height="40"/>
                    <h6><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h6>
                    <p>
                     {{post.description | sortlength(100,"....")}}
                    </p>
                  </li>

                </ul>
              </div>


            </aside>
          </div>
    </span>
</template>

<script>
    import _ from 'lodash'
    export default {
        name: "BlogSidebar",
        data(){
            return {
                keyword:''
            }
        },
        mounted(){
            this.$store.dispatch('allCategory');
            this.$store.dispatch('latestPost');
        },
        computed:{
            getAllCategories(){
                return this.$store.getters.getCategory
            },
            blogpost(){
                return this.$store.getters.latestpost
            }
        },
        methods:{
            RealSearch:_.debounce(function () {
                this.$store.dispatch('RealSearch',this.keyword);
            },1000)
        }
    }
</script>

<style scoped>

</style>
