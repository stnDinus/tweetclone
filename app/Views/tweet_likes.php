<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<?php
if ($tweet == null) {
  echo <<<HTML
    <div class="alert alert-danger mt-3">Tweet tidak ditemukan</div>
  HTML;
} else {
  echo view("components/tweets", ["tweets" => [$tweet]]);
  echo "<h3>Likes ({$tweet->countLikes()})</h3>";
  echo "<hr>";
  if (!$users) {
    echo <<<HTML
    <div class="alert alert-info mt-3">Tweet ini tidak memiliki likes</div>
  HTML;
  } else {
    $base_url = base_url();
    echo "<ul class=\"list-group list-group-flush\">";
    foreach ($users as $user) {
      echo "
      <li class=\"list-group-item d-flex flex-col align-items-center\">
        <img src=\"{$user->avatar_url}\" class=\"img-thumbnail\" style=\"width: 3.3rem;\">
        <div class=\"ms-2\">
          <div>$user->fullname</div>
          <span class=\"text-secondary\">@id$user->username</span>
        </div>
      </li>
      ";
    }
    echo "</ul>";
  }
} ?>
<?= $this->endSection() ?>
