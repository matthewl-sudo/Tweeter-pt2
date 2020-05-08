<template>
    <div class="card-header p-0">
        <h1 v-for="(tweet, index) in tweets"
                :tweet="tweet"
                :key="index"
                >{{tweet.tweet_id}}</h1>
        <div class="btn-group float-right m-0">
            <button type="button" class="btn btn-outline-info dropdown-toggle p-1" style="color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-paw"></i>
            </button>
            <div class="dropdown-menu" style="z-index:2;">
                <form class="" action="/delete-tweet" method="post">
                    <button class="btn btn-danger btn-sm"type="submit" style="" name="tweet_id" value="Delete"><img src="/images/litter-box.png" style="width:20%; float:left;" alt="litter-box">LitterBox/Delete</button>
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
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted yay!')
        },
        data(){
            return{
                tweets:[]
            }
        },
        methods: {
        fetchTweets() {
            var self = this;
            axios({
                method: 'get',
                url: '/home',
            }).then(function(response) {
                self.tweets = response.data;
                console.log(response.data);
                });
            }
        }
    }
</script>
