<?php
session_start();
include '../config/connexion.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    //Requête préparée pour vérifier si l'utilisateur existe
    $query = $access->prepare("SELECT * FROM utilisateurs WHERE email = :email AND password = :pass");
    $query->execute(['email' => $email, 'pass' => $pass]);

    //Récupération des résultats
    $user = $query->fetch();

    if ($user) {
        //Si l'utilisateur existe, on stocke l'email dans la session
        $_SESSION['user_email'] = $user['email'];
        header('Location: ../index.php');
        exit();
    } else {
        //En cas d'erreur de connexion
        $error[] = 'Email ou mot de passe incorrect';
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Lien.css"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script defer src="../script.js"></script>
    <title>Page Se connecter</title>
</head>
<body id="europe-page">
<header id="produits-europe">
    <a href="../index.php" class="logo" id="logo"><img src="../asset/logo 2.png" alt="Logo"></a>
    <div class="navbar-icon" id="navbar">
    <form method="GET" action="../recherche.php" class="search-bar-container" id="search-bar-container">
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
                    <a href="../page_enregistrement/logout_form.php" class="logout-link">Déconnexion</a>
                <?php else: ?>
                    <a href="../page_enregistrement/pagelogin.php" class="user-button">Se connecter</a>
                    <a href="../page_enregistrement/pageenregistrement.php" class="user-button">S'enregistrer</a>
                <?php endif; ?>
            </div>
        </div>
        <a href="../pagepanier.php"><i class='bx bx-cart'></i></a>
        <a href="../pagefavoris.php"><i class='bx bx-heart'></i></a>
        <a href="#" class="menu-icon" id="menu-icon"><i class='bx bx-menu'></i></a>
    </div>
</header>

<div class="enregistrement-container">
    <?php
    if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        }
    }
    ?>
    <form class="enregistrement" action="" method="post">    
        <h3>Se connecter</h3>
        <input type="email" name="email" required placeholder="Adresse e-mail">
        <input type="password" name="password" required placeholder="Mot de passe">
        <input type="submit" name="submit" value="Se connecter" class="enregistrement-btn">
        <p>Pas de compte ? <a href="pageenregistrement.php">S'enregistrer</a></p>
    </form>
</div>
</body>
</html>

 