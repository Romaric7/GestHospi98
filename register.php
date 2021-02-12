<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GestOuaga - Création de compte</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="icon" href="img/img.png"/>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/autocomplete.css">

    <link rel="stylesheet" href="css/sb-admin-2.css">

</head>

<body class="bg-gradient-primary">

<?php

require('config.php');
$err='';

 if (isset($_REQUEST['statut']) && ($_REQUEST['statut']== 'Patient')){

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

          //Récupération des valeurs du formulaire
          $username = $_REQUEST['username'];
          
          $password = $_REQUEST['password'];
                 
          $nom = $_REQUEST['nom'];

          $prenom = $_REQUEST['prenom'];
  
          $adresse = $_REQUEST['adresse'];
 
          $sexe = $_REQUEST['sexe'];

          $email = $_REQUEST['email'];

          $date_naissance = $_REQUEST['date'];
          
          $region = $_REQUEST['region'];

          $telephone = $_REQUEST['telephone'];

          $nbre_char_telephone = strlen($telephone);

          date_default_timezone_set('Europe/Paris');

          $date_inscription = date("Y-m-d H:i:s");
         
          $new_password = md5($password);

          /*if ( $nbre_char_telephone > 9) {
            $err="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Numéro de téléphone non valide</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";  }*/

          if (strtotime($date_naissance) > strtotime(date("Y-m-d"))) {
            $err="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Verifiez votre date de naissance</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";  }

          elseif (strtotime( $date_naissance) <= strtotime(date("Y-m-d")) AND $nbre_char_telephone == 9 ) {
                $query = "INSERT INTO patient(login_patient,mot_de_passe,nom,prenom,sexe,adresse,telephone,date_naissance,region_origine,email,date_inscription)
                  VALUES ('$username', '$new_password','$nom','$prenom','$sexe','$adresse','$telephone','$date_naissance','$region','$email','$date_inscription')";
                  $res = mysqli_query($conn, $query);
                if ($res) {
                    $err="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Votre compte a été enregistré!!!</strong>
                    <a href='index.php'><strong>Cliquez ici pour vous connecter</strong></a>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";        
                
            }
        }

        else{
            $err="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Erreur lors de l'enregistrement de votre compte, Numéro de téléphone non valide!!!</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";      
          }
          
        //header("Location: index.php");
    
    }
?>

    <div class="container">
        
    <p><?php echo $err;?></p>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="img/img.png" style="width: 350px; margin-top: 200px; margin-left: 40px;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" style="font-size: 30px;">Création de compte</h1>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="user" autocomplete="off" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size: 18px;">                   
                        
                                <div style="margin-left: 60px;">
                            
                                        
                                     <input type="radio" name="statut" value="Patient" id="patient" style="display:none" checked>
                                    
                                   
                                </div><br>

                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Nom d'utilisateur" required>            
                                    </div> 

                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Mot de passe" required>
                                          
                                    </div>
                                </div>
                                    
                                
                                <div class="form-group row">
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nom" placeholder="Nom" required>
                                    </div>
                                 
                                </div>

                             <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-user" name="prenom"  placeholder="Prénom" required>
                                        
                                </div>
                            </div>

                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control form-control-user" name="adresse"  placeholder="Adresse" required>
                                          
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                      
                                        <select class="form-control" name="sexe" style="border-radius: 20px; height: 45px;" required>
                                            <option value="Masculin">Masculin</option>
                                            <option value="Féminin">Féminin</option>                         
                                          </select>
                                    </div>
                    
                                </div>

                                <div class="form-group row" >
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-user" name="email" placeholder="Adresse Mail" required>
                                            
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10 mb-3 mb-sm-0">
                                    <select class="form-control" name="region" style="border-radius: 20px; height: 45px;" title="Votre région d'origine" required>
                                            <option value="Centre">Centre</option>
                                            <option value="Littoral">Littoral</option>  
                                            <option value="Sud">Sud</option>   
                                            <option value="Est">Est</option>   
                                            <option value="Ouest">Ouest</option>   
                                            <option value=">Nord-Ouest">Nord-ouest</option>   
                                            <option value="Adamaoua">Adamaoua</option> 
                                            <option value="Adamaoua">Nord</option>  
                                            <option value="Extrême-nord">Extrême-nord</option>                         
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="telephone" placeholder="Numéro de téléphone" required>
                                        
                                    </div>  
                                
                                </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user" name="date" title="Votre date de naissance ici" required>                                
                                </div>
                            </div>

                            
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Créer compte" style="font-size:15px;">
                 
                            </form>
                         
                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="index.php" style="font-size: larger;">Compte déjà crée? Se connecter!</a>
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
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/autocomplete.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/main.js"></script>

<!--
    <script>
        var regions = ["CENTRE","LITTORAL","SUD","EST","OUEST","NORD-OUEST","ADAMAOUA","NORD","EXTREME-NORD"];

        var specialite = ["Immunologie","Anesthésiologie","Andrologie","Cardiologie","Chirurgie cardiaque","Chirurgie reconstructive","Chirurgie générale",
                            "Chirurgie maxillo-faciale","chirurgie pédiatrique","chirurgie thoracique","Chirurgie vasculaire","Neurochirurgie","Dermatologie",
                            "Endocrinologie","Gynécologie","Hématologie","Hépatologie","Odontologie","Oncologie","Ophtalmologie","Pneumologie","Psychiatrie",
                            "Radiologie","Radiothérapie","Rhumatologie","Infectiologie","Médécine du travail","Stomatologie"];
     
        autocomplete(document.getElementById("MyRegion"), regions);

        autocomplete(document.getElementById("specialite"), specialite);

        $("#patient").click(function(){
            $("#specialite").hide(); 
            $("#specialite").val("NA");
        });

        $("#corps").click(function(){
            $("#specialite").show(); 
        });

     </script>-->

</body>

</html>