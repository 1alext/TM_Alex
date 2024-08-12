
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

//Concerne la petite fenêtre qui s'affiche pour s'enregistrer et se déconnecter
document.addEventListener('DOMContentLoaded', function() {
    const userIcon = document.getElementById('user-icon');
    const userMenu = document.getElementById('user-menu');
        
    userIcon.addEventListener('click', function(event) {
        event.preventDefault();
        if (userMenu.style.display === 'block') {
                userMenu.style.display = 'none';
        } else {
            userMenu.style.display = 'block';
        }
    });

    document.addEventListener('click', function(event) {
        if (!userMenu.contains(event.target) && !userIcon.contains(event.target)) {
            userMenu.style.display = 'none';
        }
    });
});

//barre de recherche s'affiche quand on clique dessus
document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.getElementById('search-icon');
    const searchBarContainer = document.getElementById('search-bar-container');

    searchIcon.addEventListener('click', function(event) {
        event.preventDefault();
        searchBarContainer.classList.toggle('show-search-bar');
    });
});

//icon menu qui affiche les icones à la vertical lors qu'on est en responsive//

document.getElementById("menu-icon").addEventListener("click", function() {
    var navbar = document.getElementById("navbar");
    if (navbar.className === "navbar-icon") {
        navbar.className += " responsive";
    } else {
        navbar.className = "navbar-icon";
    }
});
