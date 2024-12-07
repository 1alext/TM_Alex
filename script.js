// Écouteur d'événements qui s'active lorsque le DOM est complètement chargé
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionne l'élément ayant la classe "slider"
    const slider = document.querySelector(".slider");
    
    // Sélectionne tous les éléments <img> à l'intérieur de l'élément "slider"
    const slides = document.querySelectorAll(".slider img");
    
    // Récupère le nombre total de diapositives (images) dans le slider
    const totalSlides = slides.length;
    
    // Initialise l'index à 0 pour commencer à la première diapositive
    let index = 0;

    // Fonction pour afficher la diapositive suivante
    function nextSlide() {
        // Incrémente l'index pour passer à la diapositive suivante
        // Utilise l'opérateur modulo pour revenir à 0 lorsque l'on atteint la dernière diapositive
        index = (index + 1) % totalSlides;

        // Déplace le slider pour afficher la diapositive actuelle en utilisant une transformation CSS
        slider.style.transform = `translateX(${-index * 100}%)`;
    }
    
    // Appelle la fonction nextSlide toutes les 7000 millisecondes (7 secondes)
    setInterval(nextSlide, 7000);


// Page rafraichissement
    const logo = document.getElementById("logo");
    logo.addEventListener("click", function(event) {
        location.reload(); 
    });

    // logo et icones disparaissent quand on scroll
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


//barre de recherche s'affiche quand on clique dessus
document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.getElementById('search-icon');
    const searchBarContainer = document.getElementById('search-bar-container');

    searchIcon.addEventListener('click', function(event) {
        event.preventDefault();
        searchBarContainer.classList.toggle('show-search-bar');
    });
});
document.getElementById('search-button').addEventListener('click', function(event) {
    var searchBarValue = document.getElementById('search-bar').value.trim();
    
    if (searchBarValue === "") {
        event.preventDefault(); // Empêche la soumission si le champ est vide
    }
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

function smoothScrollTo(target) { //appel fonction qui prend target
    const targetElement = document.getElementById(target); //target prend l'id best-sellers-section
    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset; //calcule position de l'id best seller
    const startPosition = window.pageYOffset; //prend la position actuelle 
    const distance = targetPosition - startPosition; //Calcule la distance totale à parcourir pour atteindre la section.
    const duration = 1000; //temps animations
    let startTime = null; //L'animation n'a pas encore commencé

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime; //initialise l'animation
        const timeElapsed = currentTime - startTime; //Calcule le temps écoulé depuis le début de l'animation.
        const run = ease(timeElapsed, startPosition, distance, duration); //ease permet le mvmt fluide en fonction des informations récoltées
        window.scrollTo(0, run); //Défile la fenêtre à la position verticale calculée par run
        if (timeElapsed < duration) requestAnimationFrame(animation); //Re appel la fonction si l'animation n'est pas terminée
    }

//Fonction qui calcule l'accélération et vitesse de l'animation
    function ease(t, b, c, d) { //t = temps écoulé b = valeur de départ c = chgmt de valeur d = durée
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    }

    requestAnimationFrame(animation); //Démarre l'animation
}

document.getElementById('discover-button').addEventListener('click', function() {
    smoothScrollTo('best-sellers-section'); //Permet avec le clique d'effectuer l'animation et déclenche la fonction smoothcrollto ce qui va amener à la secton best-sellers-secton
});

