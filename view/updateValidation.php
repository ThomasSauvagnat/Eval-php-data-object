<?php
$title = 'Validation';

ob_start();
if ($updated_request -> rowCount() == 1) {
    echo 'Planète modifiée avec succès !';
} else {
    echo 'Erreur, la planète n\'a pas pu être modifiée !';
}

echo '<br><a href="?page=planetes"><button>Retour à la liste des planètes</button></a>';


$content = ob_get_clean();
require('template.php');