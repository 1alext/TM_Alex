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

<!-- Bas page catégorie -->
<body id="europe-page">
<section class="continent-section">
    <h2>Sélectionnez un continent pour trouver votre maillot</h2>
    <div class="continent-grid">
        
        <a href="ameriquesud.php" class="continent-card">
            <img src="asset/ameriquesud.jpg" alt="Amerique du Sud">
            <p>Amérique du Sud</p>
        </a>
    
        <a href="ameriquenord.php" class="continent-card">
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
</body>

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
</html>