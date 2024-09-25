<?php
require("config/connexion.php");

//les IDs des produits pour l'Europe
$idsEurope = [2, 3, 4, 5, 6, 7, 8, 9, 11, 13, 14, 15, 16, 18, 20, 32, 34, 35, 37, 38, 39, 40];

//Requête pour récupérer les produits d'Europe
$placeholders = implode(',', array_fill(0, count($idsEurope), '?'));
$query = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
$query->execute($idsEurope);
$produitsEurope = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Lien.css">
    <title>Produits Europe</title>
</head>
<body>
<h1 class="titre-produits-europe">Maillots Europe</h1>
    
    <div class="produits-europe"> 
        <?php if ($produitsEurope): ?>
            <ul>
            <?php foreach ($produitsEurope as $produit) : ?>
                    <li>
                        <img src="<?php echo htmlspecialchars($produit['image']); ?>" alt="Image du produit" style="width:150px;"/>
                        <h1><?php echo htmlspecialchars($produit['nom']); ?></h1>
                        <p><?php echo htmlspecialchars($produit['prix']); ?> CHF</p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun produit trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>