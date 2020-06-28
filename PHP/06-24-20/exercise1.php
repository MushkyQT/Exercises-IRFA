<!DOCTYPE html>
<html>

<body>
    <form action="exercise1.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Your name" /><br />

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Mr" />Mr
        <input type="radio" name="gender" value="Mrs" />Mrs

        <br /><input type="submit" />
    </form>
</body>

</html>

<?php
if (!empty($_POST)) {
    if ($_POST['gender'] == "Mr") {
        echo ("Hello {$_POST['gender']} {$_POST['name']}.");
    }
}
?>