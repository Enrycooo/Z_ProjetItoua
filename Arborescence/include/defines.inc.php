<?php 


// define database tables names
define('DB_TABLE_CLIENT', 'client');
define('DB_TABLE_CONNEXION', 'connexion');

//define paths
define('DB_CLASS_DIR', 'class/');


// get main classes
include_once DB_CLASS_DIR.'Client.class.inc.php';
include_once DB_CLASS_DIR.'Connexion.class.inc.php';

// get main objects
$oCavalier = new client();
$oCheval = new connexion();
try {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "centre_equestre";

    // connect to DB
    $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
}
catch (PDOException $e) {
    //throw $th;
}
?>