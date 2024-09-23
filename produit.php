<?php
//utilise commandes.php pour utiliser les fonctions
require("config/commandes.php");

//Récupérer l'ID du produit 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID du produit manquant.";
    exit;
}

//Utiliser la fonction afficherUnProduit pour récupérer le produit correspondant grâce à l'ID
$produit = afficherUnProduit($id);

//si le produit existe, on affiche ses détails
if ($produit) {
    echo "<h1>" . $produit->nom . "</h1>";
    echo "<p>" . $produit->description . "</p>";
    echo "<p>Prix: " . $produit->prix . " CHF</p>";
    echo "<img src='" . $produit->image . "' alt='Image du produit'>";
} else {
    echo "Produit non trouvé.";
}
?>