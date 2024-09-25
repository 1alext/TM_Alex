<?php
require("config/connexion.php");

//les IDs des produits pour l'Amérique du Nord
$idsAmeriqueNord = [21, 28, 31, 45]; // USA, Canada, Mexique, Jamaïque

//Requête pour récupérer les produits d'Amérique du Nord
$placeholders = implode(',', array_fill(0, count($idsAmeriqueNord), '?'));
$query = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
$query->execute($idsAmeriqueNord);
$produitsAmeriqueNord = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits Amérique du Nord</title>
</head>
<body>
    <h1>Maillots Amérique du Nord</h1>
    
    <?php if ($produitsAmeriqueNord): ?>
        <ul>
            <?php foreach ($produitsAmeriqueNord as $produit) : ?>
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
