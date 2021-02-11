<?php
include 'config.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$date = $_POST['date'];
$region = $_POST['region'];
$adresse = $_POST['adresse'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO patient(nom,prenom,sexe,adresse,telephone,date_naissance,region_origine,email) 
VALUES('$nom','$prenom','$sexe','$adresse','$telephone','$date','$region','$email')";


if (mysqli_query($conn, $sql)) {
    echo "Enregistrement effectuée";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 