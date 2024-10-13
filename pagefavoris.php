<?php
session_start();
require("config/commandes.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_favorite'])) {
    $idToRemove = $_POST['product_id'];

    foreach ($_SESSION['favorites'] as $key => $item) {
        if ($item == $idToRemove) {
            unset($_SESSION['favorites'][$key]);
            $_SESSION['favorites'] = array_values($_SESSION['favorites']);
            break;
        }
    }
}
// Initialiser les favoris si nécessaire
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

if (empty($_SESSION['favorites'])) {
    echo "<div class='center-container'>";
    echo "<div class='empty-favorites'>Votre liste de favoris est vide.</div>";
    echo "<p>Ajoutez des produits aux favoris pour les voir ici.</p>";
    echo "<a href='index.php' class='start-shopping-btn'>Commencer à acheter</a>";
    echo "</div>";
} else {
    echo "<div class='favorites-container'>";
    echo "<h1>Vos Favoris</h1>";

    foreach ($_SESSION['favorites'] as $productId) {
        $produit = afficherUnProduit($productId);

        if ($produit) {
            $nom = htmlspecialchars($produit->nom);
            $prix = htmlspecialchars($produit->prix);
            $image = htmlspecialchars($produit->image);

            echo "<div class='favorite-item'>";
            echo "<img src='" . $image . "' alt='" . $nom . "' class='product-image'>";
            echo "<div class='product-details'>";
            echo "<p class='product-name'>" . $nom . "</p>";
            echo "<p class='product-price'>" . $prix . " CHF</p>";
            echo "</div>";
            echo "<form method='POST' action='' class='delete-form'>";
            echo "<input type='hidden' name='product_id' value='" . $productId . "'>";
            echo "<button type='submit' name='remove_favorite' class='delete-btn' title='Supprimer'><i class='bx bx-trash'></i></button>";
            echo "</form>";
            echo "</div>";
        } else {
            echo "<p>Produit introuvable dans la base de données.</p>";
        }
    }

    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Lien.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script defer src="script.js"></script>
</head>

<body id="europe-page">
    <header id="produits-europe">
        <a href="index.php" class="logo" id="logo"><img src="asset/logo 2.png" alt="Logo"></a>
        <div class="navbar-icon" id="navbar">
    <form method="GET" action="recherche.php" class="search-bar-container" id="search-bar-container">
    <div class="search-wrapper">
        <input type="text" id="search-bar" name="query" placeholder="Rechercher">
        <button type="submit" id="search-button"><i class='bx bx-subdirectory-right'></i></button>
    </div>
</form>
            <a href="#" id="search-icon"><i class='bx bx-search'></i></a>
            <div class="user-menu-container">
                <span class="user-icon" id="user-icon"><i class='bx bx-user'></i></span>
                <div class="user-menu" id="user-menu">
                    <?php if(isset($_SESSION['user_email'])): ?>
                        <p><?php echo $_SESSION['user_email']; ?></p>
                        <a href="page_enregistrement/logout_form.php" class="logout-link">Déconnexion</a>
                    <?php else: ?>
                        <a href="page_enregistrement/pagelogin.php" class="user-button">Se connecter</a>
                        <a href="page_enregistrement/pageenregistrement.php" class="user-button">S'enregistrer</a>
                    <?php endif; ?>
                </div>
            </div>
            <a href="pagepanier.php"><i class='bx bx-cart'></i></a>
            <a href="pagefavoris.php"><i class='bx bx-heart'></i></a>
            <a href="#" class="menu-icon" id="menu-icon"><i class='bx bx-menu'></i></a>
        </div>
    </header>
</body>
</html>
