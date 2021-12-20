<?php
session_start();
define("UPLOAD_DIR", "./upload/");
require_once "database/database.php";
$dbh = new Database("localhost", "root", "", "BookaMeli", 3306);
?>