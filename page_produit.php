<?php
session_start();
require("config/commandes.php");

if (!isset($_GET['id'])) {
    echo "Produit introuvable";
    exit;
}

$id = $_GET['id'];
$produit = afficherUnProduit($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit - <?= htmlspecialchars($produit->nom) ?></title>
    <link rel="stylesheet" href="Lien.css">
</head>
<body>
    
<header>
    <a href="index.php" class="logo" id="logo"><img src="asset/logo 2.png" alt="Logo"></a>
    <div class="navbar-icon">
        <a href="#"><i class='bx bx-search'></i></a>
        <div class="user-menu-container">
            <a href="#" class="user-icon" id="user-icon"><i class='bx bx-user'></i></a>
            <div class="user-menu" id="user-menu">
                <?php if(isset($_SESSION['user_email'])): ?>
                    <p><?php echo $_SESSION['user_email']; ?></p>
                    <a href="#">Commandes</a>
                    <a href="page_enregistrement/logout_form.php"><i class='bx bx-log-out'></i> Déconnexion</a>
                <?php else: ?>
                    <a href="page_enregistrement/pagelogin.php"><i class='bx bx-user'></i>Se connecter</a>
                    <a href="page_enregistrement/pageenregistrement.php"><i class='bx bx-user'></i> S'enregistrer</a>
                <?php endif; ?>
            </div>
        </div>
        <a href="#"><i class='bx bx-cart'></i></a>
        <a href="#"><i class='bx bx-heart'></i></a>
        <a href="#" class="menu-icon"><i class='bx bx-menu'></i></a>
    </div>
</header>

<section class="product-details">
    <h1><?= htmlspecialchars($produit->nom) ?></h1>
    <img src="<?= htmlspecialchars($produit->image) ?>" alt="<?= htmlspecialchars($produit->nom) ?>">
    <p><?= htmlspecialchars($produit->description) ?></p>
    <p class="price"><?= htmlspecialchars($produit->prix) ?> CHF</p>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('header');
        let scroll = window.scrollY;

        window.addEventListener('scroll', function() {
            const scrollY = window.scrollY;
            const scrollDirection = scrollY > scroll ? 'down' : 'up';

            if (scrollDirection === 'down' && scrollY > 80) {
                header.style.opacity = '0';
            } else {
                header.style.opacity = '1';
            }

            scroll = scrollY;
        });
    });
</script>
</body>
</html>
