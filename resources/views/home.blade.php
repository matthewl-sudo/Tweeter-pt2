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
        <div class="col col-md-4  d-none d-lg-block" id="sidebar">
            <nav class=" sticky-top">
                <ul class="nav float-right">
                    <div class="" id="followers-box">


                    </div>
                </ul>
            </nav>
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
