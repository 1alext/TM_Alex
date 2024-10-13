<?php
session_start();
require("config/commandes.php");

if (!isset($_GET['id'])) {
    echo "Produit introuvable";
    exit;
}

$id = $_GET['id'];
$produit = afficherUnProduit($id);

//Initialiser le panier et les favoris
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'add_to_cart') {
        $_SESSION['cart'][] = [
            'id' => $_POST['product_id'],
            'size' => $_POST['size'],
        ];
        $_SESSION['message'] = "Article ajouté avec succès au panier!";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }

    if ($_POST['action'] === 'add_to_favorites') {
        $_SESSION['favorites'][] = $_POST['product_id'];
        $_SESSION['message'] = "Article ajouté aux favoris!";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}
?>

<?php if (isset($_SESSION['message'])): ?>
    <div class="success-message" id="success-message">
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
        }
    });
</script>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit - <?= htmlspecialchars($produit->nom) ?></title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="Lien.css">
    <script defer src="script.js"></script>
    <p class="navigation"><a href="index.php" class="underline">Accueil</a></p>
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

<section class="product-details">
    <div class="title-container">
        <h1 class="product-title"><?= htmlspecialchars($produit->nom) ?></h1>
    </div>
    <div class="product-info">
        <img src="<?= htmlspecialchars($produit->image) ?>" alt="<?= htmlspecialchars($produit->nom) ?>">
        <?php
        //Découper la description en plusieurs lignes
        $description = wordwrap(htmlspecialchars($produit->description), 80, "<br>\n", true);
        echo "<p class='description'>" . $description . "</p>";
        ?>
    </div>
    <p class="price"><?= htmlspecialchars($produit->prix) ?> CHF</p>

    <!-- Formulaire pour choisir la taille -->
<form action="" method="POST" class="size-selection" autocomplete="off">
    <label for="size">Choisissez une taille :</label>
    <select name="size" id="size" required>
        <option value="" disabled selected>Sélectionnez une taille</option>
        <option value="XS">XS</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
    </select>
    <input type="hidden" name="product_id" value="<?= htmlspecialchars($produit->id) ?>">
    <button type="submit" name="action" value="add_to_cart">Ajouter au Panier</button>
    <button type="submit" name="action" value="add_to_favorites">Ajouter aux Favoris</button>
</form>
</section>

<!--Section Hardvest en quelques chiffres-->
<section class="hardvest-stats">
    <h2>Hardvest en quelques chiffres</h2>

    <!-- Conteneur pour les statistiques -->
    <div class="stats-container">
        <!-- Carré gauche -->
        <div class="stat-box">
            <p class="stat-text">+200 commandes en 3 mois</p>
        </div>

        <!-- Carré droit -->
        <div class="stat-box">
            <p class="stat-number">536 Avis</p>
        </div>
    </div>

    <!-- Section Avis en dessous des carrés -->
    <div class="avis-section">
        <p>"Les maillots de football Hardvest sont incroyables! Le design est top, et la qualité du tissu est impeccable. Confortables à porter, parfaits pour les matchs ou pour afficher votre soutien à votre équipe préférée. Je recommande vivement !"</p>
        
        <!-- Ajout de l'image utilisateur -->
        <img src="asset/libre.png" alt="Avis utilisateur" class="avis-image">
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

</html>
