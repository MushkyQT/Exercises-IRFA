<?php
if (isset($_POST['show']) && !empty($_POST['show'])) {
    include('../auth/credentials.php');
    global $myConnection;
    $selected = $_POST['show'];
    function makeCard($card)
    {
        extract($card);
        return '<div class="card m-2" style="width: 18rem">
    <h5 class="card-header text-center">' . $movieTitle . '</h5>
    <img class="card-img-top" src="' . $movieImg . '" />
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="col-6">
                <h5 class="card-title">' . $movieDirector . '</h5>
            </div>
            <div class="col-6">
                <h5 class="text-muted">' . $movieRelease . '</h5>
            </div>
        </div>
        <p class="card-text">' . $movieSynopsis . '</p>
    </div>
    </div>';
    }

    $cards = "";

    $selectAliases = "SELECT `name` AS `movieTitle`, `director` AS `movieDirector`, `synopsis` AS `movieSynopsis`, `release date` as `movieRelease`, `img` AS `movieImg` ";
    if ($selected == 'all') {
        $myRequest = $selectAliases . "FROM `movies`";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            $movies = array();
            while ($movieRow = mysqli_fetch_array($myResult)) {
                $movies[] = $movieRow;
            }
            foreach ($movies as $card) {
                $cards .= makeCard($card);
            }
            sleep(1);
            echo $cards;
        } else {
            echo "DB request failed.<br>";
        }
    } elseif ($selected == 'random') {
        $myRequest = $selectAliases . "FROM `movies` ORDER BY RAND() LIMIT 1";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            $movies = array();
            $movies[] = mysqli_fetch_array($myResult);
            foreach ($movies as $card) {
                $cards .= makeCard($card);
            }
            usleep(250000);
            echo $cards;
        } else {
            echo "DB request failed.<br>";
        }
    } elseif ($selected == 'release') {
        $myRequest = $selectAliases . "FROM `movies` ORDER BY `release date`";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            $movies = array();
            while ($movieRow = mysqli_fetch_array($myResult)) {
                $movies[] = $movieRow;
            }
            foreach ($movies as $card) {
                $cards .= makeCard($card);
            }
            sleep(1);
            echo $cards;
        } else {
            echo "DB request failed.<br>";
        }
    } elseif ($selected == 'none') {
        $cards = "<h2 class='mt-5'>Please select an option above.</h2>";
    }
}
