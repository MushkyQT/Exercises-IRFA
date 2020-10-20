<?php

// Collect info from requests to form data model to update model

if ($moviesDisplayMode == "all") {
    $selected = "all";
} elseif ($moviesDisplayMode == "random") {
    $selected = "random";
} elseif ($moviesDisplayMode == "release") {
    $selected = "release";
} else {
    $selected = "none";
}

include('models/mainModel.php');
