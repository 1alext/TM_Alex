document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slider img');
    const navLinks = document.querySelectorAll('.slider-nav a');

    navLinks.forEach((link, index) => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            slides[index].scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
});
