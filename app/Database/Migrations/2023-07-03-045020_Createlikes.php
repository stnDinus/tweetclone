<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createlikes extends Migration
{
  public function up()
  {
    $this->forge->addField([
      "user_id" => [
        'type' => 'INT',
        'constraint' => 5,
      ],
      "tweet_id" => [
        "type" => "INT",
      ],
    ]);

    $this->forge->addPrimaryKey(["user_id", "tweet_id"]);
    $this->forge->addForeignKey(
      "user_id",
      "users",
      "id",
      "CASCADE",
      "CASCADE",
      "fk_user_id",
    );
    $this->forge->addForeignKey(
      "tweet_id",
      "tweets",
      "id",
      "CASCADE",
      "CASCADE",
      "fk_tweet_id",
    );
    $this->forge->createTable("likes", true);
  }

  public function down()
  {
    $this->forge->dropTable("likes");
  }
}
