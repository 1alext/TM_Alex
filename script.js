
//animation 
document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".slider");
    const slides = document.querySelectorAll(".slider img");
    const totalSlides = slides.length;
    let index = 0;

    function nextSlide() {
        index = (index + 1) % totalSlides;
        slider.style.transform = `translateX(${-index * 100}%)`;
    }
    setInterval(nextSlide, 3000); 

//Page raffraichissement
    const logo = document.getElementById("logo");
    logo.addEventListener("click", function(event) {
        event.preventDefault(); 
        location.reload();
    });

//logo et icones disparaissent quand on scroll
    const header = document.querySelector('header');
    let lastScrollY = window.scrollY;

    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;
        const scrollDirection = currentScrollY > lastScrollY ? 'down' : 'up';

        if (scrollDirection === 'down' && currentScrollY > 80) {
            header.style.opacity = '0'; 
        } else {
            header.style.opacity = '1'; 
        }

        lastScrollY = currentScrollY;
    });
}); 


