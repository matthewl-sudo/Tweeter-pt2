@extends('layouts.app')


@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col col-md-8 p-0">
            <div class="card">
                <span class="card-header d-inline float-left text-center m-0 p-0">
                    <h4 class="mt-1">Scratching Post</h4>
                    <span class="login-message d-inline">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Purrrrfect! You are logged in!
                    </span>
                </span>
                <form class="" action="/tweets" method="post">
                    <div class="mb-3 col-md-11 d-inline">
                        @csrf
                        <textarea class="form-control mb-2" id="" placeholder="What's happening?" name="tweet" value="{{old('tweet')}}" required></textarea>
                        <input type="submit" class="btn btn-info mb-2 float-right" name="id" value="Tweet">
                    </div>
                </form>
            </div>
            @foreach($tweets as $tweet)
            <div class="card" id="app">
                <tweetscomponent>HIIII</tweetscomponent>
                <div class="card-header p-0">
                    @:{{ucwords($usersContainer[$tweet->user_id]['name'])}}
                    <div class="btn-group float-right m-0">
                    @if($tweet->user_id == Auth::user()->id)
                        <button type="button" class="btn btn-outline-info dropdown-toggle p-1" style="color:black;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-paw"></i>
                        </button>
                        <div class="dropdown-menu" style="z-index:2;">
                            <form class="" action="/delete-tweet{{$tweet->id}}" method="post">
                                @CSRF
                                <button class="btn btn-danger btn-sm"type="submit" style="" name="tweet_id" value="Delete"><img src="/images/litter-box.png" style="width:20%; float:left;" alt="litter-box">LitterBox/Delete</button>
                            </form>
                            <form class="" action="/update-tweet{{$tweet->id}}" method="post">
                                @CSRF
                                <textarea name="tweet" rows="2" cols="40" placeholder="Edit Tweet?"></textarea>
                                <button class="btn btn-dark"type="submit" style="" name="tweet_id" value="Update"><i class="fas fa-pen"></i> Update</button>
                            </form>
                        </div>
                    @else
                        <div class="" style="height:2rem">
                        </div>
                    @endif
                    </div>
                </div>
                <div class="card-body">
                    <small class="float-right">
                        {{date('F d Y',strtotime($tweet->created_at))}} at {{date('g:ia',strtotime($tweet->created_at))}}
                    </small>
                    <blockquote class="blockquote mb-0">
                        <p>
                            {{$tweet->tweet}}
                        </p>
                    </blockquote>
                    <span class="icons">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$tweet->id}}"><i class="far fa-comment"></i></button>
                        <div class="modal fade" id="exampleModal{{$tweet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form class="modal-content" action="/comments" method="post">
                                    @csrf
                                    <input type="hidden" name="tweet_id" value="{{$tweet->id}}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Comment on {{ucwords($usersContainer[$tweet->user_id]['name'])}}'s Tweet?</h5>
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
                        <a class="btn btn-danger" href="/tweets/{{$tweet->id}}/like"><i class="far fa-heart"></i>{{$tweetsContainer[$tweet->id]['likes']}}</a>
                        <button class="btn btn-primary"><i class="fas fa-share-square"></i></button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                View Comments
                            </button>
                            <div class="dropdown-menu">
                                <span class="d-inline w-100">
                                @foreach($tweet->comment as $comment)
                                {{ucwords($usersContainer[$comment->user_id]['name'])}}-
                                {{$comment->comment}}
                                @if($comment->user_id == Auth::user()->id)
                                    <form class="" action="/delete-comment{{$comment->id}}" method="post">
                                        @CSRF
                                        <input class="btn btn-sm btn-danger" type="submit" name="comment" value="Delete">
                                    </form>
                                @endif
                                </span>
                                <div class="dropdown-divider"></div>
                                @endforeach
                            </div>
                        </div>
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col col-md-4  d-none d-lg-block" id="sidebar">
            <nav class=" sticky-top">
                <ul class="nav float-right">
                    <div class="" id="followers-box">


                    </div>
                    <h5>Hey {{ucwords(Auth::user()->name)}}!<br>Here are some people to follow</h5>
                    <div class="list-group">
                        @if(session()->has('message'))
                        <p class="alert alert-success"> {{ session()->get('message') }}</p>
                        @endif
                        @if(isset($followArr[Auth::user()->id]))
                            Following: {{$followArr[Auth::user()->id]['following']}}
                            Followers: {{$followArr[Auth::user()->id]['followers']}}
                        @endif
                        @foreach($users as $user)
                            @if($user->id != Auth::user()->id)  <!-- Ignores current user -->
                            <div class="list-group-item list-group-item-action flex-column align-items-start p-1">
                                <span class="d-flex w-100 justify-content-between">
                                    <img src="{{$user->userprofile->image_url}}" alt="litter-box">
                                    <h6 class="mb-1">{{ucwords($user->name)}}</h6>
                                    <small>{{$user->userprofile->location}}</small>
                                    <form class="d-block" action="/follow{{$user->id}}" method="post">
                                        @CSRF
                                        <input class="btn btn-sm btn-info" type="submit" name="{{$user->id}}" value="Follow">
                                    </form>
                                </span>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">var currentUser ="<? $user->id ?>";</script>
<script type="text/javascript" src="/js/followers-populate.js"></script>
@endsection
