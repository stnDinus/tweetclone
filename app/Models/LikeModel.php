<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Tweet;
use App\Entities\User;

class LikeModel extends Model
{
  protected $table            = 'likes';
  protected $primaryKey       = ['tweet_id', 'user_id'];
  protected $protectFields    = false;
  // protected $allowedFields    = [];

  // Validation
  protected $validationRules      = [
    "tweet_id" => "required|integer",
  ];

  public function like($user_id, $tweet_id)
  {
    $this->insert(["user_id" => $user_id, "tweet_id" => $tweet_id]);
  }

  public function unlike($user_id, $tweet_id)
  {
    $this->where(["user_id" => $user_id, "tweet_id" => $tweet_id])->delete();
  }

  public function getUserLikes($user_id)
  {
    $this->tempReturnType = Tweet::class;
    return $this
      ->where("likes.user_id", $user_id)
      ->join("tweets", "likes.tweet_id = tweets.id")
      ->findAll();
  }

  public function getTweetLikes($tweet_id)
  {
    $this->tempReturnType = User::class;
    return $this
      ->where("likes.tweet_id", $tweet_id)
      ->join("users", "likes.user_id = users.id")
      ->findAll();
  }
}
