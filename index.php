<?php

    require("config/commandes.php"); //page contient commandes php

    $Produits=afficher();
?>

<!DOCTYPE html>
<html lang="fr">
<!-- Liens avec HTML-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hardvest</title> 
    
    <link rel="stylesheet" href="Lien.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

    <script defer src="script.js"></script>
</head>


<body>
 <!--Contient les icones et peuvent être cliquer-->   
 <header>
    <div class="bx bx-menu" id="menu-icon"></div>
    <a href="#" class="logo" id="logo"><img src="logo 2.png" alt="Logo"></a>
    <div class="navbar-icon">
        <a href="#"><i class='bx bx-search'></i></a>
        <a href="page admin.php"><i class='bx bx-user'></i></a>
        <a href="#"><i class='bx bx-cart'></i></a>
        <a href="#"><i class='bx bx-heart'></i></a>
    </div>
</header>    
    
    <!--Fond d'images coulissants-->

<div class="container">
    <div class="slider-wrapper" id="slide-container">
        <div class="slider">
            <img id="slide-1" src="image1.jpg"/>
            <img id="slide-2" src="image2.jpg"/>
            <img id="slide-3" src="image3.jpg"/>
        </div>    
    </div>
</div>  


<section class="products-section">
    <?php foreach($Produits as $produit):?>
            <div class="product">
                <?= $produit->nom ?>
                <img src="<?= $produit->image?>">
                <p><?= $produit->description; ?></p>
                <button type = "button">Acheter</button>
                <p class="price"><?= $produit->prix ?> CHF</p>
            </div>
    <?php endforeach;?>
</section>

<!--page d'accueil-->
<section class="home">
    <div class="text">
        <h4>Nouveaux maillots</h4>
        <h1>Saison 2023/24 <br> Et précédents</h1>   
        <p>"Faites vibrer les tribunes avec notre gamme de maillots de foot. 
        <br>Capturez l'esprit de la compétition et faites briller votre équipe."</p>
        <a href="#" class="button">Acheter maintenant</a>
    </div>
</body>
</html>