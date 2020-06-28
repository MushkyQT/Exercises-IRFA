<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) and $_FILES['monfichier']['error'] == 0) {
    // Testons si le fichier n'est pas trop gros
    if ($_FILES['monfichier']['size'] <= 5000000) {
        // Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['monfichier']['name']);
        $extension_upload = $infosfichier['extension'];
        print_r($infosfichier);
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'txt');
        if (in_array($extension_upload, $extensions_autorisees)) {
            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
            echo "L'envoi a bien été effectué !";
        }
    } else {
        echo ("Upload failed");
    }
}
