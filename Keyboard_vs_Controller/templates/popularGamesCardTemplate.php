<div class="col-4">
    <div class="card">
        <img class="card-img-top" src="<?php print $background_image ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?php print $name ?></h5>
            <p class="card-text"><?php print $genres[0]["name"] ?></p>
            <a href="<?php print "?game=" . $slug ?>" class="btn btn-primary">Go</a>
        </div>
    </div>
</div>