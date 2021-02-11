<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
    }
    
    include("config.php");
    $err='';

    $con=new mysqli("localhost","root","","gesthospi");

    if (isset($_REQUEST['statut']) && ($_REQUEST['statut']== 'Patient')){

              //Récupération des valeurs du formulaire

              $specialite = $_REQUEST['specialite'];
                      
            //requéte SQL + mot de passe crypté
            $query = "INSERT INTO specialite(specialite)
                      VALUES ('$specialite')";
            // Exécute la requête sur la base de données
            $res = mysqli_query($conn, $query);
            if($res){
               $err="<div class='alert alert-success alert-dismissible fade show' role='alert'>
               <strong>Spécilalité enregistrée</strong>
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
               </button>
             </div>";
            }else{
                $err="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Échec d'enregistrement</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }
        
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GestOuaga</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/add_patient.css">

    <link rel="stylesheet" href="css/autocomplete.css">

    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="vendor/bootstraps/css/bootstrap.min.css">

    <link rel="icon" href="img/img.png"/>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <?php include("adminsidebar.php")?>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <p><?php echo $err;?></p>

                <div class="text-center"><br>

<h1 class="h4 text-gray-900 mb-4" style="font-size: 30px;">Ajouter une spécialité <i class="fa fa-medkit fa-2x"></i></h1>
</div>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="user" autocomplete="off" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size: 22px;">                   
                                    

                                <div style="margin-left: 60px;">                  
                                        
                                     <input type="radio" name="statut" value="Patient" id="patient" style="display:none" checked>                 
                                   
                                </div><br><br>

                                <div class="form-group row">
                                    <div class="col-sm-5 mb-3 mb-sm-0" style="margin-left: 70px;">
                                    <h5>&nbsp;&nbsp;Nouvelle spécialité:</h5>
                                        <input type="text" class="form-control form-control-user"style="font-size:15px;" name="specialite" placeholder=" Nouvelle Spécialité" required>            
                                    </div> 

                                </div>                 
                             
                                <br>
                            
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Enregistrer" style="font-size:18px;width: 250px; margin-left: 250px;">
                                        <br>
                            </form>

<hr>

<div class="text-center">


            
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voulez-vous vraiment vous déconnecter?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionner "Oui" pour mettre fin à cette session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                    <a class="btn btn-primary" href="index.php">Oui</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>