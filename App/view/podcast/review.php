<?php require_once "App/util/getter.php";
  require_once "App/core/RestClient.php";
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
    for (let j = 1; j <= 5; j++) {
          let star = document.getElementById(`star-${j}`);
          star.src = "http://localhost/App/Public/image/star_border.svg";
        }
        // Reset textarea
        document.querySelector('.review-area').value = "";
  })

  let sendBtn = document.querySelector('.r-send-btn');
  sendBtn.addEventListener('click', async () => {
    const reviewContainer = document.getElementById('review-container');
    

    // Get the feedback data
    console.log("clicked")
    const podcaster = reviewContainer.getAttribute('data-podcaster'); 
    const idPodcast = parseInt(reviewContainer.getAttribute('data-id')); 
    const reviewer = reviewContainer.getAttribute('data-reviewer'); 
    const review = document.querySelector('.review-area').value;

    console.log(podcaster)
    console.log(idPodcast)
    console.log(reviewer)
    
    // Find the selected rating
    let selectedRating = 0;
    for (let i = 1; i <= 5; i++) {
      let star = document.getElementById(`star-${i}`);
      if (star.src === "http://localhost/App/Public/image/star.svg") {
        selectedRating = i;
      }
    }

    if (selectedRating === 0 || review.trim() === "") {
      alert('Please select a star rating and provide a review');
      return; 
    }

    // Prepare the feedback data
    const feedbackData = {
      podcaster: podcaster,
      idPodcast: idPodcast,
      reviewer: reviewer,
      review: review,
      rating: selectedRating
    };

    try {
      const response = await fetch('http://localhost:3000/review', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(feedbackData),
      });

      if (!response.ok) {
        console.error('Failed to submit feedback');
      } else {
        console.log('Feedback submitted successfully');
        // Close the modal
        document.getElementById('review-container').style.visibility = "hidden";
        // Reset stars to default
        for (let j = 1; j <= 5; j++) {
          let star = document.getElementById(`star-${j}`);
          star.src = "http://localhost/App/Public/image/star_border.svg";
        }
        // Reset textarea
        document.querySelector('.review-area').value = "";
      }
    } catch (error) {
      console.error('Error submitting feedback:', error);
    }
  });
</script>