<?php
require_once './vendor/autoload.php';

//Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('melki.irfa.sendmail@gmail.com')
    ->setPassword('tWOMEk6%9VgP');

//Initialize mailer object
$mailer = new Swift_Mailer($transport);

//Message
if (isset($_GET['destinataire']) && isset($_GET['sujet']) && isset($_GET['message']) && isset($_GET['expediteur']) && isset($_GET['senderName'])) {
    $metaData = array(
        "destinataire" => $_GET['destinataire'],
        "sujet" => $_GET['sujet'],
        "message" => $_GET['message'],
        "fromEmail" => $_GET['expediteur'],
        "fromName" => $_GET['senderName']
    );

    if (!array_search('', $metaData)) {
        var_dump($metaData);
        // Make message object
        $message = (new Swift_Message($metaData['sujet']))
            ->setFrom([$metaData['fromEmail'] => $metaData['fromName']])
            ->addTo($metaData['destinataire'])
            ->setBody($metaData['message']);
        if ($mailer->send($message)) {
            echo "<span class='text-success'>Le mail s'est envoye a " . $metaData['destinataire'] . "</span>";
        } else {
            echo "Le mail a foire";
        }
    } else {
        echo "Missing <span class='text-danger'>" . array_search('', $metaData) . "</span> field.";
    }
} else {

    echo "Please fill in all fields before submitting.";
}

?>

<!-- Cable le formulaire sur les variables en realisant les tests
sur les variables elles memes un a un, 

Verifier et prouver que l'utilisateur n'a pas laisse de champs vides:
    ->html (required)
    ->cote php

et ce jusqu'a que seule la fonction
mail() pose probleme -->

<!-- Les solutions alternatives:

Creez vous une vraie adresse gmail de test 

SwiftMailer
PHPMailer
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <title>Title</title>
</head>

<body>

    <div class="container">
        <div class="col-10">
            <form>
                <div class="form-group">
                    <label for="expediteur">Your email</label>
                    <input type="email" id="expediteur" name="expediteur" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="senderName">Your name</label>
                    <input type="text" name="senderName" id="senderName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="destinataire">Recipient</label>
                    <input type="email" name="destinataire" id="destinataire" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="sujet">Subject</label>
                    <input type="text" name="sujet" id="sujet" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea cols="30" rows="10" id="message" name="message" class="form-control" required></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>