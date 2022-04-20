<?php
declare(strict_types=1);

$title = 'Modifier une planète';

ob_start(); ?>
<h1>Modifier la planète : <?= $planete_objet -> getNom() ?></h1>

<form action="" method="post">
    <label for="nom">Nom de la planète : </label>
    <input type="text" name="nom" maxlength="7" value="<?= $planete_objet -> getNom() ?>">

    <label for="type">Type : </label>
    <input type="text" name="type" maxlength="10" value="<?= $planete_objet -> getType() ?>">

    <label for="diametre">Diamètre : </label>
    <input type="number" name="diametre" maxlength="9" value="<?= $planete_objet -> getDiametre() ?>">

    <label for="gravite">Gravité : </label>
    <input type="number" name="gravite" step="0.0001" value="<?= $planete_objet -> getGravite() ?>">

    <label for="lien_nasa">Lien NASA : </label>
    <input type="text" name="lien_nasa" maxlength="180" value="<?= $planete_objet -> getLien_nasa() ?>">

    <input type="submit" value="Modifier">
</form>

<?php
if (isset($e)) {
    echo $e -> getMessage();
}
$content = ob_get_clean();
require('template.php');