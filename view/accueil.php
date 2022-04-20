<?php

$title = 'Accueil';

ob_start(); ?>
<h1>Bienvenu</h1>

<form action="index.php">
    <label for="nom">Rechercher une planète : </label>
    <input type="text" name="nom" placeholder="exemple : Mercure">

    <input type="submit" value="Rechercher">
</form>

<h2><a href="?page=planetes">Voir toutes les planètes</a></h2>
<h2><a href="?page=Tellurique">Voir toutes les planètes telluriques</a></h2>
<h2><a href="?page=Gazeuse">Voir toutes les planètes gazeuses</a></h2>
<h2><a href="?action=insert">Insérer une nouvelle planète</a></h2>