<?php
session_start();
require("config/commandes.php");

// Suppression d'un produit du panier
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

// Vérifier l'action de commande
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    if (!isset($_SESSION['user_email'])) {
        $_SESSION['message'] = "Connectez-vous pour commander.";
    } else {
        // L'utilisateur est connecté, affiche le message
        $_SESSION['message'] = "Cette fonction n'est pas possible.";
    }
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='center-container'>";
    echo "<div class='empty-cart'>Votre panier est vide.</div>";
    echo "<p>Une fois que tu auras ajouté un article au panier, il s'affichera ici. Prêt à commencer ?</p>";
    echo "<a href='index.php' class='start-shopping-btn'>Commencer à acheter</a>";
    echo "</div>";
} else {
    echo "<div class='cart-container'>";
    echo "<h1>Votre panier</h1>";
    $total = 0;

    foreach ($_SESSION['cart'] as $item) {
        $produit = afficherUnProduit($item['id']);

        if ($produit) {
            $nom = htmlspecialchars($produit->nom);
            $prix = htmlspecialchars($produit->prix);
            $image = htmlspecialchars($produit->image);
            $size = htmlspecialchars($item['size']);
            $total += $prix;

            echo "<div class='panier-item'>";
            echo "<img src='" . $image . "' alt='" . $nom . "' class='product-image'>";
            echo "<div class='product-details'>";
            echo "<p class='product-name'>" . $nom . "</p>";
            echo "<p class='product-price'>" . $prix . " CHF</p>";
            echo "<p class='product-size'>Taille: " . $size . "</p>";
            echo "</div>";
            echo "<form method='POST' action='' class='delete-form'>";
            echo "<input type='hidden' name='product_id' value='" . $item['id'] . "'>";
            echo "<button type='submit' name='remove_item' class='delete-btn' title='Supprimer'><i class='bx bx-trash'></i></button>";
            echo "</form>";
            echo "</div>";
        } else {
            echo "<p>Produit introuvable dans la base de données.</p>";
        }
    }

    // Affichage du total
    echo "<div class='cart-summary'>";
    echo "<p>Total : <span class='total-price'>" . $total . " CHF</span></p>";
    
    //Formulaire pour la commande
    echo "<form method='POST' action=''>";
    echo "<button type='submit' name='checkout' class='checkout-btn'>Commander</button>";
    echo "</form>";
    // Bouton pour continuer vos achats
    echo "<a href='index.php' class='continue-shopping-btn'>Continuer vos achats</a>";
    echo "</div>";
}

//Afficher le message
if (isset($_SESSION['message'])): ?>
    <div class="success-message" id="success-message">
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

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
