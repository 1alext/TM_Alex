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


<!-- Page d'accueil -->
<section class="home">
    <div class="text">
        <h4>Nouveaux maillots</h4>
        <h1>Saison 2023/24 <br> Et précédents</h1>
        <p>"Faites vibrer les tribunes avec notre gamme de maillots de foot. 
        <br>Capturez l'esprit de la compétition et faites briller votre équipe."</p>
        
        <!-- Texte "Découvrez maintenant" avec flèches -->
        <div class="discover-now" id="discover-button">
            Découvrir
        </div>
    </div>
</section>

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
                    <img src="<?= $produit->image ?>" alt="<?= $produit->nom ?>">
                    <h2><?= $produit->nom ?></h2>
                    <p class="price"><?= $produit->prix ?> CHF</p>
                    <button class="add-to-cart">Ajouter au panier</button>
                    <p class="product-description" style="display: none;"><?= $produit->description; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
        <!-- Copie des produits pour le défilement infini -->
        <?php foreach($Produits as $produit): ?>
            <a href="page_produit.php?id=<?= $produit->id ?>" class="product-link">
                <div class="product">
                    <img src="<?= $produit->image ?>" alt="<?= $produit->nom ?>">
                    <h2><?= $produit->nom ?></h2>
                    <p class="price"><?= $produit->prix ?> CHF</p>
                    <button class="add-to-cart">Ajouter au panier</button>
                    <p class="product-description" style="display: none;"><?= $produit->description; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<!--Section Best Sellers-->
<section class="best-sellers-section" id="best-sellers-section">
    <h2>Meilleures ventes</h2>
    <div class="best-sellers-wrapper">
        <!--Best Seller 1-->
        <div class="best-seller">
            <img src="asset/all.jpg" alt="Allemagne">
            <h2>Maillot domicile Allemagne 2024/25</h2>
            <p class="price">80 CHF</p>
            <button class="add-to-cart">Ajouter au panier</button>
        </div>

        <!--Best Seller 2-->
        <div class="best-seller">
            <img src="asset/fr.jpg" alt="France">
            <h2>Maillot domicile France 2024/25</h2>
            <p class="price">80 CHF</p>
            <button class="add-to-cart">Ajouter au panier</button>
        </div>

        <!--Best Seller 3-->
        <div class="best-seller">
            <img src="asset/ang.jpg" alt="Angleterre">
            <h2>Maillot domicile Angleterre 2024/25</h2>
            <p class="price">80 CHF</p>
            <button class="add-to-cart">Ajouter au panier</button>
        </div>

        <!--Best Seller 4-->
        <div class="best-seller">
            <img src="asset/br.jpg" alt="Bresil">
            <h2>Maillot Domicile Brésil 2024/25</h2>
            <p class="price">80 CHF</p>
            <button class="add-to-cart">Ajouter au panier</button>
        </div>
    </div>
</section>

<!-- Bas page catégorie -->
<section class="continent-section">
    <h2>Sélectionnez un continent pour trouver votre maillot</h2>
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

<section class="espagne-section">
    <h2>Champions d'Europe</h2>
    <h3>Il est temps de célébrer en style avec les <span class="break">maillots de l'équipe nationale et la collection gagnants!</span></h3>
    <a href="produit.php?id=6" class="discover-text">Découvrir</a>
    <img src="asset/pubespagne.jpg" alt="Maillot de l'Espagne" class="espagne-image">
    <div class="espagne-content">
    </div>
</section>


<!--A propos-->

<section id="about">
    <div class="contenubas">
        <!-- Section A propos -->
        <div class="about-text">
            <h3>À propos</h3>
            <p>Hardvest est votre boutique en ligne dédiée aux maillots de football, des dernières saisons aux classiques incontournables. Nous sélectionnons des produits authentiques et de qualité pour satisfaire les passionnés et les collectionneurs.
            Notre objectif est de vous offrir une expérience d'achat unique avec des maillots qui combinent confort, style et performance. Explorez notre sélection et rejoignez notre communauté de fans de football.</p>
            <p>Merci de choisir Hardvest !</p>
        </div>
        <div class="social">
            <i class='bx bxl-instagram'></i>
            <i class='bx bxl-tiktok' ></i>
            <i class='bx bxl-pinterest' ></i>
        </div>
        <!-- Section des icônes -->
        <div class="icon-section">
            <div class="icon-circle"><i class='bx bxs-truck'></i></div>
            <div class="icon-circle"><i class='bx bxs-timer'></i></div>
                <div class="icon-circle"><i class='bx bxs-t-shirt'></i></div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div>
            <h6>Une question ?</h6>
            <h3>Contactez-nous</h3>
        </div>
        <form id="contactForm" action="#contact" method="post">
            <input type="email" name="email" placeholder="Entrer votre email" required>
            <input type="text" name="subject" placeholder="Entrer le sujet" required>
            <textarea name="message" placeholder="Entrer votre message" required></textarea>
            <button type="submit" name="submit">Envoyer</button>
        </form>
        <div id="response">

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $sujet = $_POST['subject'];
    $message = $_POST['message'];

    //Liste des mails autorisés
    $allowedDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'gbjb.ch', 'icloud.com', 'hotmail.com']; 

    //Valider l'adresse email avec FILTER_VALIDATE_EMAIL qui est un filtre spécifique
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div style="color: black; margin-top: 20px; font-size: 18px;">Adresse email invalide.</div>';

    } else {
        //Extraire le domaine de l'email donc garde seulement après le @ pour en suite vérifier avec la liste
        $domain = substr(strrchr($email, "@"), 1);

        //Vérifier si le domaine est dans la liste des domaines autorisés
        if (!in_array($domain, $allowedDomains)) {
            echo '<div style="color: black; margin-top: 20px; font-size: 18px;">Adresse email invalide.</div>';

        } else {
            try {
                //Connexion à la base de données
                $access = new PDO("mysql:host=localhost;dbname=hardvest;charset=utf8", "root", "");
                $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //Exécute la requête d'insertion
                $sql = "INSERT INTO contacts (email, sujet, message) VALUES (:email, :sujet, :message)";
                $stmt = $access->prepare($sql);
                $stmt->execute([
                    ':email' => $email,
                    ':sujet' => $sujet,
                    ':message' => $message
                ]);

                echo '<div style="color: black; margin-top: 20px; font-size: 18px;">Message envoyé avec succès !</div>';

            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }
    //Exit sert à éviter d'autres execution de codes
    exit();
}
?>
    </div>
</section>