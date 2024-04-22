<head> sert à inclure des infos qui ne seront pas visible sur la page web

<body> sert à définir le contenu principal de la page web

<section class="header"> sert à appliquer des styles à l'entête de la page web

<nav> sert à définir une section de navigation et regroupe les liens dans une page web

<div class="nav-links"> sert à diviser le contenu en sections et dire qu'il contient des liens de navigation

<section id="hero"> id veut dire qu'on donne un identifiant unique à la section pour la cibler. Le hero sert à contenir le contenu (image/texte) et sert à attirer l'attention de l'utilisateur

<img src="" id="image"> Je l'avais ajouté sans comprendre ce qu'il fait, img src est une balise pour insérer une image et un url, src est vide donc pas d'image mais en fait javascript va s'en occuper et le id ="image" a comme identifiant image et du coup il va selectioner img en utilisant l'id image et le stock dans la variable image. Mais en fait javascript le fait déjà donc c'est pourquoi il a été supprimé

let image = document.getElementById('image'); va sélectioner un élément à partir de son id avec <img src="" id="image">. mais quand j'ai enlevé : <img src="" id="image">, le code marchait encore et affichait encore les images. Donc le code javascript peut afficher les images et les défiler sans <img src="" id="image">.

hero.style.backgroundImage = `url(${images[random]})`;},3000); définit l'image comme image de fond et prend une image aléatoirement et l'interval de temps pour changer d'image est de 3 sec