<?php






// Test de connection à la DB

$hote =  'localhost' ;

$base = 'maBase';

$utilisateur = 'bibi'  ;

$pass = 'coucou';

$maConnection = mysqli_connect($hote, $utilisateur, $pass, $base);


if(  mysqli_connect_error()   ){

    
    die('Probleme de connection <br>');


}else{
 
    echo 'bien connecté <br>';

}

$monTableauBootstrap = "";
$monSelectAnimaux = "";


$maRequetePourTout = "SELECT * FROM maTable";

        



        function afficheTableau($unTableau){

            $prenom = $unTableau['nom'];
            $animal = $unTableau['animal'];
            $valueDuBoutonSupprimer = $unTableau['id'];
            $boutonsSupprimerEtModifier = "<td>
            <button class='btn btn-warning boutonModifier' >Modifier</button>
            <form action='' method='post'>
                 <button type='submit'  value='".$valueDuBoutonSupprimer."' name='boutonSupprimer' class='btn btn-danger'>Supprimer</button>
            </form>
        </td>
        ";

            $RowBootstrap = "<tr><td>".$prenom."</td><td>".$animal."</td>".$boutonsSupprimerEtModifier."</tr>";    

            global $monTableauBootstrap;

            $monTableauBootstrap.=$RowBootstrap;


        }

        function afficheLeSelectAnimal($unTableau){

            $animal = $unTableau['animal'];


            $optionPourLeSelect = "<option value='".$animal."'>".$animal."</option>"; 
            global $monSelectAnimaux;

            if(  strpos( $monSelectAnimaux , $optionPourLeSelect) === false   ){

                $monSelectAnimaux.=$optionPourLeSelect;
            }
            
            

        }




        function creeMaRequeteAnimaux($animal){


            $maRequeteAnimalPrefere = "SELECT * FROM maTable WHERE animal = '".$animal."'";

            return $maRequeteAnimalPrefere;

        }




if( isset($_POST['boutonSupprimer'])){

    $idASupprimer = $_POST['boutonSupprimer'];

    $maRequeteDeSuppression = "DELETE FROM `maTable` WHERE `maTable`.`id` = ".$idASupprimer;
    //echo $maRequeteDeSuppression.'<br>';

    if( $reponseRequete =  mysqli_query($maConnection, $maRequeteDeSuppression)){

        echo 'requete suppression OK';

    

            }else{

                echo 'Requete suppression foirée';
            }






    
}


if(isset($_POST['prenomAModifier']) && isset($_POST['animalAModifier']) && isset($_POST['idAModifier'])){

    $prenomAModifier = $_POST['prenomAModifier'];
    $animalAModifier = $_POST['animalAModifier'];
    $idAModifier =  $_POST['idAModifier'];

$maRequeteModificationDeDonnees = "UPDATE `maTable` SET `nom` = '".$prenomAModifier."', `animal` = '".$animalAModifier."' WHERE `maTable`.`id` =".$idAModifier;

                if( $reponseRequete =  mysqli_query($maConnection, $maRequeteModificationDeDonnees)){

                    echo 'requete modif Entrée OK';

                

                        }else{

                            echo 'Requete modif Entrée foirée';
                        }


}






if( isset($_POST['nouveauPrenom'])   &&   ( isset($_POST['nouvelAnimal']) ||  isset($_POST['animal'])      )  ){

        $nouveauPrenom = $_POST['nouveauPrenom'];

        if(isset($_POST['nouvelAnimal'])){

            $nouvelAnimal = $_POST['nouvelAnimal'];
        }elseif(isset($_POST['animal']) && isset($_POST['ajouterAnimalExistant'])){

            $nouvelAnimal = $_POST['animal'];
        }

        


    if(       $nouveauPrenom != ""    &&  $nouvelAnimal != ""                   ){
               

                $maRequeteAjoutDeDonnees = "INSERT INTO `maTable`(`nom`,`animal`) VALUES ('".$nouveauPrenom."','".$nouvelAnimal."')";

                if( $reponseRequete =  mysqli_query($maConnection, $maRequeteAjoutDeDonnees)){

                    echo 'requete Nouvelle Entrée OK';

                

                        }else{

                            echo 'Requete Nouvelle Entrée foirée';
                        }

    }else{

        echo 'Déso, les deux champs sont obligatoires pour ajouter une entrée au tableau';
    }




   }




        if( isset($_POST['animal']) && isset($_POST['boutonAnimal'])   )
            {
                $animalDemande = $_POST['animal'];
                //$monTableauBootstrap = "";
                
                $maRequeteAnimalPrefere = creeMaRequeteAnimaux($animalDemande);
                
                if( $reponseRequete =  mysqli_query($maConnection, $maRequeteAnimalPrefere)){

                    echo 'requete OK';
                    
                    while( $maRow = mysqli_fetch_array($reponseRequete)) {
                
                        // afficheTableau($maRow);

                        
                        afficheTableau($maRow);
                       
                    }
               
                }else{
                
                    echo 'Requete foirée';
                }

            }else{

                if( $reponseRequete =  mysqli_query($maConnection, $maRequetePourTout)){

                    echo 'requete OK';
        
                    while( $maRow = mysqli_fetch_array($reponseRequete)) {
        
                         afficheTableau($maRow);
                       
                    }
        
        
        
        
                }else{
        
                    echo 'Requete foirée';
                }
            }

//requete qui affiche la liste des animaux dans le select




