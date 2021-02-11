<?php
require('config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

$id = $_GET['id'];
    
$sql2 = "SELECT * FROM rendez_vous WHERE pk_rendez_vous='$id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$date_rdv=$rows2["date_rendez_vous"];
$heure_rdv=$rows2["heure_rendez_vous"];


 $sql = "UPDATE rendez_vous SET statut='3' WHERE pk_rendez_vous = '$id'";
 $result = mysqli_query($conn, $sql);
 if ($result) {
    header("Location: corps_medical.php");        
}  





?>
