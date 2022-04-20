<?php

if (!empty($_GET['page']) && $_GET['page'] == 'planetes') {
    require('controller/planeteController.php');
} else if (!empty($_GET['nom'])) {
    require('controller/planeteController.php');
} else if ( (!empty($_GET['page']) && $_GET['page'] == 'Tellurique') ) {
    require('controller/planeteController.php');
} else if ( (!empty($_GET['page']) && $_GET['page'] == 'Gazeuse') ) {
    require('controller/planeteController.php');
} else if (!empty($_GET['action']) && $_GET['action'] == 'insert') {
    require('controller/planeteController.php');
} else {
    // Affichage (par défaut) de l'accueil
    require('view/accueil.php');
}