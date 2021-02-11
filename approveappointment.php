<?php
require('config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }


 $id = $_GET['id'];

 $sql = "UPDATE rendez_vous SET statut='2' WHERE pk_rendez_vous = '$id'";
 $result = mysqli_query($conn, $sql);
 if ($result) {
    header("Location: corps_medical.php");        
}  

?>
