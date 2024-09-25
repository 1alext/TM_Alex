<?php
require("config/connexion.php");

//les IDs des produits pour l'Asie
$idsAsie = [19, 22, 26, 27, 46, 47]; // Japon, Vietnam, Corée du Sud, Arabie Saoudite, Australie, Qatar

//Requête pour récupérer les produits d'Asie
$placeholders = implode(',', array_fill(0, count($idsAsie), '?'));
$query = $access->prepare("SELECT * FROM produits WHERE id IN ($placeholders)");
$query->execute($idsAsie);
$produitsAsie = $query->fetchAll(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits Asie</title>
</head>
<body>
    <h1>Maillots Asie</h1>
    
    <?php if ($produitsAsie): ?>
        <ul>
            <?php foreach ($produitsAsie as $produit) : ?>
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
