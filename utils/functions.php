<?php
    function isUserLoggedIn(){
        return !empty($_SESSION['idaccount']);
    }

    function registerLoggedUser($user){
        $_SESSION["idaccount"] = $user["idaccount"];
    }
?>