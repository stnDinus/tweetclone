<?php
$ownTweet   = $tweet->user_id == $user_id;
$liked      = $tweet->likedBy($user_id);
$author     = $tweet->getAuthor();
$likes      = "<a href=\"{$base_url}likes/tweet/$tweet->id\" class=\"btn btn-sm btn-secondary\">{$tweet->countLikes()}</a>";
?>

<div class="row border-top border-dark-tertiary my-3 py-3">
  <div class="col-sm-2">
    <?= img(['src' => 'images/no-avatar.jpg', 'class' => 'img-thumbnail']) ?>
  </div>
  <div class="col-sm-10">
    <h4><?= $author->fullname ?> <small class="text-secondary">@<?= $author->username ?></small></h4>
    <div class="mb-3">
      <?= $tweet->content ?>
    </div>
    <div>
      <span>
        <a href="<?= base_url('/category//' . $tweet->category) ?>">#<?= $tweet->category ?></a>
        <small><?= $tweet->getCreatedAt() ?></small>
        <?php
        if ($ownTweet) { ?>
          <div class="btn-group">
            <button class='btn btn-sm btn-info' disabled>Like</button>
            <?= $likes ?>
          </div>
          <a href='<?= base_url('/edit//' . $tweet->id) ?>' class="btn btn-sm btn-warning">Edit</a>
          <a href='<?= base_url('/delete//' . $tweet->id) ?>' class="btn btn-sm btn-danger">Delete</a>

        <?php } else if ($liked) { ?>
          <div class="btn-group">
            <button class='btn btn-sm btn-danger' onclick="unlike(this, <?= $tweet->id ?>)">Unlike</button>
            <?= $likes ?>
          </div>

        <?php } else { ?>
          <div class="btn-group">
            <button class='btn btn-sm btn-info' onclick="like(this, <?= $tweet->id ?>)">Like</button>
            <?= $likes ?>
          </div>
        <?php } ?>
      </span>
    </div>
  </div>
</div>
