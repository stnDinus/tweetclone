<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LikeModel;
use App\Models\UserModel;
use App\Models\TweetModel;

class Likes extends BaseController
{
  public function like($tweet_id)
  {
    $user_id = session()->get("currentuser")["userid"];
    if (!(new TweetModel)->where(["id" => $tweet_id, "user_id" => $user_id])->first()) {
      (new LikeModel())->like($user_id, $tweet_id);
    };
  }

  public function unlike($tweet_id)
  {
    $user_id = session()->get("currentuser")["userid"];
    (new LikeModel())->unlike($user_id, $tweet_id);
  }

  public function getUserLikes($user_id)
  {
    $data["user"] =  (new UserModel())->find($user_id);
    $data["tweets"] = (new LikeModel())->getUserLikes($user_id);
    return view("user_likes", $data);
  }

  public function getTweetLikes($tweet_id)
  {
    $data["users"] = (new LikeModel())->getTweetLikes($tweet_id);
    $data["tweet"] = (new TweetModel()) ->find($tweet_id);
    return view("tweet_likes", $data);
  }
}
