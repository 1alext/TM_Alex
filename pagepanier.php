<?php
session_start();
require("config/commandes.php");

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Votre panier est vide.";
} else {
    echo "<h1>Votre panier</h1>";

    foreach ($_SESSION['cart'] as $item) {
        $produit = afficherUnProduit($item['id']); 


        if ($produit) {
            $nom = htmlspecialchars($produit->nom);
            $prix = htmlspecialchars($produit->prix);
            $image = htmlspecialchars($produit->image);
            $size = htmlspecialchars($item['size']);

            echo "<div class='panier-item'>";
            echo "<p>Produit: " . $nom . "</p>";
            echo "<p>Prix: " . $prix . " CHF</p>";
            echo "<p>Taille: " . $size . "</p>";

            //affiche image
            if ($image) {
                echo "<img src='" . $image . "' alt='" . $nom . "' width='100' height='100'>";
            } else {
                echo "<p>Aucune image disponible pour ce produit.</p>";
            }

            echo "<hr>";
            echo "</div>";
        } else {
            echo "<p>Produit introuvable dans la base de données.</p>";
        }
    }
}
?>
