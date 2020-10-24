<div class="w-100" style="background-image: url(<?php print $background_image ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                <h1 class="bg-light">Hi <?php print $name ?></h1>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php print $background_image_additional ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php print $name ?></h5>
                        <span class="card-text"><?php echo $description ?></span>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>