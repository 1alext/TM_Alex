<?php

@include '../config/config.php';

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = "SELECT * FROM utilisateurs WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
         

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
<div class="enregistrement-container">
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
