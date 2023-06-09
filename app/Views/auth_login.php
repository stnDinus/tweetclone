<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<?php 
helper('form');
$validation = \Config\Services::validation();
?>
<div class="row" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="col-md-6 offset-md-3 align-self-center">
    <div class="card">
        <div class="card-header text-white bg-dark">
            <strong>Form Login</strong>
        </div>
        <div class="card-body">
            <?= form_open('/login') ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" name="username" id="username" placeholder="username">
                <div style="color: red; font-size: small;"> <?=$validation->getError('username')?> </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password">
                <div style="color: red; font-size: small;"> <?=$validation->getError('password')?> </div>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <?= form_close() ?>
        </div>
    </div>
    </div>
</div>
<?= $this->endSection('content') ?>