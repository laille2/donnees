<div>

<a href="index.php?task=afficherPersonnes"><input type="button" value="Afficher la base de données"></a>

<form action="index.php?task=chercherPersonne" method="POST">
    <p>Nom et prénom d'une personne : </p>
    <p>Le nom : <input type="text" name="nom" required></p>
    <p>Le prénom : <input type="text" name="prenom" required></p>
    <input type="submit" value="Chercher la personne">
</form>

<form action="index.php?task=insererPersonne" method="POST">
    <p>Nom et prénom d'une personne : </p>
    <p>Le nom : <input type="text" name="nom" required></p>
    <p>Le prénom : <input type="text" name="prenom" required></p>
    <input type="submit" value="Ajouter la personne dans la base de données">
</form>

<a href="index.php?task=afficherDoublons"><input type="button" value="Afficher les doublons dans la base de données"></a>

</div>