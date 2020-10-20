<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-6 d-flex justify-content-center">
                <form method="post">
                    <button type="submit" class="ajaxBtn btn btn-primary" name="show" value="all">Show all movies</button>
                </form>
            </div>
            <div class="col-6 d-flex justify-content-center">
                <form method="post">
                    <button type="submit" class="ajaxBtn btn btn-primary" name="show" value="random">Show random movie</button>
                </form>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <form method="post">
                    <button type="submit" class="ajaxBtn btn btn-primary" name="show" value="release">Sort by release date</button>
                </form>
            </div>
        </div>

        <div class="ajaxRow row justify-content-center p-5"></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>