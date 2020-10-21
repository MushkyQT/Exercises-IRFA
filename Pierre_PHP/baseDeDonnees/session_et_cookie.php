<?php
//==================COOKIES============================
$_COOKIE['prenom'] = 'michel';
// Pour creer un cookie, on a besoin de donner un index, et une valeur associee a cet index
setcookie('prenom', 'michel');
// On doit ajouter un parametre temporel (date)
// Le 23 octobre, le cookie est considere comme expire PAR LE SERVEUR
setcookie('prenom', 'michel', 'le 23 octobre');
// Ces infos sont stockes chez le visiteur, dans son navigateur
// pour etre verifiees par le serveur
// le serveur verifie si la date n'est pas expiree --> en la comparant a la version
// du cookie qu'il aura enregistree dans sa propre bdd

// le cookie reste stocke, meme expire, chez le visiteur, jusqu'a que ce dernier vienne physiquement le supprimer

// le 23 octobre, c'est dans deux jours
// time() + deux jours
// time() + 86400 * 2; 1 jour * 2
setcookie('prenom', 'michel', time() + 86400 * 2);

// L'utilisateur se logout
// on re-configure le cookie avec une date expiree
setcookie('prenom', 'michel', time() - 20); // time() minus anything means expired cookie
// plutot que de le un-set directement, ce qui est beaucoup plus complique pour le serveur
unset_cookie('prenom', 'michel');

$_COOKIE['jesuismichel - macouleur prefere'] = 'bleu';

// pour verifier que l'utilisateur est bien michel, lorsqu'il revient faire un tour sur notre application
if (isset($_COOKIE['prenom']) && $_COOKIE['prenom'] != '') {
    echo "bon ok, c'est bien toi " . $_COOKIE['prenom'];
}

// maintenant, il faut faire en sorte, legalement, de demander la permission a un utilisateur pour creer
// un cookie ou non




//==================SESSIONS============================

//session_start();
// Pour l'ip de michel
//$_SESSION['couleur'] = 'bleu';

//$_SESSION['prenom'] = 'michel';

//$maCouleur = $_SESSION['couleur'];

if (isset($_POST['animal'])) {
    $maVariable = "<br><br>" . $_POST['animal'];

    $_SESSION['animalStocke'] = $maVariable;
}

$animalAAfficher = $_SESSION['animalStocke'];

echo "<br><br>" . $animalAAfficher;
//echo $maVariable;

?>

<form action="" method="post">
    <input type="submit" name="animal" value="ecureuil">
</form>