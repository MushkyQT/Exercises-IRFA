<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Projet Template</title>
</head>

<body>
    <!-- IGNORE NAVBAR -->
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Projet Template</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!-- END IGNORE NAVBAR -->

    <div class="row justify-content-center">
        <?php
        // Mes donnees de test
        $mesDonneesDeTest = array(
            array(
                'titreCard' => 'un premier titre',
                'texteCard' => 'un premier bout de texte'
            ),
            array(
                'titreCard' => 'un deuxieme titre',
                'texteCard' => 'un deuxieme bout de texte'
            ),
            array(
                'titreCard' => 'un troisieme titre',
                'texteCard' => 'un troisieme bout de texte'
            )
        );

        $unTemplateDeTest = 'template/cardTemplate.php';

        //Faire en sorte qu'index.php puisse avoir acces (connaisse)
        // a la fonction genereUnTemplateToutPret
        include('controllers/templateController.php');

        // Notre appel de template
        foreach ($mesDonneesDeTest as $carte) {
            print genereUnTemplateToutPret($unTemplateDeTest, $carte);
        }
        ?>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>