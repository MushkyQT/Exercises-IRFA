<div class="card m-2" style="width: 18rem">
    <h5 class="card-header text-center"><?php echo $movieTitle ?></h5>
    <img class="card-img-top" src="<?php echo $movieImg ?>" />
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="col-6">
                <h5 class="card-title"><?php echo $movieDirector ?></h5>
            </div>
            <div class="col-6">
                <h5 class="text-muted"><?php echo $movieRelease ?></h5>
            </div>
        </div>
        <p class="card-text"><?php echo $movieSynopsis ?></p>
    </div>
</div>