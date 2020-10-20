<?php

if (isset($_POST['clic']) && $_POST['clic'] == 'clicked') {
    $monResultat = array(
        'truc' => 'un truc',
        'machin' => 'un machin'
    );

    sleep(2);

    echo json_encode($monResultat);
}
