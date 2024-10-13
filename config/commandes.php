<?php

function ajouter($image, $nom, $prix, $description)
{
    if (require("connexion.php")) {
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");
        $req->execute(array($image, $nom, $prix, $description));
        $req->closeCursor();
    }
}

function afficher()
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

function afficherUnProduit($id)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute(array($id));
        $produit = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $produit;
    }
}

function afficherProduitsParIds($ids) {
    if (require("connexion.php")) {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $req = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
        $req->execute($ids);
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}

function rechercherProduits($query)
{
    if (require("connexion.php")) {
        $req = $access->prepare("SELECT * FROM produits WHERE nom LIKE ? OR description LIKE ?");
        $req->execute(array("%$query%", "%$query%"));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}