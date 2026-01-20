<?php
// 1. Forcer l'affichage des erreurs pour comprendre ce qui bloque
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Vérifier où PHP travaille réellement
$repertoire_actuel = getcwd();

// 3. Lister TOUS les fichiers (pas seulement .html) pour vérifier l'accès
$tous_les_fichiers = scandir($repertoire_actuel);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Diagnostic PHP</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #222; color: #0f0; }
        .box { border: 1px solid #0f0; padding: 10px; margin-bottom: 20px; }
        .error { color: #f00; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Diagnostic du répertoire</h1>
    
    <div class="box">
        <strong>Chemin détecté par PHP :</strong> <?php echo $repertoire_actuel; ?>
    </div>

    <div class="box">
        <strong>Fichiers détectés dans ce dossier :</strong>
        <ul>
            <?php 
            foreach ($tous_les_fichiers as $f) {
                if ($f == "." || $f == "..") continue;
                
                // Analyse du titre si c'est un HTML
                $titre = "---";
                if (pathinfo($f, PATHINFO_EXTENSION) == 'html') {
                    $contenu = file_get_contents($f);
                    if (preg_match('/<title>(.*?)<\/title>/is', $contenu, $match)) {
                        $titre = htmlspecialchars($match[1]);
                    } else {
                        $titre = "Pas de balise title trouvée";
                    }
                }
                
                echo "<li><strong>$f</strong> | Titre : $titre</li>";
            }
            ?>
        </ul>
    </div>

</body>
</html>
