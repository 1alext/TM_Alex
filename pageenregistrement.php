<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Enregistrement</title>
    <link rel="stylesheet" href="Lien.css"/>
</head>
<body>
<div class="enregistrement-container">
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
