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
    <title>Page se connecter</title>
    <link rel="stylesheet" href="../Lien.css"/>
</head>
<body>

<header>
    <a href="../index.php" class="logo" id="logo"><img src="../asset/logo 2.png" alt="Logo"></a>
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
 