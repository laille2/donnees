<?php

namespace Models;

use Models\Personne as ModelsPersonne;

class Personne
{
    private static $pdo = null;

    public static function getPdo()
    {
        if (self::$pdo == null) {
            self::$pdo = new \PDO("mysql:host=localhost;dbname=donnees", 'root', '');
        }
        return self::$pdo;
    }

    public static function findAll(?string $ordre = "")
    {
        $pdo = self::getPdo();

        $requete = "SELECT * FROM contenu";
        if ($ordre) {
            $requete .= " ORDER BY $ordre";
        }

        $req = $pdo->query($requete);
        $personnes = $req->fetchAll();
        return $personnes;
    }

    public static function findByNomAndPrenom(string $nom, string $prenom)
    {
        $pdo = self::getPdo();

        $req = $pdo->prepare("SELECT * FROM contenu WHERE nom=:nom AND prenom=:prenom");
        $req->execute(compact('nom', 'prenom'));
        $personne = $req->fetch();

        return $personne;
    }

    public static function findByNom(string $nom)
    {
        $pdo = self::getPdo();

        $req = $pdo->prepare("SELECT * FROM contenu WHERE nom=:nom");
        $req->execute(compact('nom'));
        $personne = $req->fetch();

        return $personne;
    }

    public static function findByPrenom(string $prenom)
    {
        $pdo = self::getPdo();

        $req = $pdo->prepare("SELECT * FROM contenu WHERE prenom=:prenom");
        $req->execute(compact('prenom'));
        $personne = $req->fetch();

        return $personne;
    }

    public static function findDoublons()
    {
        $pdo = self::getPdo();

        try {
            $req = $pdo->query("SELECT DISTINCT nom, prenom FROM contenu c1 WHERE (SELECT count(*) from contenu c2 where c2.nom=c1.nom and c2.prenom=c1.prenom)>1 ORDER BY nom");
            $personnes = $req->fetchAll();
        } catch (\Throwable $th) {
            echo "Erreur : " . var_dump($th);
        }

        return $personnes;
    }

    public static function insert(string $nom, string $prenom)
    {
        $pdo = self::getPdo();

        try {
            $req = $pdo->prepare("INSERT INTO contenu (nom, prenom) VALUES (:nom, :prenom)");
            $req = $req->execute(array('nom' => $nom, 'prenom' => $prenom));
        } catch (\Throwable $th) {
            echo "Erreur : " . $th->$php_errormsg;
        }

        return $req;
    }
}
