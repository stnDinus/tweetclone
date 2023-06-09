<?= $this->extend('components/layout') ?>

<?= $this->section('content') ?>
<div class="row" style="margin: 30px 0px;">
    <div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
        <?= img(['src'=>'images/no-avatar.jpg', 'class'=>'img-fluid rounded-start']) ?>
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <p>
            <strong class="card-title"><?="Fullname User"?></strong>
            <small class="text-muted">@<?="username"?></small>
            </p>
            <p class="card-text">
                <a class="btn btn-info btn-sm" 
										style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" 
										href="<?=base_url('/add')?>">Tweet Baru</a>
                <a class="btn btn-danger btn-sm" 
										style="padding: 0.25rem 0.5rem; font-size: 0.7rem;" 
										href="<?=base_url('/logout')?>">Logout</a>
            </p>
        </div>
        </div>
    </div>
    </div>

    <div class="list-group">
        <div class="list-group-item list-group-item-action active" aria-current="true">
            <strong>Kategori Tweet</strong>
        </div>
        <?php foreach($categories as $key => $val): ?>
        <a href="<?=base_url('/category//'.$key)?>" 
            class="list-group-item list-group-item-action">
            <?=$val?>
        </a>
        <?php endforeach; ?>
    </div>
    </div>
    <div class="col-md-8">
        <h2><?=$judul?></h2>

        <?php for($i = 0; $i < 10; $i++){ ?>
        <div class="row" 
						style="border-top: 1px solid #eee; padding-top: 10px; margin-bottom: 10px;">
            <div class="col-sm-2">
                <?= img(['src'=>'images/no-avatar.jpg', 'class'=>'img-thumbnail']) ?>
            </div>
            <div class="col-sm-10">
                <h4><?="Nama Lengkap"?> <small>@<?="username"?></small></h4>
                <div class="mb-3">
                    <?="Konten dari tweet yang di buat. Seharusnya di sini tulisannya cukup panjang"?>
                </div>
                <div class="container-fluid">
                    <span>
                    <a href="<?=base_url('/category//'."category")?>">#<?="category"?></a>
                    <small><?= date('d-m-Y') ?></small>
                    </span>
                    <span>
                        <a href="<?=base_url('/edit//'.$i)?>" class="btn btn-sm btn-warning">E</a>
                        <a href="<?=base_url('/delete//'.$i)?>" class="btn btn-sm btn-danger">D</a>
                    </span>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection() ?>