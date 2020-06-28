<!DOCTYPE html>
<html>

<body>
    <form action="exercise2.php" method="POST">
        <fieldset>
            <legend>Adresse client</legend>

            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" /><br />

            <label for="nom">Nom:</label>
            <input type="text" name="nom" /><br />

            <label for="addresse">Addresse:</label>
            <input type="text" name="addresse" /><br />

            <label for="ville">Ville:</label>
            <input type="text" name="ville" /><br />

            <label for="postal">Code postal:</label>
            <input type="text" name="postal" /><br />

            <input type="submit" />
        </fieldset>
    </form>
</body>

</html>

<?php
if (!empty($_POST)) {
    echo ("
    <table>
        <tr>
            <th>Prenom:</th>
            <td>{$_POST['prenom']}</td>
        </tr>
        <tr>
            <th>Nom:</th>
            <td>{$_POST['nom']}</td>
        </tr>
        <tr>
            <th>Addresse:</th>
            <td>{$_POST['addresse']}</td>
        </tr>
        <tr>
            <th>Ville:</th>
            <td>{$_POST['ville']}</td>
        </tr>
        <tr>
            <th>Code postal:</th>
            <td>{$_POST['postal']}</td>
        </tr>
    </table>
    ");
}
?>