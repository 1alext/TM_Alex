<?php
require("config/connexion.php");

//les IDs des produits pour l'Afrique
$idsAfrique = [17, 23, 24, 25, 30, 33, 36, 41]; // Sénégal, Maroc, Algérie, Tunisie, Ghana, Cameroun, Côte d'Ivoire, Nigeria

//Requête pour récupérer les produits d'Afrique
$placeholders = implode(',', array_fill(0, count($idsAfrique), '?'));
$query = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
$query->execute($idsAfrique);
$produitsAfrique = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits Afrique</title>
</head>
<body>
    <h1>Maillots Afrique</h1>
    
    <?php if ($produitsAfrique): ?>
        <ul>
            <?php foreach ($produitsAfrique as $produit) : ?>
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