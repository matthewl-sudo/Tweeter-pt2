<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Tweetlike;
use App\Comment;
use App\Userprofile;
use App\User;
use DB;
use Auth;
use App\Follower;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $tweetModel = new Tweet();
        $tweets = $tweetModel->orderBy('created_at', 'DESC')->with('comment')->get();

        $tweetsContainer = [];
        foreach ($tweets as $tweet) {//like counter
            $aTweet = [];
            $aTweet["tweet_id"] = $tweet->id;
            $aTweet["tweet"] = $tweet->tweet;
            $tweetLikesArray = Tweetlike::where('tweet_id', $tweet->id)->get();
            $tweetLikes = count($tweetLikesArray);
            $aTweet["likes"] = $tweetLikes;
            $tweetsContainer[$tweet->id] = $aTweet;
        }
        $userId = Auth::user()->id;
        $userModel = new User();
        $userProfileModel = new Userprofile();
        $userprofiles = $userProfileModel->where('user_id', $userId)->get();
        $users = $userModel->with('userprofile','follower')->get();

        $usersContainer = [];
        foreach ($users as $user) {
            $aUser = [];
            $aUser["id"] = $user->id;
            $aUser["name"] = $user->name;
            $usersContainer[$user->id] = $aUser;
        }
        $followUsers = Follower::all();
        $followArr = [];
        foreach ($followUsers as $followUser) {
            $follower = [];
            $follower['user_id'] = $followUser->user_id;
            $follower['follower_id'] = $followUser->follower_id;
            $followerCount = Follower::where('follower_id', $userId)->get();
            $totalFollowers = count($followerCount);
            $follower['followers'] = $totalFollowers;
            $followingCount = Follower::where('user_id', $userId)->get();
            $totalFollowing =count($followingCount);
            $follower['following'] = $totalFollowing;
            $followArr[$followUser->user_id] = $follower;
        }
        // var_dump($followArr);
        // die();
        // dd($followUsers[0]);
        return view('home', compact('tweets', 'tweetsContainer', 'followUsers', 'follower','users', 'followArr','user','usersContainer'));
    }

    public function showUserprofile(){
        $user = Auth()->user();
        $userId = $user->id;
        $userModel = new User();
        $userProfileModel = new Userprofile();
        $userprofiles = $userProfileModel->where('user_id', $userId)->get();
        $users = $userModel->where('id', $userId)->get();

        return view('profile', compact('userprofiles','users'));
    }
}
