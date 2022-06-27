<?php

require_once "UserController.php";
require_once "../model/User.php";

    if(isset($_POST)){

    $errors = array();
    $user = new UsersController();

    if (isset($_POST["email"])) {
        $isValid = $user->validateEmail($_POST["email"]);
        if (!$isValid) {
           $errors["email"] = "email";            
        }
    }
    if (isset($_POST["phone"])) {
        $isValid = $user->validatePhone($_POST["phone"]);
        if (!$isValid) {
            $errors["phone"] = "phone";            
        }
    }
    if (isset($_POST["username"])) {
        $isValid = $user->validateUserName($_POST["username"]);
        if (!$isValid) {
            $errors["username"] = "username";

        }
    }
    if (isset($_POST["password"])) {
        $isValid = $user->validatePassword($_POST["password"]);
        if (!$isValid) {
            $errors["password"] = "password";
        }
    }

    if(count($errors) == 0){
        $newUser = new StdClass();
        $newUser->username = $_POST["username"];
        $newUser->email = $_POST["email"];
        $newUser->phone = $_POST["phone"];
        $newUser->password = MD5($_POST["password"]);
        $user->store($newUser);
        header('Location: ../view/login.php');
    }else{
        $query = http_build_query($errors);
        $url = "../view/users.php?" . $query;
        header("Location: " . $url);
    }


}