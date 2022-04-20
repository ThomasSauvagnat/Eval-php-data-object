<?php
declare(strict_types=1);

$title = 'Liste des planètes gazeuses';

ob_start(); ?>
<p><a href="index.php">Accueil</a></p>
<h1>Liste de toutes les planètes gazeuses</h1>

<?php 

foreach ($gazeuse_planetes as $id => $planete) {
    echo '<h2><a href="?page=planetes&id='.$planete -> getId().'">'.$planete -> getNom().'</a></h2>';
    echo '<a href="?page=planetes&action=update&id='.$planete -> getId().'"><button>Modifier</button></a>';
    echo '<a href="?page=planetes&action=delete&id='.$planete -> getId().'"><button>Supprimer</button></a>';
}

$content = ob_get_clean();
require('template.php');