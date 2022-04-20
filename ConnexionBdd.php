<?php
declare(strict_types=1);

// Connexion à la base de donnée
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=examen_pdo', 'root', '');
} catch (PDOException $e) {
    die('Erreur : '.$e -> getMessage());
}

// Création de la table planetes
$db -> exec("CREATE TABLE planetes
        (
            id INT (11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
            nom VARCHAR(7),
            type VARCHAR(10),
            diametre MEDIUMINT(9),
            gravite FLOAT,
            lien_nasa VARCHAR(180)
        )"
    );