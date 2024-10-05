<?php
session_start();
require("config/commandes.php");

//Si l'utilisateur a cliqué sur le bouton de suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $idToRemove = $_POST['product_id'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $idToRemove) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }
}

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

            //Afficher l'image du produit
            if ($image) {
                echo "<img src='" . $image . "' alt='" . $nom . "' width='100' height='100'>";
            } else {
                echo "<p>Aucune image disponible pour ce produit.</p>";
            }

            //Bouton pour supprimer l'article
            echo "<form method='POST' action='' style='display:inline-block;'>";
            echo "<input type='hidden' name='product_id' value='" . $item['id'] . "'>";
            echo "<button type='submit' name='remove_item' class='delete-btn' title='Supprimer'><i class='bx bx-trash'></i></button>";
            echo "</form>";

            echo "<hr>";
            echo "</div>";
        } else {
            echo "<p>Produit introuvable dans la base de données.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardvest</title>
    <link rel="stylesheet" href="Lien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
</head>
