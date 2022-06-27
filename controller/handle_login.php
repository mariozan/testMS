<?php

require_once "UserController.php";
require_once "../model/User.php";

if(isset($_POST)){
    $users = new UsersController();
    $login = $users->login($_POST["username"], MD5($_POST["password"]));
    if($login > 0){
        session_start();
        $_SESSION["logged"] = true;
        header('Location: ../view/movies.php');
    }else{
        header('Location: ../view/login.php');
    }
}