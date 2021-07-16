<?php

namespace Controllers;

require_once("libraries/autoload.php");

class Controller
{
    public function index()
    {
        $pageTitle = "Index";
        ob_start(); 
        require("templates/index.html.php");
        $pageContent = ob_get_clean();

        require("templates/template.php");
    }

    public function afficherPersonnes()
    {
        $pageTitle = "Personnes";
        ob_start(); 
        $personnes = \Models\Personne::findAll('nom');

        require("templates/afficher.html.php");
        $pageContent = ob_get_clean();

        require("templates/template.php");
    }

    public function afficherDoublons()
    {
        $pageTitle = "Doublons";
        ob_start();
        $personnes = \Models\Personne::findDoublons();

        require("templates/afficher.html.php");
        $pageContent = ob_get_clean();

        require("templates/template.php");
    }

    public function chercherPersonne()
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);

        $pageTitle = "Personne : $nom $prenom";
        ob_start();
        $personne = \Models\Personne::findByNomAndPrenom($nom, $prenom);

        if ($personne) {
            echo "La personne $nom $prenom est présente dans la bdd.";
        } else {
            echo "La personne $nom $prenom n'est pas présente dans la bdd. <br />";

            $reqNom = \Models\Personne::findByNom($nom);

            $reqPrenom = \Models\Personne::findByPrenom($prenom);

            if ($reqNom) {
                echo "Le nom $nom est présent dans la bdd. <br />";
            } else {
                echo "Le nom $nom n'est pas présent dans la bdd. <br />";
            }

            if ($reqPrenom) {
                echo "Le prénom $prenom est présent dans la bdd.";
            } else {
                echo "Le prénom $prenom n'est pas présent dans la bdd.";
            }
        }
        $pageContent = ob_get_clean();

        require("templates/template.php");
    }

    public function insererPersonne()
    {
        $pageTitle = "Ajouter une personne";
        ob_start();
        $pdo = \Models\Personne::getPdo();

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);

        $personne = \Models\Personne::findByNomAndPrenom($nom, $prenom);

        if ($personne) {
            echo "La personne $nom $prenom est déjà présente dans la bdd !";
        } else {
            if(\Models\Personne::insert($nom, $prenom)){
                echo "La personne $nom $prenom est désormais dans la  bdd !";
            }
        }
        $pageContent = ob_get_clean();

        require("templates/template.php");
    }
}
