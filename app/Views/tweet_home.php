<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<div class="row" style="margin: 30px 0px;">
  <!-- Awal tambahan bagian notifikasi -->
  <?php
  $sess = session();
  $addstatus = $sess->get('addtweet');
  if ($addstatus == 'success') {
    echo '<div class="alert alert-success" role="alert">
                Tweet baru berhasil diposting
            </div>';
  }

  $editstatus = $sess->get('edittweet');
  if ($editstatus == 'success') {
    echo '<div class="alert alert-success" role="alert">
            Tweet berhasil diedit / diperbaharui.
            </div>';
  }
  if ($editstatus == 'error') {
    echo '<div class="alert alert-danger" role="alert">
            Kesalahan pengeditan / pembaruan tweet.
            </div>';
  }

  $delstatus = $sess->get('deltweet');
  if ($delstatus == 'success') {
    echo '<div class="alert alert-warning" role="alert">
            Tweet berhasil dihapus.
            </div>';
  }
  if ($delstatus == 'error') {
    echo '<div class="alert alert-danger" role="alert">
            Kesalahan penghapusan tweet.
            </div>';
  }
  ?>
  <!-- Akhir tambahan bagian notifikasi -->
  <div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-4">
          <?= img(['src' => 'images/no-avatar.jpg', 'class' => 'img-fluid rounded-start']) ?>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <p>
              <strong class="card-title"><?= $profile->fullname ?></strong>
              <small class="text-muted">@<?= $profile->username ?></small>
            </p>
            <p class="card-text">
              <a class="btn btn-info btn-sm" style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" href="<?= base_url('/add') ?>">Tweet Baru</a>
              <a class="btn btn-warning btn-sm" style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" href="<?= base_url('/edit_profile') ?>">Edit Profile</a>
              <a class="btn btn-danger btn-sm" style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" href="<?= base_url('/logout') ?>">Logout</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="list-group">
      <div class="list-group-item list-group-item-action active" aria-current="true">
        <strong>Kategori Tweet</strong>
      </div>
      <?php foreach ($categories as $key => $val) : ?>
        <a href="<?= base_url('/category//' . $key) ?>" class="list-group-item list-group-item-action">
          <?= $val ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="col-md-8">
    <h2><?= $judul ?></h2>
    <?= view("components/tweets", ["tweets" => $tweets]) ?>
  </div>
</div>
<?= $this->endSection() ?>
