<?php
declare(strict_types=1);
require('model/PlaneteManager.php');

// Si un ID transite dans l'URL
if (!empty($_GET['id'])) {
    // Si un ID correspond à un ID de la BDD
    if( $planete_objet = PlaneteManager::getOne($_GET['id']) ) {
        require('view/planeteView.php');
    } else {
        // Si l'ID ne correspond à rien alors erreur
        require('view/error.php');
    }
    // Si dans l'URL : action=udpate
    if ( !empty($_GET['action']) && $_GET['action'] == 'update' ) {
        // S'il y a un POST (bouton submit)
        if ($_POST) {
            // Création d'un objet planète
            $planete_update = new Planete();
            // Attribution des propriétés données par le formulaire via l'hydrate
            $planete_update -> hydrate();
            // Stockage de la requête pour pouvoir compter le nombre de lignes affecté par celle-ci pour ensuite faire une condition de validation
            $updated_request = PlaneteManager::update($planete_update);
            // Affichage de la page de validation
            require('view/updateValidation.php');
        } else {
            // Affichage du formulaire de modification (par défaut)
            require('view/update.php');
        }
    // Si dans l'URL : action=delete
    } else if ( !empty($_GET['action']) && $_GET['action'] == 'delete' ) {
        // Si la supression est confirmée
        if (!empty($_GET['confirm']) && $_GET['confirm'] == 'yes') {
            // Supression de la planète
            $deleted_planete = PlaneteManager::delete();
            // Affichage de la vue de validation de supression
            require('view/deleteValidation.php');
        } else {
            // Affichage de la vue de supression
            require ('view/delete.php');
        }
    }
// Si dans l'URL : action=insert
} else if (!empty($_GET['action']) && $_GET['action'] == 'insert') {
    // S'il y a un POST
    if ($_POST) {
        try {
            $planete = new Planete();
            $planete -> hydrate();
            $insert_request = PlaneteManager::insert($planete);
            require('view/insertValidation.php');
            } catch (Exception $e) {
                require('view/insert.php');
            }
    } else {
        // Renvoie du formulaire en cas d'erreur
        require('view/insert.php');
    }
// Si dans l'URL : page=Tellurique
} else if ( (!empty($_GET['page']) && $_GET['page'] == 'Tellurique') ) {
    // Récupération des planète telluriques
    $tellurique_planetes = PlaneteManager::getAllTellurique();
    // Affichage de la liste des planètes telluriques
    require('view/planeteAllTellurique.php');
} else if ( (!empty($_GET['page']) && $_GET['page'] == 'Gazeuse') ) {
    $gazeuse_planetes = PlaneteManager::getAllGazeuse();
    require('view/planeteAllGazeuse.php');
} else if ( !empty($_GET['nom']) ) {
    if ($planete_objet = PlaneteManager::getOneByName()) {
        require('view/planeteView.php');
    } else {
        require('view/error.php');
    }
} else {
    // Récupération de toutes les planètes
    $all_planetes_object = PlaneteManager::getAll();
    // Affichage de toutes les planètes
    require('view/planeteAll.php');
}