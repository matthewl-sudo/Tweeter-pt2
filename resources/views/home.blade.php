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
                <form class="" action="/create-tweet" method="post">
                    <div class="mb-3 col-md-11 d-inline">
                        @csrf
                        <textarea class="form-control mb-2" id="" placeholder="What's happening?" name="tweet" value="{{old('tweet')}}" required></textarea>
                        <input type="submit" class="btn btn-info mb-2 float-right" name="id" value="Tweet">
                    </div>
                </form>
            </div>
            <div id="app">
                <tweet></tweet>
                <!-- <tweetscomponent>HIIII</tweetscomponent> -->
            </div>
        </div>
        <div class="col col-md-4  d-none d-lg-block" id="sidebar" style="z-index:1;">
            <aside class="ticky-nav">
                <ul class="nav float-right">
                    <!-- Search form -->
                    <form class="search-bar">
                        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-3">
                           <div class="input-group">
                                <input type="search" placeholder="Search name or #" aria-describedby="button-addon1" class="form-control border-0 bg-light">
                                <div class="input-group-append">
                                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- <div class="" id="followers-box">


                    </div> -->
                    <h5>Hey {{ucwords(Auth::user()->name)}}!<br>Here are some people to follow</h5>
                    <div class="list-group" style="width:150%;">
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
                                    <img src="{{$user->userprofile->image_url}}" style="width:15%;" alt="litter-box">
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
            </aside>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->
<!-- <script type="text/javascript">var currentUser ="<? $user->id ?>";</script>
<script type="text/javascript" src="/js/followers-populate.js"></script> -->
@endsection
