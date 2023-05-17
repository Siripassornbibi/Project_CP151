document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector(".fadeblock");
    const btnPlay = container.querySelector(".BtnPlay_InCarousel");
    
    container.addEventListener("mouseover", function() {
        btnPlay.style.display = "block";
    });
    
    container.addEventListener("mouseout", function() {
        btnPlay.style.display = "none";
    });
    });