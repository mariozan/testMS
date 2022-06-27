<?php

require_once "MoviesController.php";

if(isset($_POST)){
    $movies = new MoviesController();
    $movies->getData($_POST["filter"]);
    header('Location: ../view/movies.php');
}