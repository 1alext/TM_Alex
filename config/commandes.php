<?php

#3 fonctions qui permettent d'interragir avec la bd
function afficher()
{
    require("connexion.php");
    #le rôle de cette fonction est de récupérer tout les éléments de la table "produits"
     //Inclure la connexion
    $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");
    $req->execute();
    #récupère les résultats sous forme d'objets php
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $data;
}
#Cette fonction récupére un produit spécifique en fonction de son id
function afficherUnProduit($id)
{
    require("connexion.php");
    $req = $access->prepare("SELECT * FROM produits WHERE id = ?"); //Sélectionne un produit où la colonne id correspond à la valeur fournie.
    $req->execute([$id]); //execute la requete en remplacant ? par l'id
    $produit = $req->fetch(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $produit;
}

#Récupére plusieurs produits dont les id sont spécifiés dans un tableau
function afficherProduitsParIds($ids) {
    require("connexion.php");
    #créer un tableau contenant ? éléments, implode va transformer le tableau en une chaîne de caractères
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    #requete pour rechercher les produits dans le tableau
    $req = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
    $req->execute($ids);
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $data;
}
?>
