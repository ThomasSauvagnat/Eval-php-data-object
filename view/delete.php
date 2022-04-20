<?php
$title = 'Supprimer une planète';

ob_start() ?>
<h1>Etes-vous sûr de vouloir supprimer <?= $planete_objet -> getNom() ?></h1>
<h2><a href="?page=planetes&action=delete&id=<?= $_GET['id'] ?>&confirm=yes"><button>Oui</button></a></h2>
<h2><a href="?page=planetes"><button>Non</button></a></h2>

<?php

$content = ob_get_clean();
require('template.php');