<?php
declare(strict_types=1);
require('ConnexionBdd.php');
require('Planete.php');


class PlaneteManager {
// GET ONE
    public static function getOne($id) {
        // Préparation de la requête
        $prepared_request = $GLOBALS['db'] -> prepare ( 'SELECT * FROM planetes WHERE id = ?');
        // Exécution de la requête avec l'ID qui transite dans l'URL
        $prepared_request -> execute( [$_GET['id']] );
        // Renvoie du résultat de la requête
        return $prepared_request -> fetchObject('Planete');
    }

// Get ONE by name
    public static function getOneByName() {
                                                                            // Ajout de LIKE %?%
        $prepared_request = $GLOBALS['db'] -> prepare( 'SELECT * FROM planetes WHERE nom = ?' );
        $prepared_request -> execute( [$_GET['nom']]);
        return $prepared_request -> fetchObject('Planete');
    }

// GET ALL
    public static function getAll() {
        $request_all = $GLOBALS['db'] -> query ( 'SELECT * FROM planetes' );
        return $request_all -> fetchAll(PDO::FETCH_CLASS, 'Planete');
    }

// GET ALL TELLURIQUE
    public static function getAllTellurique() {
        $request_all_tellurique = $GLOBALS['db'] -> prepare ( 'SELECT * FROM planetes WHERE type = ?' );
        $request_all_tellurique -> execute ( [$_GET['page']]);
        return $request_all_tellurique -> fetchAll(PDO::FETCH_CLASS, 'Planete');
    }

// GET ALL GAZEUSE
    public static function getAllGazeuse() {
        $request_all_tellurique = $GLOBALS['db'] -> prepare ( 'SELECT * FROM planetes WHERE type = ?' );
        $request_all_tellurique -> execute ( [$_GET['page']]);
        return $request_all_tellurique -> fetchAll(PDO::FETCH_CLASS, 'Planete');
    }

// INSERT
    public static function insert($hydrated_object) {
        $nom = $hydrated_object -> getNom();
        $type = $hydrated_object -> getType();
        $diametre = $hydrated_object -> getDiametre();
        $gravite = $hydrated_object -> getGravite();
        $lien_nasa = $hydrated_object -> getLien_nasa();
        $insert_request = $GLOBALS['db'] -> prepare ( 'INSERT INTO planetes (nom, type, diametre, gravite, lien_nasa) VALUES (:nom, :type, :diametre, :gravite, :lien_nasa)');
        $insert_request -> execute ( ['nom' => $nom, 'type' => $type, 'diametre' => $diametre, 'gravite' => $gravite, 'lien_nasa' => $lien_nasa] );
        return $insert_request;
    }

// UPDATE
    public static function update($hydrated_object) {
        $nom = $hydrated_object -> getNom();
        $type = $hydrated_object -> getType();
        $diametre = $hydrated_object -> getDiametre();
        $gravite = $hydrated_object -> getGravite();
        $lien_nasa = $hydrated_object -> getLien_nasa();
        $update_request = $GLOBALS['db'] -> prepare ( 'UPDATE planetes SET nom = ?, type = ?, diametre = ?, gravite = ?, lien_nasa = ? WHERE id = ?');
        $update_request -> execute ( [$nom, $type, $diametre, $gravite, $lien_nasa, $_GET['id']] );
        return $update_request;
    }

// DELETE
    public static function delete() {
        $delete_request = $GLOBALS['db'] -> prepare ( 'DELETE FROM planetes WHERE id = ?' );
        $delete_request -> execute ( [$_GET['id']] );
        return $delete_request;
    }
}