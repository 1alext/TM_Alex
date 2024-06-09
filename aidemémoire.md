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

defer 