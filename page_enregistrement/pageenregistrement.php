<?php
session_start();
@include '../config/config.php';

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = "SELECT * FROM utilisateurs WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'Compte déjà existant !';
    }else{
        if($pass != $cpass){
            $error[] = 'Mot de passe ne correspond pas !';
        }else{
            $insert = "INSERT INTO utilisateurs (email, password) VALUES ('$email', '$pass')";
            mysqli_query($conn, $insert);
            $_SESSION['user_email'] = $email; // Mise à jour de la session avec l'email de l'utilisateur
            header('location: ../index.php');
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

