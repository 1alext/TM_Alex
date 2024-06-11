<?php

    function ajouter($image, $nom, $prix, $description)
    {
        if(require("connexion.php")) #si une connexion a lieu avec la base de donées, exécute le code )
        { #prépare l'insertion avant executer
            $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES ($image, $nom, $prix, $description)");
        
            $req->execute(array($image, $nom, $prix, $description));

            $req->closeCursor();
        }   
    }
function afficher()
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC")
        $req->execute();
    }
}
?>