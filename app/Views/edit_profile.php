<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<?php
  helper('form');
  $validation = \Config\Services::validation();
?>
<div class="row" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="col-md-6 offset-md-3 align-self-center">
    <div class="card">
        <div class="card-header bg-info text-dark">
            <strong>Edit Profile</strong>
        </div>
        <div class="card-body">
            <?= form_open('/edit_profile') ?>
            <h5>Username</h5>
            <hr>
            <div class="mb-3">
                <input id="username" class="form-control" type="text" disabled value=<?=$profile->username?>>
            </div>
            <h5>Nama Lengkap</h5>
            <hr>
            <div class="mb-3">
                <input id="fullname" name="fullname" class="form-control" type="text" value="<?=$profile->fullname?>">
                <div style="color: red; font-size: small;"> <?=$validation->getError('fulname')?> </div>
            </div>
            <h5>Password</h5>
            <hr>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" id="password" class="form-control" type="password">
                <div style="color: red; font-size: small;"> <?=$validation->getError('password')?> </div>
            </div>
            <div class="mb-3">
                <label for="confirmation" class="form-label">Ulang Password</label>
                <input name="confirmation" id="confirmation" class="form-control" type="password">
                <div style="color: red; font-size: small;"> <?=$validation->getError('confirmation')?> </div>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Simpan">
                <a href="<?=previous_url()?>" class="btn btn-warning">Kembali</a>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    </div>
</div>
<?= $this->endSection() ?>
