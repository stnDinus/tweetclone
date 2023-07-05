<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
  public function setPassword(string $pass)
  {
    $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
    return $this;
  }

  public function getAvatarUrl()
  {
    $avatar_file_name = $this->attributes["avatar_url"] ?? "no-avatar";
    return base_url("images/avatars/$avatar_file_name.webp");
  }
}
