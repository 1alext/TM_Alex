<head> sert à inclure des infos qui ne seront pas visible sur la page web

<body> sert à définir le contenu principal de la page web

<section class="header"> sert à appliquer des styles à l'entête de la page web

<nav> sert à définir une section de navigation et regroupe les liens dans une page web

<div class=""> sert à diviser le contenu en sections et va à l'intérieur ça va regrouper des éléments pour leurs appliquer du style avec css

<img src="" id="image"> Je l'avais ajouté sans comprendre ce qu'il fait, img src est une balise pour insérer une image et un url, src contient l'image e et le id ="image" a comme identifiant image et du coup il va selectioner img en utilisant l'id image et le stock dans la variable image. Mais en fait javascript le fait déjà donc c'est pourquoi il a été supprimé


CSS

Padding : sert à créer des espaces autour de l'élément

padding: 30px 8%; px c'est pour dimension et % taille

box-sizing : border-box; gère dimension d'un élément, border-box indique de prendre en compte toute bordure et remplissage

list-style: none; pour supprimer les puces

text-decoration: none; supprime le soulignement

Z-Index : superposition des éléments

transform: translate(-50%, -50%); déplacer un élément, 

text-transform: capitalize; chaque 1er lettre d'un mot est en majuscule

justify-content : Définit comment les éléments sont alignés

cursor: pointer; Apparence du curseur

display: none; masquer un élément mais il marche encore

Display : Type d'affichage, modèle de mise en page flexible

display: inline-block; Aligne horizontalement les éléments horizontalement

transform : déplace l'élément

uppercase : texte en majuscule

display flex : rendre l'élément flexible permettant de le faire bouger

overflow-x: hidden : barre en bas pour faire bouger les images

transition: transform 0.5s ease-in-out; ease in out c'est le nom de la transition

background-size: cover; Prend toute la place

* : pour sélectionner tout les éléments de la page

header : Contient le contenu en haut de page

# : sert à sélectionner l'élément par son ID

. : sert à sélectionner des éléments par leur classe. Classe car on veut appliquer les mêmes styles à plusieurs éléments



javascript animation

document.addEventListener("DOMContentLoaded", function() {          vérifie que la page est chargée pour que la fonction soit exécutée
    const slider = document.querySelector(".slider");               Selectionne la classe .slider dans css et le stocke dans la variable, coté transition, const veut dire  
                                                                    qu'on ne peut pas changer la valeur de slider une fois initialisée.
    const slides = document.querySelectorAll(".slider img");        Selectionne la classe .slider img dans css et stocke dans slides, coté images
    const totalSlides = slides.length;                              Selectionne toutes les images de la classe slider et renvoie le nmbre d'images (3)
    let index = 0;                                                  Initialise variable 0

    function nextSlide() {                                          fonction responsable de faire défiler l'image
        index = (index + 1) % totalSlides;                          incrémente index et on utilise le modulo % pour qu'il revient à 0 et ça fait une boucle
        slider.style.transform = `translateX(${-index * 100}%)`;    Déplacement horizontale
    }
    setInterval(nextSlide, 3000);                                   temps d'intervalle entre chaque image


Javascript logo

    const logo = document.getElementById("logo");                   Selectionne logo 
    logo.addEventListener("click", function(event) {                logo attacher avec addEventListener qui est un gestionnaire d'évenement et marchera quand on click dessus
        event.preventDefault();                                     empeche de scroller vers le haut lors qu'on refresh la page
        location.reload();                                          recharge la page actuelle
    });


Javascript logo et icones

    const header = document.querySelector('header');                Choisit Header
    let scroll = window.scrollY;                                    let déclare la variable scroll qui va être assigner et window.scrollY c'est la position actuelle     

    window.addEventListener('scroll', function() {                  Fonction qui est executé chaque fois qu'on défile la page
        const scrollY = window.scrollY;                             const va stocker la valeur de la position actuelle du défilement 
        const scrollDirection = scrollY > scroll ? 'down' : 'up';   scrollDirection va prendre la valeur down ou up en fonction de la direction du défilement, si scrolly est   supérieur à scroll, alors utilisateur défile vers le bas sinon c'est vers le haut.

        if (scrollDirection === 'down' && scrollY > 80) {           Si on scroll en bas en dépassant les 80 pixels, l'opacité du logo et icones passent à 0
            header.style.opacity = '0'; 
        } else {
            header.style.opacity = '1';                             sinon on voit encore le logo et icones
        }

        scroll = scrollY;                                           Met à jour scroll avec la nouvelle position, ça permet de garder la trace de la position actuelle
    });
});


DOMContentLoaded : Fonctionne quand le site HTML est chargé completement
const :  c'est pour déclarer la variable qui ne peut pas être modifier (constante)
let : déclare une variable qui peut être modifier
document.querySelector : va renvoyer le premier élément de ce qu'on a sélectionner
document.getElementById : c'est pour sélectionner spécifiquement l'identifiant


PHP

try {                                                               Execute le code à l'intérieur et s'il y a une erreur, catch s'execute en envoie le message d'erreur
    $access=new pdo("mysql:host=localhost;dbname=hardvest_db;charset=utf8", "root",""); pdo c'est ce qui accéder à la base de données, initialisation de la connexion
                                                                    utf8 car peut représenter tout les caractères et courrament utiliser
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); Génére le message d'erreur lors que les erreurs sql se produisent
} catch (Exception $error) {                                        intercepte toute les exceptions par le bloc try
    $error->getMessage();                                           récupère  message 
}
