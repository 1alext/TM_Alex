<?php

function ajouter($image, $nom, $prix, $description)
{
    if(require("connexion.php")) #si une connexion a lieu avec la base de données, exécute le code
    { 
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");
        $req->execute(array($image, $nom, $prix, $description));
        $req->closeCursor();
    }   
}

function afficher()
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

function afficherUnProduit($id)
{
    if(require("connexion.php"))
    {
        $req = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute(array($id));
        $produit = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $produit;
    }
}


