<?php
require("config/connexion.php");

//les IDs des produits pour l'Amérique du Sud
$idsAmeriqueSud = [1, 10, 12, 42, 43, 44]; // Argentine, Brésil, Colombie, Pérou, Uruguay, Chili

//Requête pour récupérer les produits d'Amérique du Sud
$placeholders = implode(',', array_fill(0, count($idsAmeriqueSud), '?'));
$query = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
$query->execute($idsAmeriqueSud);
$produitsAmeriqueSud = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits Amérique du Sud</title>
</head>
<body>
    <h1>Maillots Amérique du Sud</h1>
    
    <?php if ($produitsAmeriqueSud): ?>
        <ul>
            <?php foreach ($produitsAmeriqueSud as $produit) : ?>
                <li>
                    <h1><?php echo htmlspecialchars($produit['nom']); ?></h1>
                    <p>Prix: <?php echo htmlspecialchars($produit['prix']); ?> CHF</p>
                    <img src="<?php echo htmlspecialchars($produit['image']); ?>" alt="Image du produit" style="width:150px;"/>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun produit trouvé.</p>
    <?php endif; ?>
</body>
</html>