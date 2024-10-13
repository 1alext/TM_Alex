<?php
require("config/commandes.php");

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    // Recherche du produit
    $produits = afficher();
    $produitTrouve = null;

    foreach ($produits as $produit) {
        if (stripos($produit->nom, $query) !== false) {
            $produitTrouve = $produit;
            break;
        }
    }

    //Si un produit est trouvé, direction vers la page produit
    if ($produitTrouve) {
        header('Location: page_produit.php?id=' . $produitTrouve->id);
        exit;
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Aucun produit trouvé</title>
            <link rel="stylesheet" href="Lien.css">
            <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
            <script defer src="../script.js"></script>
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
            <div class="center-container">
                <div class="empty-cart">Aucun produit trouvé</div>
                <a href="index.php" class="start-shopping-btn">Retour à l'accueil</a>
            </div>
        </body>
        </html>
        <?php
    }
}
?>


