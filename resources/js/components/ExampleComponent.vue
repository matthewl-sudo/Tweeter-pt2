<template>
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong> Laravel Vue JS Infinite Scroll - ItSolutionStuff.com</strong></div>

                    <div class="card-body">
                        <div>
                          <p v-for="item in list">
                            <a v-bind:href="'https://itsolutionstuff.com/post/'+item.slug" target="_blank">{{item.title}}</a>
                          </p>
                          <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
              tweets: [],
              page: 1,
            };
          },
          methods: {
              infiniteHandler($state) {
                  let vm = this;

                  this.$http.get('/code/tweeter-pt2/public/tweet/'+this.page)
                      .then(response => {
                          return response.json();
                      }).then(data => {
                          $.each(tweets.data, function(key, value) {
                                  vm.tweets.push(value);
                          });
                          $state.loaded();
                      });

                  this.page = this.page + 1;
            },
        },
    }
</script>
