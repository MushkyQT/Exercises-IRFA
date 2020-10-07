<?php

$mainArea = '<div class="secret shadow row justify-content-around"><h1 class="col-12 text-center pb-3">For your eyes only, ' . $user . '</h1>';
for ($i = 0; $i < 6; $i++) {
    $mainArea .= '
        <div class="card card-edits col-3 mr-2 mb-3 shadow">
            <img class="card-img-top" src="https://media-assets-02.thedrum.com/cache/images/thedrum-prod/s3-news-tmp-77017-1455894663691.cached--default--1280.jpg">
            <div class="card-body">
                <p class="card-text text-center">Reptilian proof</p>
            </div>
        </div>';
}
$mainArea .= '</div>';
