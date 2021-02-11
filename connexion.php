<?php
include 'config.php';

$statut = $_POST['statut'];
$login = $_POST['login'];
$password = $_POST['password'];

$new_password = md5($password);

if ($statut == "Medecin"){

                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql =  "SELECT * FROM corps_medical WHERE login_cm = '$login' AND mot_de_passe = '$new_password'";

                if (mysqli_query($conn, $sql)) { 

                    header('Location: corps_medical.html');                 
                    
                } else { ?>

                    <script>alert("Echec de connexion, nom d'utilisateur ou mot de passe incorrect")</script>

                    <?php
                }

                mysqli_close($conn);

}

else if($statut == "Patient"){

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql =  "SELECT * FROM patient WHERE login_patient = '$login' AND mot_de_passe = '$new_password'";

    if (mysqli_query($conn, $sql)) { 

        header('Location: corps_medical.html'); 
        
    } else { ?>

        <script>alert("Echec de connexion, nom d'utilisateur ou mot de passe incorrect")</script>

        <?php
    }

    mysqli_close($conn);
}

?>