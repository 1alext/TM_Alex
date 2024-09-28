<?php
session_start();
require("config/connexion.php");

//les IDs des produits pour l'Amérique du Nord
$idsAmeriqueNord = [21, 28, 31, 45]; // USA, Canada, Mexique, Jamaïque

//Requête pour récupérer les produits d'Amérique du Nord
$placeholders = implode(',', array_fill(0, count($idsAmeriqueNord), '?'));
$query = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
$query->execute($idsAmeriqueNord);
$produitsAmeriqueNord = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Lien.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script defer src="script.js"></script>
    <p class="navigation"><a href="index.php" class="underline">Accueil</a> / Amérique du Nord</p>
    <p class="description-maillot">
    Montre ta passion pour le football nord américain avec ces maillots, parfaits pour les entraînements <br>
    et la vie de tous les jours. Techniques et durables, ils font ressortir tes couleurs sur le terrain.
    </p>
</head>

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
<h1 class="titre-produits-europe">Maillots Amérique du Nord</h1>
    <div class="produits-europe">
    <?php if ($produitsAmeriqueNord): ?>
        <ul>
            <?php foreach ($produitsAmeriqueNord as $produit) : ?>
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
</body>
</html>
