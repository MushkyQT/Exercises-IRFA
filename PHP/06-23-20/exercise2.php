<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form action="exercise2.php" method="POST">
            <fieldset>
                <legend>Infos</legend>
                Nom: <input type="text" name="name"/><br />
                Debutant: <input type="radio" name="level" value="Debutant" />
                Initie: <input type="radio" name="level" value="Initie" /><br />
                <input type="reset" value="Effacer" />
                <input type="submit" value="Envoyer" />
            </fieldset>
        </form>
    </body>
</html>

<?php 
if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['level'])) {
        echo ("<h3>Bonjour {$_POST['name']} vous etes {$_POST['level']} en PHP</h3>");
    }
}
?>