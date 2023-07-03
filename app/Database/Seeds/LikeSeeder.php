<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LikeSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        "user_id" => 3,
        "tweet_id" => 33
      ],
      [
        "user_id" => 4,
        "tweet_id" => 33
      ],
      [
        "user_id" => 2,
        "tweet_id" => 33
      ],
      [
        "user_id" => 4,
        "tweet_id" => 32
      ],
    ];

    foreach ($data as $like) {
      $this->db->table('likes')->insert($like);
    }
  }
}
