window.addEventListener('scroll', function() {
    var header = document.querySelector('.header');
    var scrollPosition = window.scrollY || document.documentElement.scrollTop;

    if (scrollPosition > 150) { // Adjust the threshold as needed
        header.style.position = 'fixed';
        header.style.backgroundColor = 'gray'; 
        header.classList.add('scroll');
    } else {
        header.style.position = 'absoulte';
        header.style.backgroundColor = 'rgba(0, 0, 0, 0)'; // Set the background color to transparent
        header.classList.remove('scroll');
    }
});