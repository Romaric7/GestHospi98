<?php
// Informations d'identification
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gesthospi";

 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect($servername, $username, $password, $dbname);
 
// V�rifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

