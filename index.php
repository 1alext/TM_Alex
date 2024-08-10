<?php
session_start();
require("config/commandes.php"); //page contient commandes php

$Produits = afficher();
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
<body>
 <!--Contient les icones et peuvent être cliquer-->   
 <header>
    <a href="#" class="logo" id="logo"><img src="asset/logo 2.png" alt="Logo"></a>
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
                    <a href="#">Commandes</a>
                    <a href="page_enregistrement/logout_form.php"><i class='bx bx-log-out'></i> Déconnexion</a>
                <?php else: ?>
                    <a href="page_enregistrement/pagelogin.php" class="user-button">Se connecter</a>
                    <a href="page_enregistrement/pageenregistrement.php" class="user-button">S'enregistrer</a>
                <?php endif; ?>
            </div>
        </div>
        <a href="#"><i class='bx bx-cart'></i></a>
        <a href="#"><i class='bx bx-heart'></i></a>
        <a href="#" class="menu-icon" id="menu-icon"><i class='bx bx-menu'></i></a>
    </div>
</header>



   
<!--Fond d'images coulissants-->
<div class="container">
    <div class="slider-wrapper" id="slide-container">
        <div class="slider">
            <img id="slide-1" src="asset/image1.jpg"/>
            <img id="slide-2" src="asset/image2.jpg"/>
            <img id="slide-3" src="asset/image3.jpg"/>
        </div>    
    </div>
</div>  

<!--affiche chaque produits dans la bd-->
<section class="products-section">
    <div class="products-wrapper">
        <!-- Les produits originaux -->
        <?php foreach($Produits as $produit): ?>
            <a href="page_produit.php?id=<?= $produit->id ?>" class="product-link">
                <div class="product">
                    <h2><?= $produit->nom ?></h2>
                    <img src="<?= $produit->image ?>" alt="<?= $produit->nom ?>">
                    <p class="product-description" style="display: none;"><?= $produit->description; ?></p>
                    <p class="price"><?= $produit->prix ?> CHF</p>
                </div>
            </a>
        <?php endforeach; ?>
        <!-- Copie des produits pour le défilement infini -->
        <?php foreach($Produits as $produit): ?>
            <a href="page_produit.php?id=<?= $produit->id ?>" class="product-link">
                <div class="product">
                    <h2><?= $produit->nom ?></h2>
                    <img src="<?= $produit->image ?>" alt="<?= $produit->nom ?>">
                    <p class="product-description" style="display: none;"><?= $produit->description; ?></p>
                    <p class="price"><?= $produit->prix ?> CHF</p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- Bas page catégorie -->
<section class="continent-section">
    <h2>Maillot par continent</h2>
    <div class="continent-grid">
        <a href="page_europe.php" class="continent-card">
            <img src="asset/europecart.jpg" alt="Europe">
            <p>Europe</p>
        </a>
        
        <a href="page_ameriquesud.php" class="continent-card">
            <img src="asset/ameriquesud.jpg" alt="Amerique du Sud">
            <p>Amérique du Sud</p>
        </a>
    
        <a href="page_ameriquenord.php" class="continent-card">
            <img src="asset/ameriquenord.jpg" alt="Amerique du Nord">
            <p>Amérique du Nord</p>
        </a>
    
        <a href="asie.php" class="continent-card">
            <img src="asset/asie.jpg" alt="Asie">
            <p>Asie</p>
        </a>
    
        <a href="afrique.php" class="continent-card">
            <img src="asset/afrique.jpg" alt="Afrique">
            <p>Afrique</p>
        </a>
    </div>
</section>

<!-- Page d'accueil -->
<section class="home">
    <div class="text">
        <h4>Nouveaux maillots</h4>
        <h1>Saison 2023/24 <br> Et précédents</h1>   
        <p>"Faites vibrer les tribunes avec notre gamme de maillots de foot. 
        <br>Capturez l'esprit de la compétition et faites briller votre équipe."</p>
        <a href="#" class="button">Acheter maintenant</a>
    </div>
</section>

<!--icon menu qui affiche les icones à la vertical lors qu'on est en responsive-->
<script>
document.getElementById("menu-icon").addEventListener("click", function() {
    var navbar = document.getElementById("navbar");
    if (navbar.className === "navbar-icon") {
        navbar.className += " responsive";
    } else {
        navbar.className = "navbar-icon";
    }
});
</script>
</body>
</html>
