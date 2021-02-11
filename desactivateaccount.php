<?php
require('config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

$id = $_GET['id'];
    
$sql2 = "SELECT * FROM corps_medical WHERE pk_corps_medical='$id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

 $sql = "UPDATE corps_medical SET statut='0' WHERE pk_corps_medical = '$id'";
 $result = mysqli_query($conn, $sql);
 if ($result) {
    header("Location: Aviewmedical.php");        
}  


?>
