<?php
// Cet algorythme est réversible
// il deux facons d'etre verifié
// chiffrage a double sens

$mot = 'ALLO';

//je change chaque caractere en le caractere suivant alphabetiquement
$motCrypte = 'BMMP';

// on l'a mis a lenvers

$motCrypte = 'PMMB';


//dechiffrage

//on l'inverse de nouveau
$motCrypte = 'BMMP';

//je change chaque caractere en le caractere precedent alphabetiquement

$mot = 'allo';


///   PMMB

//============================

// Se prevenir de révéler la logique du chiffrage

// Ingenierie sociale

//============================

// le chiffrage à sens unique

//exemple : le md5 

$motHashe = md5($mot);

echo $motHashe;

echo '<br><br>';

echo md5('coulommiers');

$coulommiersHashe = 'f5020c91645c800685cb50fd5733673d';


$monDico = array(
    'coulommiers' => 'f5020c91645c800685cb50fd5733673d',
    'motdepasse' => 'lmqsjd:lqnezrlmbnmlqsdnmoqds'
);

//============ Complexifier les mots de passe des le début
// === avoir des exigences en terme de complexité des mots de passe



echo md5('coulommiers123LLfdss$$$***£');



echo '<br><br>';

echo md5('coulommiers');
echo '<br><br>';

echo md5('coulommiers');

//=========

//quand un user s'inscrit, il entre (deux fois) le mot de passe dauphin

// --->stocke dans la BDD    non pas 'dauphin' mais le resultat de md5('dauphin')


// a la connection : on récupère le mot de passe tenté, et on le hash
//--> md5(mot de passe tenté)    => on le met dans une variable

//---> requete SQL pour récupérer le mdp hashé ,  basée sur le nom d'utilisateur entré
// sur lequel on se base pour appeller la bonne row dans la table SQL


// on les compare pour accepter ou non le logging in

//===========
//un mot de passe simple et simplement hashe est comparable par le biais d'un dictionnaire
//
$motDePasse = 'dauphin';




$salt =   'rz234kjdsàç';

$dauphinCrypte = md5($motDePasse);

$saltCrypte = md5($salt);

// en base de donnée : 

$motDePasseStocke = $saltCrypte . $dauphinCrypte;
echo '<br><br>';
echo $motDePasseStocke;

//======
//les users qui ont le meme mot de passe, auront la meme string  stockée en BDD

//

$idMichel = 2;
$mdpMichel = 'dauphin';
$idPatricia = 3;
$mdpPatricia = 'dauphin';

//  md5($idMichel).md5($mdpMichel)     !=    md5($idPatricia).md5($mdpPatricia)
//on peut stocker des infos uniques dans la BDD


echo '<br><br>';
echo (md5($idPatricia));

// Comment se proteger en SQL
$_POST["ce qu'un utilisateur a directement entre dans un formulaire"]; //prenom et nom

$prenomAVerifier = $_POST['prenom'];
$nomAVerifier = $_POST['nom'];

// Verification
// on veut verifier que les variables aux lignes 128-129 ne
// contiennent pas de caracteres speciaux et si c'est le cas,
// faire en sorte de les echapper --> les conserver, mais bien indiquer
// a notre logique que ces caracteres ne doivent pas etre interpretes
// comme des insctructions SQL, de type : ' " ` ; {} DELETE INSERT UPDATE FROM etc. 



$prenom = mysqli_real_escape_string($maConnection, $prenomAVerifier);
$nom = mysqli_real_escape_string($maConnection, $nomAVerifier);

$maRequeteToutPrete = "le debut de ma requete SQL" . $prenom . "un autre bout de requete" . $nom . "la fin de ma requete";
mysqli_query($maConnection, $maRequeteToutPrete);
