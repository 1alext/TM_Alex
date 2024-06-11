
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
    setInterval(nextSlide, 7000); 

//Page raffraichissement
    const logo = document.getElementById("logo");
    logo.addEventListener("click", function(event) {
        event.preventDefault(); 
        location.reload();
    });

//logo et icones disparaissent quand on scroll
    const header = document.querySelector('header');
    let scroll = window.scrollY;

    window.addEventListener('scroll', function() {
        const scrollY = window.scrollY;
        const scrollDirection = scrollY > scroll ? 'down' : 'up';

        if (scrollDirection === 'down' && scrollY > 80) {
            header.style.opacity = '0'; 
        } else {
            header.style.opacity = '1'; 
        }

        scroll = scrollY;
    });
}); 


