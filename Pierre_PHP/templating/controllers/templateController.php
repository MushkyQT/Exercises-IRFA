<?php

// notre logique de generation de HTML en utilisant le template

function genereUnTemplateToutPret($unTemplate, $desDonneesPourLeTemplate)
{
    //Verifie la bonne composition des arguments passes a la methode
    // pour le template lui meme
    if (!file_exists($unTemplate)) {
        return "deso j'ai pas trouve ton template la";
    }
    //pour le tableau
    if (is_array($desDonneesPourLeTemplate)) {
        // Extraire les donnees recues ($desDonneesPourLeTemplate)
        // pareil que $titreCard = $desDonneesPourLeTemplate['titreCard'];
        // etc. etc.
        extract($desDonneesPourLeTemplate);
    } else {
        return "les donnees ne sont pas sous forme de tableau";
    }

    // passer ces donnees au template
    // buffering du template via output buffer
    ob_start();
    include($unTemplate);
    return ob_get_clean();
}
