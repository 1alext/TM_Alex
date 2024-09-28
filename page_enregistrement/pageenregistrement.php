<?php
session_start();
include '../config/connexion.php'; 

//Vérifie si la connexion PDO ($access) est bien définie
if (!isset($access)) {
    die("Connexion à la base de données échouée.");
}

if(isset($_POST['submit'])){
    //Prépare les données de l'utilisateur
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    //Requête pour vérifier si l'utilisateur existe déjà
    $query = $access->prepare("SELECT * FROM utilisateurs WHERE email = :email AND password = :pass");
    $query->execute(['email' => $email, 'pass' => $pass]);
    $result = $query->fetchAll();

    if(count($result) > 0){
        $error[] = 'Compte déjà existant !';
    } else {
        if($pass != $cpass){
            $error[] = 'Mot de passe ne correspond pas !';
        } else {
            //Insertion du nouvel utilisateur
            $insert = $access->prepare("INSERT INTO utilisateurs (email, password) VALUES (:email, :pass)");
            $insert->execute(['email' => $email, 'pass' => $pass]);

            //Mise à jour de la session avec l'email de l'utilisateur
            $_SESSION['user_email'] = $email;

            //Redirige vers la page d'accueil
            header('Location: ../index.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Enregistrement</title>
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
        <h3>S'enregistrer</h3>
        <input type="email" name="email" required placeholder="Adresse e-mail">
        <input type="password" name="password" required placeholder="Mot de passe">
        <input type="password" name="cpassword" required placeholder="Confirmer votre mot de passe">
        <input type="submit" name="submit" value="S'enregistrer" class="enregistrement-btn">
        <p>Déjà un compte ? <a href="pagelogin.php">Se connecter</a></p>
    </form>
</div>
</body>
</html>

