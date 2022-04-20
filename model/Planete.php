<?php
declare(strict_types=1);

class Planete {
// Properties
    private int $id;
    private string $nom;
    private string $type;
    private int $diametre;
    private float $gravite;
    private string $lien_nasa;

//HYDRATE
    public function hydrate(): void {
        $this -> setNom( (string)$_POST['nom']);
        $this -> setType( (string)$_POST['type']);
        $this -> setDiametre( (int)$_POST['diametre'] );
        $this -> setGravite( (float)$_POST['gravite']);
        $this -> setLien_nasa( (string)$_POST['lien_nasa']);
    }

// Getter & setter
    public function setId(int $id): void {
        $this -> id = $id;
    }
    public function getId(): int {
        return $this -> id;
    }

    public function setNom(string $nom): void {
        if (self::nomMaxLength($nom) && self::isString($nom)) {
            $this -> nom = $nom;
        }
        
    }
    public function getNom(): string {
        return $this -> nom;
    }

    public function setType(string $type): void {
        if (self::typeMaxLength($type) && self::isString($type)) {
            $this -> type = $type;
        }
    }
    public function getType(): string {
        return $this -> type;
    }

    public function setDiametre($diametre): void {
        if (self::isInt($diametre)) {
            $this -> diametre = $diametre;
        }
    }

    public function getDiametre() {
        return $this -> diametre;
    }

    public function setGravite(float $gravite): void {
        if (self::isFloat($gravite)) {
            $this -> gravite = $gravite;
        }
    }
    public function getGravite(): float {
        return $this -> gravite;
    }

    public function setLien_nasa(string $lien_nasa): void {
        if (self::lienMaxLength($lien_nasa) && self::isString($lien_nasa)) {
            $this -> lien_nasa = $lien_nasa;
        }
    }
    public function getLien_nasa(): string {
        return $this -> lien_nasa;
    }

// Validators
    private static function nomMaxLength($text): bool {
        if (strlen($text) <= 7) {
            return true;
        }
        throw new Exception("$text est de taille incorrect, ce champ doit être inférieur à 7 caractères", 1);
        return false;
    }

    private static function lienMaxLength($text): bool {
        if (strlen($text) <= 180) {
            return true;
        }
        throw new Exception("$text est de taille incorrect (doit être inférieur à 180 caractères)", 1);
        return false;
    }

    private static function typeMaxLength($text): bool {
        if (strlen($text) <= 10) {
            return true;
        }
        throw new Exception("$text est de taille incorrect ( doit être inférieur à 10 caractères)", 1);
        return false;
    }

    private static function isString ($text): bool {
        if (is_string($text)) {
            return true;
        }
        throw new Exception("$text n'est pas de type string", 1);
        return false;
    }

    private static function isFloat($nb): bool {
        if (is_float($nb)) {
            return true;
        }
        throw new Exception("$nb n'est pas de type float", 1);
        return false;
    }

    private static function isInt($nb): bool {
        if (is_int($nb)) {
            return true;
        }
        throw new Exception("$nb n'est pas de type INT", 1);
        return false;
    }
}