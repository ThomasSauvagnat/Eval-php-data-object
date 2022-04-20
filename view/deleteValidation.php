<?php
$title = 'Validation de suppression';

ob_start();
if ($deleted_planete -> rowCount() ==1) {
    echo 'Planètes supprimée avec succès !';
} else {
    echo 'La planète n\'a pas pu être supprimée';
}

echo '<a href="?page=planetes"><button>Retour à la liste des planètes</button></a>';

$content = ob_get_clean();
require('template.php');