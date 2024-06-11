<?php

    function ajouter($nom, $image, $prix, $description)
    {
        if(require("connexion.php")) #(si une connexion a lieu avec la base de donées, exécute le code )
        {
            $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES ()")
        }                                
    }

?>