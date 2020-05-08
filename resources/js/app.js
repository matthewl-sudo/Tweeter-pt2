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

// Vue.use(require('vue-resource'));
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('InfiniteLoading', require('vue-infinite-loading'));

Vue.component('tweet', {
    template: `
    <div>
        <div class="card" v-for="(tweet, index) in tweets"
                :tweet="tweet"
                :key="index">
            <div class="card-header p-0">
                name
                <div class="btn-group float-right m-0">
                    <button type="button" class="btn btn-outline-info dropdown-toggle p-1" style="color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-paw"></i>
                    </button>
                    <div class="dropdown-menu" style="z-index:2;">
                        <form class="" action="/delete-tweet" method="post">
                            <button class="btn btn-danger btn-sm"type="submit" style="" name="tweet_id" value="Delete"><img src="~/images/litter-box.png" style="width:20%; float:left;" alt="litter-box">LitterBox/Delete</button>
                        </form>
                        <form class="" action="/update-tweet" method="post">
                            <textarea name="tweet" rows="2" cols="40" placeholder="Edit Tweet?"></textarea>
                            <button class="btn btn-dark"type="submit" style="" name="tweet_id" value="Update"><i class="fas fa-pen"></i> Update</button>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{tweet.id}"><i class="far fa-comment"></i></button>
                    <div class="modal fade" id="exampleModal{tweet.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form class="modal-content" action="/comments" method="post">
                                @submit.prevent
                                <input type="hidden" name="tweet_id" value="{tweet.id}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Comment on {{tweet.user_id}}'s Tweet?</h5>
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
                    <a class="btn btn-danger" href="/tweets/{tweet.id}/like"><i class="far fa-heart"></i>#</a>
                    <button class="btn btn-primary"><i class="fas fa-share-square"></i></button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View Comments
                        </button>
                    </div>
                </span>
            </div>
        </div>
    </div>
    `,
    data(){
        return{
            tweets:[],
            page: 1,
        };
    },
    methods: {
    fetchTweets() {
        var self = this;
        axios({
            method: 'get',
            url: '/code/tweeter-pt2/public/tweet?page='+this.page,
        }).then(function(response) {
            self.tweets = response.data.data;
            console.log(response.data);
            });
        },
    },
    mounted(){
        this.fetchTweets();
        console.log("bsbshb");
    }
});
const app = new Vue({
    el: '#app',
    methods: {

},
mounted() {
    console.log('its not working!!');
    }
});
