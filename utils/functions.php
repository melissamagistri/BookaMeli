<?php

    //genera una stringa random di lunghezza da 5 a 10 caratteri
    function createSalt(){
        $array = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $salt = '';
        for($i=0;$i<rand(5,10);$i++){
            $salt = $salt.$array[rand(0,count($array)-1)];
        }

        return $salt;

    }

    function isUserLoggedIn(){
        return !empty($_SESSION['idaccount']);
    }

    function registerLoggedUser($user){
        $_SESSION["idaccount"] = $user;
    }

    function checkPassword(){
        if(strlen($_POST["password"]) > 7){
            return true;
        }
        return false;
    }

    function getHomeImages(){
        return array("schermata_op.png","ciao.png");
    }

    function removeExtensions($file){
        $x = substr($file, 0, strrpos($file, '.'));
        return $x;
    }

    function getFileName($file){
        $x = str_replace("_", " ", $file);
        return $x;
    }
?>