//$maRequetePourLesAnimaux = "SELECT DISTINCT animal FROM maTable";
$maRequetePourLesAnimaux = "SELECT animal FROM maTable";

if( $reponseRequete =  mysqli_query($maConnection, $maRequetePourLesAnimaux)){

    echo 'requete OK';

    while( $maRow = mysqli_fetch_array($reponseRequete)) {

        // afficheTableau($maRow);
        afficheLeSelectAnimal($maRow);
       
    }




}else{

    echo 'Requete foirée';
}



//1.faire un vrai formulaire de création de personne et animal préféré
//placé au bon endroit dans le code de telle manière que le submit recharge la page et affiche la nouvelle donnée avec les autres


//2. faire un second formulaire  de création de personne et animal préféré mais cette fois, pour lequel on choisit parmi les animaux
//déja existants uniquement, par le biais d'un select  (ou radio ou checkboxs)




//3. On ajoute une troisième colonne au tableau BOOTSTRAP - Du coté du HTML, et pas de la table SQL
// Cette colonne contient un bouton supprimer -> supprime l'entrée en question du tableau
//pour cela l'information unique à chaque bouton supprimer soit basée sur l'ID de la personne en question (l'entrée de la table)





//4. On se lance dans la création d'une application de liste de courses










?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link rel="stylesheet" href="style.css">
<title>BDD</title>
</head>
<body>


<h2>notre tableau de requetes SQL</h2>


<table class="table table-dark table-striped">

<thead>
    <th>Prenom</th>
    <th>Animal Préféré</th>
    <th>Actions</th>
</thead>

<tbody>


<?php echo $monTableauBootstrap ?>



</tbody>







</table>

<form action="" method="post">

<label for="animal">Afficher au tableau les personnes dont l'animal préféré est :</label>

<select name="animal" id="">

        <?php echo $monSelectAnimaux ?>




</select>

<input class="btn btn-primary" type="submit" name = "boutonAnimal" value="Go !">



</form>
<form method="POST">

<input class="btn btn-primary" type="submit" name = "reinitialiser" value="Afficher TOUT !">



</form>

<form action="" method="post">
<label for="nouveauPrenom">Prenom</label>
        <input type="text" name="nouveauPrenom" placeholder="Entrez un prenom" id="" required>
<label for="nouvelAnimal">Animal</label>
        <input type="text" name="nouvelAnimal" placeholder="Votre animal préféré" id="" required>





<input class="btn btn-primary" type="submit" name = "ajouterGhislain" value="Ajouter une nouvelle entrée au tableau">
</form>


<form action="" method="post">
<label for="nouveauPrenom">Prenom</label>
        <input type="text" name="nouveauPrenom" placeholder="Entrez un prenom" id="" required>


<label for="nouvelAnimal">Animal</label>
<select name="animal" id="">

<?php echo $monSelectAnimaux ?>




</select>



<input class="btn btn-primary" type="submit" name = "ajouterAnimalExistant" value="Ajouter une nouvelle entrée au tableau avec un animal existant">
</form>

<br>
<br>
<br>
<br>
<br>

<?php 


if( isset($_POST['test1']) && isset($_POST['test2'])               ){

        echo $_POST['test1'];
        echo '<br>';
        echo $_POST['test2'];



}





?>




<table class="table table-dark table-striped">

<thead>
    <th>Prenom</th>
    <th>Animal Préféré</th>
    <th>Actions</th>
</thead>

<tbody>

<tr>
    <td>coucou</td>
    <td>coucou</td>
    <td><button class="btn btn-success">Enregistrer la modification</button><form action='' method='post'><button class="btn btn-danger">Supprimer</button></form></td>
</tr>
<tr>
    <form action=' method='post'>
    <td><input type='text' name='test1' id='></td>
    <td><input type='text' name='test2' id='></td>

    <td>
    <button type='submit' class='btn btn-success'>Confirmer</button>
        
        
        </form>
        <form action='' method='post'>
            
        </form>
    </td>



</tr>

<table class="table table-dark table-striped">
    <thead>
        <th>coucou</th>
        <th>coucou</th>
        <th>coucou</th>
    </thead>

    <tr>
        <td>salut</td>
        <td>salut</td>
        <td>salut</td>
    </tr>

    <tr class="monTR">
    
    </tr>

</table>



</tbody>
</table>
<br>
<br>
<br>
<br>
<br>

<div class="maDiv"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>

$('.boutonModifier').click(function(){

    
    var idAModifier = $(this).next().children().first().val();
    var prenomAModifier = $(this).parent().parent().children().first().html();
    var animalAModifier = $(this).parent().parent().children().first().next().html();
    var formSupprimerARecuperer = $(this).next().html();







    var aMettreDansMaDiv = "<form id='form"+idAModifier+"' name='id' value='"+idAModifier+"' method='post'></form><td><input value='"+prenomAModifier+"' type='text' name='prenomAModifier' form='form"+idAModifier+"'></td><td><input value='"+animalAModifier+"' type='text' name='animalAModifier' form='form"+idAModifier+"'><button type='submit' value='"+idAModifier+"' form='form"+idAModifier+"' name='idAModifier' class='btn btn-success'>Confirmer</button></td><td><form action='' method='post'>" +formSupprimerARecuperer+ "</form></td>";






    $(this).parent().parent().html(aMettreDansMaDiv);

 






});







</script>



</body>
</html>