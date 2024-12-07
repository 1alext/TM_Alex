<?php
#try tente executer le code qui permet de se co à la bd, si une erreur survient catch est exécuté pour afficher l'erreur
#PDO : PHP data objects permet interraction avec bd, établit la connexion avec access.
try {   
    $access = new PDO(
        "mysql:host=mysql-hardvest.alwaysdata.net;dbname=hardvest_site;charset=utf8",
        "hardvest",  // Nom d'utilisateur
        "6T#Y.s.RxPGY$23"  // Mot de passe
    );
    #affiche erreur 
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $error) {
    echo "Erreur : " . $error->getMessage();
}
?>