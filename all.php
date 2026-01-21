<?php
// Définition des données du tableau dans une variable PHP
$tableauDonnees = [
    ['nom' => 'Collection de pièce', 'url' => 'https://coins-lyart.vercel.app/home.html'],
    ['nom' => 'Généalogie', 'url' => 'https://perso-pi.vercel.app/genealogie.html'],
    ['nom' => 'Copier Coller', 'url' => 'https://perso-pi.vercel.app/copy.html']
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes projets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        
        h1 {
            color: #333;
        }
        
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        a {
            color: #1a73e8;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Mon Tableau</h1>
    
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Lien</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tableauDonnees as $ligne): ?>
            <tr>
                <td><?php echo htmlspecialchars($ligne['nom']); ?></td>
                <td><a href="<?php echo htmlspecialchars($ligne['url']); ?>" target="_blank"><?php echo htmlspecialchars($ligne['url']); ?></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
