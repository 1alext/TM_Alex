<?php
session_start();
require("config/connexion.php");

//les IDs des produits pour l'Europe
$idsEurope = [2, 3, 4, 5, 6, 7, 8, 9, 11, 13, 14, 15, 16, 18, 20, 32, 34, 35, 37, 38, 39, 40];

//Requête pour récupérer les produits d'Europe
$placeholders = implode(',', array_fill(0, count($idsEurope), '?'));
$query = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
$query->execute($idsEurope);
$produitsEurope = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Lien.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script defer src="script.js"></script>
    <p class="navigation"><a href="index.php" class="underline">Accueil</a> / Europe</p>
    <p class="description-maillot">
    Montre ta passion pour le football européen avec ces maillots, parfaits pour les entraînements <br>
    et la vie de tous les jours. Techniques et durables, ils font ressortir tes couleurs sur le terrain.
    </p>
</head>

<!-- Ajoute un ID à ton body pour différencier cette page -->
<body id="europe-page">
    <header id="produits-europe">
        <a href="index.php" class="logo" id="logo"><img src="asset/logo 2.png" alt="Logo"></a>
        <div class="navbar-icon" id="navbar">
            <div class="search-bar-container" id="search-bar-container">
                <input type="text" id="search-bar" placeholder="Rechercher">
            </div>
            <a href="#" id="search-icon"><i class='bx bx-search'></i></a>
            <div class="user-menu-container">
                <a href="#" class="user-icon" id="user-icon"><i class='bx bx-user'></i></a>
                <div class="user-menu" id="user-menu">
                    <?php if(isset($_SESSION['user_email'])): ?>
                        <p><?php echo $_SESSION['user_email']; ?></p>
                        <a href="page_enregistrement/logout_form.php">Déconnexion</a>
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

<body>
<h1 class="titre-produits-europe">Maillots Europe</h1>
    <div class="produits-europe"> 
        <?php if ($produitsEurope): ?>
            <ul>
            <?php foreach ($produitsEurope as $produit) : ?>
                    <li>
                    <a href="page_produit.php?id=<?php echo $produit['id']; ?>">
                        <img src="<?php echo htmlspecialchars($produit['image']); ?>" alt="Image du produit" style="width:150px;"/></a>
                        <h1><?php echo htmlspecialchars($produit['nom']); ?></h1>
                        <p><?php echo htmlspecialchars($produit['prix']); ?> CHF</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun produit trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>