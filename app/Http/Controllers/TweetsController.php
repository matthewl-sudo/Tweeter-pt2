<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tweet;
use App\Comment;
use App\Userprofile;
use App\Tweetlike;
use DB;
use App\Follower;
use App\User;

class TweetsController extends Controller
{
    public function index(Request $request){
        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(10);
        // dd($request);
        return response()->json($tweets);

        // $tweets = Tweet::orderBy('created_at', 'desc')->get();
        // return response()->json($tweets);
        // var_dump(response()->json($tweets));

        // $tweets = Tweet::all();
        // // var_dump($tweets);
        // return $tweets->toJson();
    }
    public function saveTweet(Request $request){//create tweet
        $user = Auth::user();
        $userId = $user->id;
        $incomingTweet = $request->tweet;
        // var_dump($incomingTweet);
        $tweet = new Tweet();
        $tweet->user_id = $userId;
        $tweet->tweet = $incomingTweet;
        $tweet->save();
        return redirect('/home');
    }
    public function deleteTweet($tweet_id){
        $deleteTweet = Tweet::findOrFail($tweet_id);//find that tweet id and destroy it.
        // var_dump($id);
        $deleteTweet->delete();
        return redirect('/home');
    }
    public function updateTweet(Request $request, $tweet_id){
        $updateTweet = Tweet::findOrFail($tweet_id);//find that tweet id and update it.
        $incomingUpdate = $request->tweet;
        $updateTweet->tweet = $incomingUpdate;
        $updateTweet->save();
        return redirect('/home');
    }
    public function saveComment(Request $request){//Create Comment
        $user = Auth::user();
        $userId = $user->id;
        $incomingComment = $request->comment;

        $comment = new Comment();
        $comment->user_id = $userId;
        $comment->tweet_id = $request->tweet_id;
        $comment->comment = $incomingComment;
        // var_dump($incomingComment);
        $comment->save();
        return redirect('/home');
    }
    public function deleteComment($comment_id){//Delete Comment
        $deleteComment = Comment::find($comment_id);
        // var_dump($id);
        // die();
        $deleteComment->delete();
        return redirect('/home');
    }
    public function saveUserProfile(Request $request){//save user form information
        $userId = Auth::user()->id;
        $incomingAddress = $request->address;
        $incomingLocation = $request->location;
        $incomingLocation2 = $request->location2;
        $incomingImage = $request->image;
        $incomingGender = $request->gender;
        $incomingAge = $request->age;
        $incomingPhone = $request->phone;

        $newUserProfile = \App\Userprofile::updateOrCreate(//query table for ID that matches.
        ['user_id' => $userId],  //If found it will update it, else it will make one

        ['address' => $incomingAddress,
        'location' => $incomingLocation.', '.$incomingLocation2,
        'image_url' => $incomingImage,
        'gender' => $incomingGender,
        'age' => $incomingAge,
        'phone' => $incomingPhone]);
        // var_dump($newUserProfile);
        return redirect('/profile');
    }
    public function likeTweet(Request $request, $id){
        $tweetId = $id;
        $user = Auth::user();
        $userId = $user->id;
        $tweetlikeModel = DB::table('tweetslikes')
                            ->where('user_id','=',$userId)//find record that matches query
                            ->where('tweet_id','=',$tweetId)->first();
        if(isset($tweetlikeModel)){//if record exists then delete it.
            $deletelike = Tweetlike::where('user_id','=',$userId)
                                   ->where('tweet_id','=',$tweetId)->first();
            $deletelike->delete();
            return redirect('/home');
        }
        else{//else save a record in the table.
            $tweetlikeModel = new Tweetlike();
            $tweetlikeModel->tweet_id = $tweetId;
            $tweetlikeModel->user_id = $userId;
            $tweetlikeModel->save();
            return redirect('/home');
        }
    }
    public function saveFollowing(Request $request, $id){//Follow a User
        $userId = Auth::user()->id;
        $followerId = $id;
        $followerModel = Follower::where('user_id','=', $userId)
                                 ->where('follower_id','=', $followerId)->first();
        if(isset($followerModel)){//delete follow

            $deleteFollowing = Follower::where('user_id', $userId)
                                       ->where('follower_id', $followerId)->first();
            $deleteFollowing->delete();
            return redirect('/home')->with('message', 'Unfollowed');
        }
        else {// save follow
            $follow = new Follower();
            $follow->user_id = $userId;
            $follow->follower_id = $followerId;
            $follow->save();
            return redirect('/home')->with('message', 'Following');
        }
    }
    public function getTweets(){
        $allTweets = Tweet::all();
        $allTweetsJson = json_encode($allTweets);
        return $allTweetsJson;
        // var_dump($allTweetsJson);
    }
    public function getUsers(){
        return json_encode(User::all());
    }
    public function followUserApi(){

    }
}
