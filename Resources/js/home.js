window.addEventListener('scroll', function() {
    var header = document.querySelector('.header');
    var scrollPosition = window.scrollY || document.documentElement.scrollTop;

    if (scrollPosition > 150) { // Adjust the threshold as needed
        header.style.position = 'fixed';
        header.style.backgroundColor = 'rgba(255, 255, 255, 0.9)'; 
        header.classList.add('scroll');
    } else {
        header.style.position = 'absoulte';
        header.style.backgroundColor = 'rgba(0, 0, 0, 0)'; // Set the background color to transparent
        header.classList.remove('scroll');
    }
});
document.addEventListener("DOMContentLoaded", function() {
    var slideIndex = 0;
    carousel();

    function carousel() {
        var i;
        var slides = document.querySelectorAll(".slideshow .first");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none"; 
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1; 
        }
        slides[slideIndex - 1].style.display = "block"; 
        setTimeout(carousel, 3000); 
    }
});
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("first");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}



