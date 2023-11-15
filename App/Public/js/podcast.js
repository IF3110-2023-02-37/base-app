let podcasts = document.getElementsByClassName('subscribed-card-podcast');
for (let i = 0; i < podcasts.length; i++) {
  podcasts[i].addEventListener('click', () => {
    window.location.href = "http://localhost/podcast/list?id=1"; 
  });
}