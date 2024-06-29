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

    <enregistrement action="" method="post">    
        <h3>S'enregistrer</h3>
        <input type="text" name="nom" entre="Entrer votre nom">
        <input type="email" name="email" entre="Entrer votre email">
        <input type="password" name="password" entre="Entrer votre mot de passe">
        <input type="submit" name="submit" value="S'enregistrer" class="enregistrement-btn">
        <p>Déjà un compte ? <a href="pagelogin.php"></a>Se connecter</p>
</body>
</html>