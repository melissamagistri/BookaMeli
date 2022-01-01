<?php

    //genera una stringa random di lunghezza da 5 a 10 caratteri
    function createSalt(){
        $array = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $salt = '';
        for($i=0;$i<rand(5,10);$i++){
            $salt= $salt.$array[rand(0,count($array)-1)];
        }

        return $salt;

    }

    function isUserLoggedIn(){
        return !empty($_SESSION['idaccount']);
    }

    function registerLoggedUser($user){
        $_SESSION["idaccount"] = $user["idaccount"];
    }
?>