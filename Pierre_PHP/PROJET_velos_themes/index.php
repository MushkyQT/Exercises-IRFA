<?php

$linkMe = "";
$selectedDark = "";
$selectedLight = "";

if (isset($_GET['theme'])) {
    if ($_GET['theme'] == "light") {
        $selectedLight = "selected";
        $selectedDark  = "";
        $linkeMe = "";
    } elseif ($_GET['theme'] == "dark") {
        $selectedLight = "";
        $selectedDark = "selected";
        $linkMe = "<link rel='stylesheet' href='css/styleDark.css' />";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="css/style.css" />
    <?php echo $linkMe; ?>
    <title>Title</title>
</head>

<body>
    <div class="container-fluid header position-relative">
        <div class="themeBar">
            <form class="form-inline float-right" method="GET">
                <label for="theme" class="pr-2">Theme:</label>
                <select name="theme" class="custom-select" onchange="this.form.submit()">
                    <option <?php echo $selectedLight; ?> value="light">Light</option>
                    <option <?php echo $selectedDark; ?> value="dark">Dark</option>
                </select>
            </form>

        </div>
        <div class="jumboTitle">
            <h1>En selle !</h1>
            <p>Location de tandem 24H/24 et 7j/7 pour vos vacances</p>
            <p>dans nos agences Tandem 2000</p>
        </div>
        <div class="formArea">
            <form>
                <div class="form-row padRow">
                    <div class="col-12 col-md-3 gray">
                        <select class="select">
                            <option value="default" selected disabled>Adresse de Depart</option>
                            <option value="mulhouse">Agence Mulhouse</option>
                            <option value="toulouse">Agence Toulouse</option>
                            <option value="monaco">Agence Monaco</option>
                            <option value="lyon">Agence Lyon</option>
                            <option value="paris">Agence Paris</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-3 gray">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Date de depart">
                            <div class="input-group-append">
                                <i class="fas fa-calendar-alt input-group-text"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 gray">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Date de fin">
                            <div class="input-group-append">
                                <i class="fas fa-calendar-alt input-group-text"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 p-0">
                        <input class="validate" type="submit" value="Valider ma recherche" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container bodyContent">
        <div class="row justify-content-between pt-4 pb-4 pb-md-0">
            <div class="col-6 col-md-2 p-0">
                <h4>7 resultats</h4>
            </div>
            <div class="col-6 col-md-2 text-right p-0">
                <select name="filter">
                    <option value="croissants">Prix croissants</option>
                    <option value="ascendant">Prix ascendant</option>
                </select>
            </div>
        </div>
        <div class="quatreResultats">
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemvert1.png" class="visible" />
                        <img src="img/tandemvert2.png" />
                        <img src="img/tandemvert3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un joli tandem vert</h4>
                        <p>Faites savoir a tout le monde que vous etes ecolo sans avoir a leur parler</p>
                        <p>9€ avec votre carte du Parti - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandembleu1.png" class="visible" />
                        <img src="img/tandembleu2.png" />
                        <img src="img/tandembleu3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem bleu pas trop mal</h4>
                        <p>Le tandem officiel de France 98</p>
                        <p>9345€ signe par Franck Leboeuf - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemblanc1.png" class="visible" />
                        <img src="img/tandemblanc2.png" />
                        <img src="img/tandemblanc3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem tout blanc tout neuf</h4>
                        <p>Habillez vous en jaune pour ressembler a un oeuf au plat!</p>
                        <p>39€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemnoir1.png" class="visible" />
                        <img src="img/tandemnoir2.png" />
                        <img src="img/tandemnoir3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem noir pour les fans de Batman</h4>
                        <p>Combattez le crime en tandem</p>
                        <p>69,234€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
        </div>
        <div class="quatreResultats hidden">
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemvert1.png" class="visible" />
                        <img src="img/tandemvert2.png" />
                        <img src="img/tandemvert3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un joli tandem vert</h4>
                        <p>Faites savoir a tout le monde que vous etes ecolo sans avoir a leur parler</p>
                        <p>9€ avec votre carte du Parti - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandembleu1.png" class="visible" />
                        <img src="img/tandembleu2.png" />
                        <img src="img/tandembleu3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem bleu pas trop mal</h4>
                        <p>Le tandem officiel de France 98</p>
                        <p>9345€ signe par Franck Leboeuf - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemblanc1.png" class="visible" />
                        <img src="img/tandemblanc2.png" />
                        <img src="img/tandemblanc3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem tout blanc tout neuf</h4>
                        <p>Habillez vous en jaune pour ressembler a un oeuf au plat!</p>
                        <p>39€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemnoir1.png" class="visible" />
                        <img src="img/tandemnoir2.png" />
                        <img src="img/tandemnoir3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem noir pour les fans de Batman</h4>
                        <p>Combattez le crime en tandem</p>
                        <p>69,234€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
        </div>
        <div class="quatreResultats hidden">
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemvert1.png" class="visible" />
                        <img src="img/tandemvert2.png" />
                        <img src="img/tandemvert3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un joli tandem vert</h4>
                        <p>Faites savoir a tout le monde que vous etes ecolo sans avoir a leur parler</p>
                        <p>9€ avec votre carte du Parti - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandembleu1.png" class="visible" />
                        <img src="img/tandembleu2.png" />
                        <img src="img/tandembleu3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem bleu pas trop mal</h4>
                        <p>Le tandem officiel de France 98</p>
                        <p>9345€ signe par Franck Leboeuf - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemblanc1.png" class="visible" />
                        <img src="img/tandemblanc2.png" />
                        <img src="img/tandemblanc3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem tout blanc tout neuf</h4>
                        <p>Habillez vous en jaune pour ressembler a un oeuf au plat!</p>
                        <p>39€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemnoir1.png" class="visible" />
                        <img src="img/tandemnoir2.png" />
                        <img src="img/tandemnoir3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem noir pour les fans de Batman</h4>
                        <p>Combattez le crime en tandem</p>
                        <p>69,234€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
        </div>
        <div class="quatreResultats hidden">
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemvert1.png" class="visible" />
                        <img src="img/tandemvert2.png" />
                        <img src="img/tandemvert3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un joli tandem vert</h4>
                        <p>Faites savoir a tout le monde que vous etes ecolo sans avoir a leur parler</p>
                        <p>9€ avec votre carte du Parti - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandembleu1.png" class="visible" />
                        <img src="img/tandembleu2.png" />
                        <img src="img/tandembleu3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem bleu pas trop mal</h4>
                        <p>Le tandem officiel de France 98</p>
                        <p>9345€ signe par Franck Leboeuf - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemblanc1.png" class="visible" />
                        <img src="img/tandemblanc2.png" />
                        <img src="img/tandemblanc3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem tout blanc tout neuf</h4>
                        <p>Habillez vous en jaune pour ressembler a un oeuf au plat!</p>
                        <p>39€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
            <div class="row resultat py-md-5 justify-content-center justify-content-md-start">
                <div class="slider col-8 col-md-4">
                    <img src="img/arrow-left.png" class="left" />
                    <img src="img/arrow-right.png" class="right" />
                    <div class="images">
                        <img src="img/tandemnoir1.png" class="visible" />
                        <img src="img/tandemnoir2.png" />
                        <img src="img/tandemnoir3.png" />
                    </div>
                </div>
                <div class="contenuArticle col pl-5 text-center text-md-left">
                    <div class="d-none d-md-block">
                        <h4>Un tandem noir pour les fans de Batman</h4>
                        <p>Combattez le crime en tandem</p>
                        <p>69,234€ - Agence de Paris</p>
                    </div>
                    <button class="btn btn-success">Reserver et Payer</button>
                </div>
            </div>
            <hr class="m-0 my-md-2" />
        </div>
        <div class="footer d-flex flex-column flex-md-row justify-content-md-center">
            <div class="text-center text-md-left">
                <img src="img/agence.png" />
            </div>

            <div>
                <p class="text-center text-md-left">Notre agence de Paris</p>
                <p class="text-center text-md-left">30 rue des Vignoles, 75020, Paris</p>
                <p class="text-center text-md-left">Ouvert 7j/7 de 09h a 13h et de 14h a 20h</p>
                <p class="text-center text-md-left">01 49 72 41 32</p>
                <p class="text-center text-md-left">contact@tandem2000.com</p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>