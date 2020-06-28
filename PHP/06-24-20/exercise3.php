<!DOCTYPE html>
<html>

<body>
    <form action="exercise2.php" method="POST" id="formulaire">
        <fieldset>
            <legend>Adresse client</legend>

            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" value="" /><br />

            <label for="nom">Nom:</label>
            <input type="text" name="nom" value="" /><br />

            <label for="addresse">Addresse:</label>
            <input type="text" name="addresse" value="" /><br />

            <label for="ville">Ville:</label>
            <input type="text" name="ville" value="" /><br />

            <label for="postal">Code postal:</label>
            <input type="text" name="postal" value="" /><br />

            <input type="submit" onclick="validate(); return false;" />
        </fieldset>
    </form>
</body>

<script type="text/javascript">
    function validate() {
        let elements = document.querySelectorAll("#formulaire input[type=text][value='']");
        let cnt = 0;
        for (let i = 0, element; element = elements[i++];) {
            if (element.value === "") {
                cnt++;
            }
        }
        if (cnt > 0) {
            alert("Please make sure to fill all fields and try again.");
            return false;
        } else {
            document.getElementById['formulaire'].submit();
        }
    }
</script>

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