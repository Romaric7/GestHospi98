<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GestOuaga - Connexion</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="icon" href="img/img.png"/>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<?php
require('config.php');
session_start();

if (isset($_REQUEST['statut']) && ($_REQUEST['statut'] == 'Médecin')){

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

    $new_password = md5($password);

    $query = "SELECT * FROM corps_medical WHERE statut='1' AND (login_cm='$username'OR email='$username') AND mot_de_passe ='$new_password'";
	$result = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($result);
    $rows2 = mysqli_fetch_assoc($result);
        $pk_medecin = $rows2["pk_corps_medical"];
        $nom_medecin = $rows2["nom"];
        $prenom_medecin = $rows2["prenom"];
        $sexe_medecin = $rows2["sexe"];
        $telephone_medecin = $rows2["telephone"];
        $region_medecin = $rows2["region"];
        $email_medecin = $rows2["email"];
        $specialite_medecin = $rows2["specialite"];
        $date_register_medecin = $rows2["date_inscription"];
    //echo $rows;
	if($rows > 0){
        $_SESSION['username'] = $username;
        $_SESSION['pk_medecin'] = $pk_medecin;
            $_SESSION['nom_medecin'] = $nom_medecin;
            $_SESSION['prenom_medecin'] = $prenom_medecin;
            $_SESSION['sexe_medecin'] = $sexe_medecin;
            $_SESSION['telephone_medecin'] = $telephone_medecin;
            $_SESSION['region_medecin'] = $region_medecin;
            $_SESSION['email_medecin'] = $email_medecin;
            $_SESSION['specialite_medecin'] = $specialite_medecin;
            $_SESSION['date_register_medecin'] = $date_register_medecin;
        
	    header("Location: corps_medical.php");
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}

 else if (isset($_REQUEST['statut']) && ($_REQUEST['statut'] == 'Patient')){

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $new_password = md5($password);

        $query = "SELECT * FROM patient WHERE (login_patient ='$username' OR email='$username') AND mot_de_passe ='$new_password'";
        $result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $rows2 = mysqli_fetch_assoc($result);
        $pk_patient = $rows2["pk_patient"];
        $nom_patient = $rows2["nom"];
        $prenom_patient = $rows2["prenom"];
        $sexe_patient = $rows2["sexe"];
        $telephone_patient = $rows2["telephone"];
        $region_patient = $rows2["region"];
        $email_patient = $rows2["email"];
        $date_register_patient = $rows2["date_inscription"];
        
        //echo $rows;
        if($rows>0){
            $_SESSION['username'] = $username;
            $_SESSION['pk_patient'] = $pk_patient;
            $_SESSION['nom_patient'] = $nom_patient;
            $_SESSION['prenom_patient'] = $prenom_patient;
            $_SESSION['sexe_patient'] = $sexe_patient;
            $_SESSION['telephone_patient'] = $telephone_patient;
            $_SESSION['region_patient'] = $region_patient;
            $_SESSION['email_patient'] = $email_patient;
            $_SESSION['date_register_patient'] = $date_register_patient;
            header("Location: patient.php");
        }else{
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }

      
    }

    else if (isset($_REQUEST['statut']) && ($_REQUEST['statut'] == 'Médecin responsable')){

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
    
            $query = "SELECT * FROM medecin_responsable WHERE login_med ='$username' AND mot_de_passe ='$password'";
            $result = mysqli_query($conn,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            //echo $rows;
            if($rows>0){
                $_SESSION['username'] = $username;
                header("Location: responsable.php");
            }else{
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }

?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block">
                                <img src="img/img.png" style="width: 320px; margin-top: 50px; margin-left: 60px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4" style="font-size: 20px;">GESTOUAGA</h1>
                                    </div>
                                    <form action ="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off" class="user" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                  
                                    <div class="form-group">
                                            
                                            <select class="form-control" name="statut" title="Statut" style="border-radius: 20px; height: 45px; cursor:pointer;" required>
                                                  <option value="Médecin responsable">Administrateur</option>
                                                  <option value="Médecin">Médecin</option>    
                                                  <option value="Patient">Patient</option>                       
                                            </select>
                                          </div>                                  
                             
                                    <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Nom d'utilisateur" style="font-size: 15px">
 
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Mot de passe" style="font-size: 15px;">
                                               
                                        </div>
                                                                          
                                        
                                        <input type="submit" value="Se connecter " class="btn btn-primary btn-user btn-block" style="font-size: 18px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                        
                                   
                                    <?php if (! empty($message)) { ?>
                                        <br><p class="errorMessage" style="color:red"><?php echo $message; ?></p>
                                    <?php } ?>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php" style="font-size: 18px;">Vous êtes un nouveau patient, Créer votre compte ici!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>