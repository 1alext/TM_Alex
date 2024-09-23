<?php
//fichier commandes.php contient fonction afficherUnProduit
require("config/commandes.php");

//Maillot espagne a id 6
$id = 6;

//Utilise la fonction afficherUnProduit pour récupérer le produit correspondant grâce à l'id
$produit = afficherUnProduit($id);

//Si le produit existe, on affiche ses détails
if ($produit) {
    echo "<h1>" . $produit->nom . "</h1>";
    echo "<p>" . $produit->description . "</p>";
    echo "<p>Prix: " . $produit->prix . "CHF</p>";
    echo "<img src='" . $produit->image . "' alt='Image du produit'>";
} else {
    echo "Produit non trouvé.";
}
?>