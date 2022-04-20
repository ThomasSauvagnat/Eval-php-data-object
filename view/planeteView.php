<?php

$title = 'Détails de la planète';

ob_start(); ?>
<p><a href="?page=planetes">Retour</a></p>
<h1><?= $planete_objet -> getNom() ?></h1>
<h2>Type : <?= $planete_objet -> getType() ?></h2>
<h2>Diamètre : <?= $planete_objet -> getDiametre() ?></h2>
<h2>Gravité : <?= $planete_objet -> getGravite() ?></h2>
<h2>Lien de la nasa : <a href="<?= $planete_objet -> getLien_nasa() ?>">voir</a></h2>

<?php
$content = ob_get_clean();
require('template.php');