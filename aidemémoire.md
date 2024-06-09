<head> sert à inclure des infos qui ne seront pas visible sur la page web

<body> sert à définir le contenu principal de la page web

<section class="header"> sert à appliquer des styles à l'entête de la page web

<nav> sert à définir une section de navigation et regroupe les liens dans une page web

<div class=""> sert à diviser le contenu en sections et va à l'intérieur ça va regrouper des éléments pour leurs appliquer du style avec css

<img src="" id="image"> Je l'avais ajouté sans comprendre ce qu'il fait, img src est une balise pour insérer une image et un url, src contient l'image e et le id ="image" a comme identifiant image et du coup il va selectioner img en utilisant l'id image et le stock dans la variable image. Mais en fait javascript le fait déjà donc c'est pourquoi il a été supprimé

CSS

Padding : sert à créer des espaces autour de l'élément
Display : Type d'affichage
transform : déplace l'élément
uppercase : texte en majuscule
capitalize : Met la premiere lettre de chaque mot en majuscule
display flex : rendre l'élément flexible permettant de le faire bouger
overflow-x: hidden : barre en bas pour faire bouger les images
scroll-snap-type: x mandatory : permet que le défilement soit "élastique" mais il marche pas encore chez moi
scroll-snap-align: start : Spécifie comment un élément doit etre aligné, pour l'instant chez moi il est inutile, je dois régler ça
flex: 1 0 100% : 1 c'est l'image prend tout l'espace disponible, 0 pour dire l'élément ne peut pas rétrécir, 100% définit la taille de base de l'élément
column-gap: 16px : espace entre les petits points 
transition: opacity ease 250ms : pour l'instant il me sert à rien mais il sert à creer des transitions en douceur entre les images 
scroll-behavior: smooth : Fluidité mais ne marche pas encore

* : pour sélectionner tout les éléments de la page
header : Contient le contenu en haut de page
le # sert à sélectionner l'élément par son ID
. : sert à sélectionner des éléments par leur classe. Classe car on veut appliquer les mêmes styles à plusieurs éléments

javascript 

document.addEventListener("DOMContentLoaded", function() {  vérifie que la page est chargée pour que la fonction soit exécutée
    const slider = document.querySelector(".slider");       Selectionne la classe .slider dans css et le stocke dans la variable, coté transition, const veut dire qu'on ne 
                                                            peut pas changer la valeur de slider une fois initialisée.
    const slides = document.querySelectorAll(".slider img");Selectionne la classe .slider img dans css et stocke dans slides, coté images
    const totalSlides = slides.length;                      Selectionne toutes les images de la classe slider et renvoie le nmbre d'images (3)
    let index = 0;                                          Initialise variable 0

    function nextSlide() {                                  fonction responsable de faire défiler l'image
        index = (index + 1) % totalSlides;                  incrémente index et on utilise le modulo % pour qu'il revient à 0 et ça fait une boucle
        slider.style.transform = `translateX(${-index * 100}%)`; Déplacement horizontale
    }
    setInterval(nextSlide, 4500);  temps d'intervalle entre chaque image
});

    const logo = document.getElementById("logo");           Selectionne logo 
    logo.addEventListener("click", function(event) {        logo sera attacher avec addEventListener qui est un gestionnaire d'évenement et marchera quand on click dessus
        event.preventDefault();                             empeche de scroller vers le haut lors qu'on refresh la page
        location.reload();                                  recharge la page actuelle
});