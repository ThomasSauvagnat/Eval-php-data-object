<?php
declare(strict_types=1);

$title = 'Ajouter une planète';

ob_start(); ?>
<h1>Ajouter une planète</h1>

<form action="" method="post">
    <label for="nom">Nom de la planète : </label>
    <input type="text" name="nom" maxlength="7">

    <label for="type">Type de la planète : </label>
    <input type="text" name="type" maxlength="10">

    <label for="diametre">Diamètre de la planète : </label>
    <input type="number" name="diametre" maxlength="9">

    <label for="gravite">Gravité de la planète : </label>
    <input type="number" name="gravite" step="0.0001">

    <label for="lien_nasa">Lien NASA de la planète : </label>
    <input type="text" name="lien_nasa" maxlength="180">

    <input type="submit" value="Ajouter">
</form>

<?php
// Si une erreur existe, alors affichage de celle-ci
if (isset($e)) {
    echo $e -> getMessage();
}
$content = ob_get_clean();
require('template.php');