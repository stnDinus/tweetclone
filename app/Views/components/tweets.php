<script>
  const like = async (el, tweet_id) => {
    await fetch(
      '<?= base_url("like") ?>/' + tweet_id, {
        method: "POST",
        credentials: "same-origin",
      }
    )
    el.innerText = "Unlike";
    el.classList.remove("btn-info");
    el.classList.add("btn-danger");
    el.setAttribute("onclick", `unlike(this, ${tweet_id})`)
    const likeCount = el.nextElementSibling;
    likeCount.innerText = parseInt(likeCount.innerText) + 1;
  }
  const unlike = async (el, tweet_id) => {
    await fetch(
      '<?= base_url("unlike") ?>/' + tweet_id, {
        method: "POST",
        credentials: "same-origin",
      }
    )
    el.innerText = "Like";
    el.classList.add("btn-info");
    el.classList.remove("btn-danger");
    el.setAttribute("onclick", `like(this, ${tweet_id})`)
    const likeCount = el.nextElementSibling;
    likeCount.innerText = parseInt(likeCount.innerText) - 1;
  }
</script>

<?php
$base_url   = base_url();
$user_id    = session()->get('currentuser')["userid"];

foreach ($tweets as $tweet) {
  echo view('components/tweet', ["tweet" => $tweet, "base_url" => base_url(), "user_id" => $user_id]);
}
