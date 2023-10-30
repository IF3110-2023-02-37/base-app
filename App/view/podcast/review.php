<?php require_once "App/util/getter.php";
  getCss("review.css");
?>
<div class="blur-container" id="review-container" style="visibility: hidden;">
  <div class="review-container">
    <p>Send your feedback for this podcast!</p>
    <div class="rating-wrapper">
      <?php for ($i = 1; $i <= 5; $i++) { ?>
        <button class="rating" id="rating-<?= $i; ?>"><img id="star-<?= $i; ?>" src="<?php getImg('star_border.svg') ?>" alt=""></button>
      <?php } ?>
    </div>
    <textarea class="review-area" name="" id="" cols="30" rows="10"></textarea>

    <div class="button-wrapper">
      <button class="r-cancel-btn btn" id="r-cancel-btn">Cancel</button>
      <button class="r-send-btn btn">Send</button>
    </div>
  </div>
</div>

<script defer>
  for (let i = 1; i <= 5; i++) {
    let rating = document.getElementById(`rating-${i}`);
    rating.addEventListener('click', () => {
      for (let j = 1; j <= 5; j++) {
        let star = document.getElementById(`star-${j}`);
        if (j <= i) {
          star.src = "http://localhost/App/Public/image/star.svg";
        } else {
          star.src = "http://localhost/App/Public/image/star_border.svg";
        }
      }
    });
  }

  let cancel = document.getElementById('r-cancel-btn');
  cancel.addEventListener('click', () => {
    document.getElementById('review-container').style.visibility = "hidden";
    // document.getElementById('review-container').style.display = "none";
  })
</script>