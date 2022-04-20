<?php
$title = 'Validation';

ob_start();
// Si la requête modifie une ligne dans la BDD
if ($insert_request -> rowCount() == 1) {
    // Succès
    echo 'Planète ajoutée avec succès !';
} else {
    // Echec
    echo 'Erreur, la planète n\'a pas pu être ajoutée !';
}

echo '<br><a href="index.php"><button>Retour à l\'accueil</button></a>';


$content = ob_get_clean();
require('template.php');