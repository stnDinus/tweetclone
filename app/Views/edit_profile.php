<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<?php
helper('form');
$validation = \Config\Services::validation();
?>
<div class="row" style="margin-top: 100px; margin-bottom: 100px;">
  <div class="col-md-6 offset-md-3 align-self-center">
    <?php
    if (isset($success)) {
      echo <<<HTML
          <div class="alert alert-success" role="alert">
            Profil anda telah tersimpan
          </div>
        HTML;
    }
    ?>
    <div class="card">
      <div class="card-header bg-info text-dark">
        <strong>Edit Profile</strong>
      </div>
      <div class="card-body">
        <?= form_open('/edit_profile', ["enctype" => "multipart/form-data"]) ?>
        <h5>Username</h5>
        <hr>
        <div class="mb-3">
          <input id="username" class="form-control" type="text" disabled value=<?= $profile->username ?>>
        </div>
        <h5>Foto Profil</h5>
        <hr>
        <div class="mb-3 d-flex flex-column border rounded overflow-hidden mx-auto" style="width: fit-content;">
          <img id="avatar" class="object-fit-cover border-bottom" style="width: 320px; height: 320px" src="<?= $profile->avatar_url ?>">
          <label class="px-2 mt-2" for="avatar">Upload Gambar (< 2MB): </label>
          <input class="px-2" type="file" id="avatar" name="avatar" accept="image/jpeg,image/png,image/webp">
          <div class="mb-2" style="color: red; font-size: small;"> <?= $validation->getError('avatar') ?> </div>
          <script>
            const avatarImage = document.querySelector("img#avatar");
            const avatarInput = document.querySelector("input[name='avatar']");
            avatarInput.addEventListener("change", e => {
              const [image] = avatarInput.files;
              if (image) avatarImage.src = URL.createObjectURL(image);
            })
          </script>
        </div>

        <h5>Nama Lengkap</h5>
        <hr>
        <div class="mb-3">
          <input id="fullname" name="fullname" class="form-control" type="text" value="<?= $profile->fullname ?>">
          <div style="color: red; font-size: small;"> <?= $validation->getError('fullname') ?> </div>
        </div>
        <h5>Password</h5>
        <hr>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input name="password" id="password" class="form-control" type="password">
          <div style="color: red; font-size: small;"> <?= $validation->getError('password') ?> </div>
        </div>
        <div class="mb-3">
          <label for="confirmation" class="form-label">Ulang Password</label>
          <input name="confirmation" id="confirmation" class="form-control" type="password">
          <div style="color: red; font-size: small;"> <?= $validation->getError('confirmation') ?> </div>
        </div>
        <div class="mb-3">
          <input type="submit" class="btn btn-primary" value="Simpan">
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
