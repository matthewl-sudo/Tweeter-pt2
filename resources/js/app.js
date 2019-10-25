/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import tweetscomponent from './components/tweetscomponent.vue';

Vue.component('tweetscomponent', tweetscomponent);
// Vue.component('tweetscomponent', require('./components/tweetscomponent.vue'));

Vue.component('tweetsomponent', {
    template: `
    <div class="card-header p-0">
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
    `,
    data() {
        return {
            tweet: "",
        }
    }
});
const app = new Vue({
    el: '#app',
    methods: {

},
mounted() {
    console.log('its working');
    }
});