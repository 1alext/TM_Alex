<?php

#Connexion à la base de données)
try {   
    $access=new pdo("mysql:host=localhost;dbname=hardvest;charset=utf8", "root","");

    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $error) {
    $error->getMessage();
}

?>