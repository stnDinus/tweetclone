<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createuseravatars extends Migration
{
  public function up()
  {
    $fields = [
      "avatar_url" => [
        "type" => "CHAR",
        "constraint" => 32,
        "null" => true,
        "default" => null,
      ],
    ];
    $this->forge->addColumn("users", $fields);
  }

  public function down()
  {
    $this->forge->dropColumn("users", "avatar_url");
  }
}
