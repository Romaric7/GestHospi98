<?php    
require('config.php');

$conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

 $id = $_GET['id'];

 //requête de récupération de la date et de l'heure du rendez_vous qui doit être approuver
 $sql2="SELECT * FROM rendez_vous WHERE pk_rendez_vous = '$id'";
 $result2 = mysqli_query($conn,$sql2);
 $row2 = mysqli_fetch_assoc($result2);
 $date_rdv = $row2["date_rendez_vous"];
 $heure_rdv = $row2["heure_rendez_vous"];

 if (strtotime( $date_rdv) > strtotime(date("Y-m-d"))) {
    $query = "UPDATE rendez_vous SET statut='2' WHERE pk_rendez_vous = '$id'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        header("Location: Mviewrejectappointment.php");      
    }
}

else if (strtotime( $date_rdv) < strtotime(date("Y-m-d"))) {
    header("Location: Mviewrejectappointment.php");      
    }


    else if (strtotime( $date_rdv) == strtotime(date("Y-m-d"))) {
        if (strtotime($heure_rdv)>=strtotime(date("H:i:s"))) {
            $query = "UPDATE rendez_vous SET statut='2' WHERE pk_rendez_vous = '$id'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                header("Location: Mviewrejectappointment.php");     
            }  
        }
        else {
            header("Location: Mviewrejectappointment.php"); 
        }
       
    }
                                          
 /*$sql = "UPDATE rendez_vous SET statut='2' WHERE pk_rendez_vous = '$id'";
 $result = mysqli_query($conn, $sql);
 if ($result) {
    header("Location: corps_medical.php");        
}  */
 
?>

