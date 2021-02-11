<?php
include 'config.php';

$statut = $_POST['statut'];
$login = $_POST['login'];
$password = $_POST['password'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$sexe = $_POST['sexe'];
$email = $_POST['mail'];
$date_naissance = $_POST['date'];
$region = $_POST['region'];
$telephone = $_POST['telephone'];
$specialite = $_POST['specialite'];

$new_password = md5($password);

if ($statut == "Medecin"){

                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "INSERT INTO corps_medical(login_cm,mot_de_passe,nom,prenom,sexe,adresse,telephone,date_naissance,region_origine,email,specialite) 
                VALUES('$login','$new_password','$nom','$prenom','$sexe','$adresse','$telephone','$date_naissance','$region','$email','$specialite')";


                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('COMPTE CRÉE AVEC SUCCÈS')</script>";
                    
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
        ?>

         <!--redirection vers page de connexion -->
         <script>

            window.open("login.html","_self");

        </script>

<?php

}

else if($statut == "Patient"){

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "INSERT INTO patient(login_patient,mot_de_passe,nom,prenom,sexe,adresse,telephone,date_naissance,region_origine,email) 
                VALUES('$login','$new_password','$nom','$prenom','$sexe','$adresse','$telephone','$date_naissance','$region','$email')";


                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('COMPTE CRÉE AVEC SUCCÈS')</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);

                ?>

                <!--redirection vers page de connexion -->
             <script>

             window.open("login.html","_self");

          </script>

          <?php

             }

        ?>