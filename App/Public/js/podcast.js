let podcasts = document.getElementsByClassName('card-podcast');
for (let i = 0; i < podcasts.length; i++) {
  podcasts[i].addEventListener('click', () => {
    // Code to navigate to the premium page goes here
    console.log("clicked");
    window.location.href = "http://localhost/podcast/list?id=1"; // You can use different URLs for each podcast if needed
  });
}