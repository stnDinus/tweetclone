<?php

namespace App\Models;

use App\Entities\Tweet;
use CodeIgniter\Model;

class TweetModel extends Model
{
  protected $table = 'tweets';
  protected $allowedFields = [
    'user_id', 'content', 'category'
  ];

  protected $returnType = \App\Entities\Tweet::class;
  public $rules = [
    'content' => 'required',
    'category' => 'required'
  ];

  public function newTweet($curUser, $post)
  {
    $tweet = new Tweet();
    $tweet->user_id = $curUser['userid'];
    $tweet->content = $post['content'];
    $tweet->category = $post['category'];
    $this->save($tweet);
  }

  public function getLatest()
  {
    return $this
      ->orderBy('created_at', 'desc')
      ->findAll();
  }

  public function getByCategory($category)
  {
    return $this
      ->where('category', $category)->orderBy('created_at', 'desc')
      ->findAll();
  }

  public function editTweet($post)
  {
    $tweet = $this->find($post['id']);
    if ($tweet) {
      $tweet->content = $post['content'];
      $tweet->category = $post['category'];
      $this->save($tweet);
      return true;
    } else {
      return false;
    }
  }

  public function delTweet($user_id, $tweet_id)
  {
    $tweet = $this->find($tweet_id);
    if ($tweet) {
      if ($user_id == $tweet->user_id) {
        $this->delete($tweet->id, true);
        return true;
      } else {
        return false;
      }
    }
  }
}
