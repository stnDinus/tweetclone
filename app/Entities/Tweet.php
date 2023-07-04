<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use \App\Models\LikeModel;
use App\Models\UserModel;

class Tweet extends Entity
{
  public function getCreatedAt(string $format = 'd-m-Y')
  {
    $this->attributes['created_at'] = $this->mutateDate($this->attributes['created_at']);
    $timezone = $this->timezone ?? app_timezone();
    $this->attributes['created_at']->setTimezone($timezone);
    return $this->attributes['created_at']->format($format);
  }

  public function getAuthor() {
    return (new UserModel())->where("id", $this->attributes["user_id"])->first();
  }

  public function countLikes()
  {
    return (new LikeModel())
      ->select("count(tweet_id) as count")
      ->where("tweet_id", $this->attributes["id"])
      ->first()["count"];
  }

  public function likedBy($user_id)
  {
    return (new LikeModel())
      ->where(["tweet_id" => $this->attributes["id"], "user_id" => $user_id])
      ->first() == true;
  }
}
