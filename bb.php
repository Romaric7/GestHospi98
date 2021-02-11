<?php

include("config.php");
$con=new mysqli("localhost","root","","gesthospi");

$specialite = $_GET['specialite'];
$query = "SELECT nom FROM corps_medical WHERE specialite= '$specialite'";
$result = mysqli_query($con,$query);
while($respon=mysqli_fetch_assoc($result)){
    $a[]=$respon;
}
echo json_encode($a);

?>