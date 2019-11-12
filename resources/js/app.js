/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


// Vue.component('tweetscomponent', tweetscomponent);
// Vue.component('tweetscomponent', require('./components/tweetscomponent.vue'));
// import tweetscomponent from './components/tweetscomponent.vue';
// Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.use(require('vue-resource'));
Vue.component('InfiniteLoading', require('vue-infinite-loading'));

Vue.component('comments',{//Dropdown Display For Comments
    props: ['tweet'],
    template:`
    <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            View Comments
        </button>
        <div class="dropdown-menu">
            <div class="d-inline w-100" v-for="(comment, index) in tweet.comment">
            <p>{{comment.comment}} {{comment.id}} </p>
                    <form class="" v-bind:action="'/delete-comment/'+comment.id" method="post" @submit.prevent>
                        <input class="btn btn-sm btn-danger" type="submit" name="comment" value="Delete">
                    </form>
            </div>
            <div class="dropdown-divider"></div>
        </div>
    </div>
    `,
    data(){
        return{
            comments: [],
        };
    },
    methods:{
        fetchComments() {
            var self = this;
            axios({
                method: 'get',
                url: '/',
            }).then(function(response) {
                // console.log(response.data);
                self.songs = response.data;
            });
        },
        fetchSongs() {
            var self = this;
            axios({
                method: 'get',
                url: '/songs',
            }).then(function(response) {
                // console.log(response.data);
                self.songs = response.data;
            });
        },
    },
    mounted(){
        // console.log(this.tweet.comment);
    }
});

Vue.component('tweet', { //Tweet Card 'News' Feed
    template: `
    <div>
        <div class="card" v-for="(tweet, index) in tweets"
                :tweet="tweet"
                :key="index"
                :action="tweet.id">
            <div class="card-header p-0">
                <strong> @{{tweet.user.name}} | User Id:{{tweet.user_id}} | Tweet Id:{{tweet.id}} | Index:{{index}}</strong>
                <div class="btn-group float-right m-0">
                    <button type="button" class="btn btn-outline-info dropdown-toggle p-1" style="color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-paw"></i>
                    </button>
                    <div class="dropdown-menu" style="z-index:2;">
                        <form class="" v-bind:action="'/destoy-tweet/'+tweet.id" method="post" @submit.prevent>
                            <button class="btn btn-danger btn-sm" type="submit" style="" name="tweet_id" value="Delete"><img src="/images/litter-box.png" style="width:20%; float:left;" alt="litter-box">LitterBox/Delete</button>
                        </form>
                        <form class="" :action="'/update-tweet/'+tweet.id" method="post">
                            <textarea name="tweet" rows="2" cols="40" placeholder="Edit Tweet?"></textarea>
                            <button class="btn btn-dark" type="submit" style="" name="tweet_id" value="Update"><i class="fas fa-pen"></i> Update</button>
                        </form>
                    </div>
                    <div class="" style="height:2rem">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <small class="float-right">
                    {{tweet.created_at}}
                </small>
                <blockquote class="blockquote mb-0">
                    <p>
                        {{tweet.tweet}}
                    </p>
                </blockquote>
                <span class="icons">
                    <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#exampleModal'+tweet.id"><i class="far fa-comment"></i></button>
                    <div class="modal fade" :id="'exampleModal'+tweet.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form class="modal-content" action="/comments" method="post">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" name="tweet_id" :value="tweet.id">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Comment on {{tweet.user.name}}'s Tweet?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <textarea class="modal-body" name="comment">

                                </textarea>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="user_id" class="btn btn-primary">Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <button class="btn btn-success"><i class="fas fa-retweet"></i></button>
                    <!-- <button class="btn btn-danger"><i class="far fa-heart"></i>#</button> -->
                    <a class="btn btn-danger"  @click="likeTweet(tweet.id)" ><i class="far fa-heart"></i>#</a>
                    <button class="btn btn-primary"><i class="fas fa-share-square"></i></button>
                    <comments :tweet="tweet" >

                    </comments>
                </span>
            </div>
        </div>
        <infinite-loading @distance="1" @infinite="infiniteHandler" spinner="bubbles">
        <div slot="no-more">No More Tweets🙀😿</div>
        </infinite-loading>
    </div>
    `,
    data(){
        return{
            tweets:[],
            page: 0,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    methods: {
        infiniteHandler($state){
            let self = this;
            this.page += 1;
            this.$http.get('/tweet?page='+this.page)
                .then(response => {
                    return response.json();
                }).then(data =>{
                    if(data.data.length){
                        // console.log(data.data);
                    $.each(data.data, function(key, value){
                        self.tweets.push(value);
                    });
                    // console.log(self.tweets);
                    $state.loaded();
                    }
                    else{
                     $state.complete();
                    }
            });
        },
        destroyTweet(tweet) {
            axios({
                method: 'post',
                url: '/destroy-tweet/'+this.tweet.id,
                data: tweet,
            });
            alert();
        },
        likeTweet(id) {
            axios({
                method: 'get',
                url: '/tweets/'+this.tweet.id+'/like',
                data: tweet,
            });
        }
    },
    mounted(){
        // this.fetchTweets();
        console.log("mounting confirm");
    }
});
const app = new Vue({
    el: '#app',
    methods: {

},
mounted() {
    console.log('component working!!');
    }
});
