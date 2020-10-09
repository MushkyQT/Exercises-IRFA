<?php



$nomDeMonFichier  = $_FILES['fichierEnvoye']['name'];

$leNomTemporaireDuFichier = $_FILES['fichierEnvoye']['tmp_name'];

//methode pour ecrire des données dans un repertoire  -> copier un fichier

//echo $nomDeMonFichier."<br>";
//print_r($_FILES['fichierEnvoye']);



$cheminDeDestination = "";

$destinationFinale = $cheminDeDestination.$nomDeMonFichier;

//methode pour copier des données dans un repertoire  -> copier un fichier

if(move_uploaded_file($leNomTemporaireDuFichier, $destinationFinale)){


    echo "fichier envoyé correctement. Bravo.";
}else{

    echo "fichier PAS envoyé correctement. Déso";
}


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
    <title>Envoi de fichier</title>
</head>

<body>




    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input name="fichierEnvoye" type="file" class="form-control-file" id="exampleFormControlFile1">

            <button type="submit" class="btn btn-primary">Submit</button></div>
    </form>








    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>