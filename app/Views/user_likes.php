<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<?php
if ($user == null) {
  echo <<<HTML
    <div class="alert alert-danger mt-3">User tidak ditemukan</div>
  HTML;
} else {
  echo <<<HTML
    <h1 class="mt-3">$user->username Likes</h1>
  HTML;
  if (!$tweets) {
    echo <<<HTML
    <div class="alert alert-info mt-3">$user->username tidak memiliki likes</div>
  HTML;
  } else {
    echo view("components/tweets", ["tweets" => $tweets]);
  }
} ?>
<?= $this->endSection('content') ?>
