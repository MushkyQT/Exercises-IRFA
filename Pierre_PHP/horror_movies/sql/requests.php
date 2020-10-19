<?php

include('auth/credentials.php');

function getMovies()
{
    global $myConnection;
    $selected = $_POST['show'];
    if ($selected == 'all') {
        $myRequest = "SELECT `name` AS `movieTitle`, `director` AS `movieDirector`, `synopsis` AS `movieSynopsis`, `release date` as `movieRelease`, `img` AS `movieImg` FROM `movies`";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            $movies = array();
            while ($movieRow = mysqli_fetch_array($myResult)) {
                $movies[] = $movieRow;
            }
            return $movies;
        } else {
            return "DB request failed.<br>";
        }
    } elseif ($selected == 'random') {
        $myRequest = "SELECT `name` AS `movieTitle`, `director` AS `movieDirector`, `synopsis` AS `movieSynopsis`, `release date` as `movieRelease`, `img` AS `movieImg` FROM `movies` ORDER BY RAND() LIMIT 1";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            $movies = array();
            $movies[] = mysqli_fetch_array($myResult);
            return $movies;
        } else {
            return "DB request failed.<br>";
        }
    } elseif ($selected == 'release') {
        $myRequest = "SELECT `name` AS `movieTitle`, `director` AS `movieDirector`, `synopsis` AS `movieSynopsis`, `release date` as `movieRelease`, `img` AS `movieImg` FROM `movies` ORDER BY `release date`";
        if ($myResult = mysqli_query($myConnection, $myRequest)) {
            $movies = array();
            while ($movieRow = mysqli_fetch_array($myResult)) {
                $movies[] = $movieRow;
            }
            return $movies;
        } else {
            return "DB request failed.<br>";
        }
    } else {
        return "Fail, invalid post value for 'show'.";
    }
}
