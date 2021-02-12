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

    
    if (isset($_REQUEST['statut']) && ($_REQUEST['statut']== 'Patient')) {
        $medecin=$_REQUEST['medecin'];
        $specialite=$_REQUEST['specialite'];
        $idp=$_SESSION['pk_patient'];
        $date_rdv=$_REQUEST['daterdv'];
        $heure_rdv=$_REQUEST['heurerdv'];

        //echo $medecin;

        $sql= "SELECT pk_corps_medical FROM corps_medical WHERE nom='$medecin'";
        $result = mysqli_query($con,$sql);
        $rows2 = mysqli_fetch_assoc($result);
        $pk_medecin = $rows2["pk_corps_medical"];
        //echo $pk_medecin;
       /* foreach ($medecin as $key) {
            $medecin= $key['pk_corps_medical'];
        }*/
        $stat=1;//rendez-vous à venir logiquement
        $motif=$_REQUEST['motif'];
        if (strtotime( $date_rdv) < strtotime(date("Y-m-d"))) {
            $err="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Date de rendez-vous invalide</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";         
        }
        else if (strtotime( $date_rdv) == strtotime(date("Y-m-d"))) {
            if (strtotime($heure_rdv)>=strtotime(date("H:i:s"))) {
                $query = "INSERT INTO rendez_vous(fk_corps_medical,specialite,date_rendez_vous,heure_rendez_vous,motif,statut,fk_patient) VALUES ('$pk_medecin','$specialite','$date_rdv','$heure_rdv','$motif','$stat','$idp')";
                $res = mysqli_query($con, $query);
                if ($res) {
                    $err="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Votre rendez-vous a été enregistré!!!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";        
                }  
            }
            else {
                $err="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Heure de votre rendez-vous invalide</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";   
            }
           
        }

        else if (strtotime( $date_rdv) > strtotime(date("Y-m-d"))) {
                $query = "INSERT INTO rendez_vous(fk_corps_medical,specialite,date_rendez_vous,heure_rendez_vous,motif,statut,fk_patient) VALUES ('$pk_medecin','$specialite','$date_rdv','$heure_rdv','$motif','$stat','$idp')";
                $res = mysqli_query($con, $query);
                if ($res) {
                    $err="<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Votre rendez-vous a été enregistré!!!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";        
                }  
            /*else {
                $err="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Verifiez l'heure de votre rendez-vous</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";   
            }*/
           
        }

        else{
            $err="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Erreur lors de l'enregistrement du rendez-vous!!!</strong>
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

<?php include("patientsidebar.php")?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 big" style="font-size:18px"><?php echo $_SESSION['nom_patient'] ." ". $_SESSION['prenom_patient'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <p><?php echo $err;?></p>

                <div class="text-center"><br>

                                <h1 class="h4 text-gray-900 mb-4" style="font-size: 30px;">Demander un rendez-vous  <i class="fa fa-calendar fa-2x"></i></h1>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="user" autocomplete="off" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size: 18px; margin-left: 70px;margin-right: 70px;">                   
                                                 <br><br>

                                     <div style="margin-left: 60px;">                  
                                        
                                        <input type="radio" name="statut" value="Patient" id="patient" style="display:none" checked>                 
                                      
                                   </div>

                                <div class="form-group row" style="margin-left: 70px;">
                                  
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h5>&nbsp;&nbsp;Spécialité:</h5>
                                        <select class="form-control" onchange="change_valeur();" id="specialite" name="specialite" style="border-radius: 20px; height: 45px;" required>
                                                <?php
                                        $sqldepartment= "SELECT * FROM specialite";
                                        $qsqldepartment = mysqli_query($con,$sqldepartment);
                                        while($rsdepartment=mysqli_fetch_array($qsqldepartment))
                                        {
                                                echo "<option class='form-control' value='$rsdepartment[specialite]'>$rsdepartment[specialite]</option>";

                                        }
                                      ?>                        
                                          </select>
                                    </div>

                                </div>
                                    
                                
                                <div class="form-group row"style="margin-left: 70px;">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h5>&nbsp;&nbsp;Médecin sollicité:</h5>
                                        <select class="form-control" id="medecin" name="medecin" style="border-radius: 20px; height: 45px;" required>
                                        <option value="" disabled selected>Medecin</option>
                                          </select>
                                    </div> 
                                 
                                </div>
         

                                <div class="form-group row" style="margin-left: 70px;">
                                    <div class="col-sm-2">
                                        <h5>&nbsp;&nbsp;Date:</h5>
                                        <input type="date" style="width: 150px;"class="form-control form-control-user" name="daterdv" required>
                                          
                                    </div>   
                                    
                                    <div class="col-sm-2" style="margin-left: 70px;">
                                        <h5>&nbsp;&nbsp;Heure:</h5>
                                        <input type="time" style="width: 150px;"class="form-control form-control-user" name="heurerdv"  required>
                                          
                                    </div> 

                                </div>
                       
                                <div class="form-group row" style="margin-left: 70px;">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h5>&nbsp;&nbsp;Motif:</h5>
                                        <textarea style="height: 90px;"class="form-control" name="motif" placeholder="Motif du rendez-vous" required> </textarea>     
                                    </div> 
                                </div><br>
                                <!--<i class="fa fa-send" style="margin-left: 200px;margin-top:-200px"></i>-->

                                <button  type="submit" class="btn btn-primary btn-user btn-block" value="Envoyer" style="font-size:20px; width: 250px; background-color: green; border: 1px solid green; margin-left: 250px;">
                                        Envoyer <i class="fa fa-send"></i>
                               </button>
                            
                                
                              
                                        <br><br>
                            </form>
                            <br><br>
                            <a href="patient.php"><button class="btn btn-primary" type="button"><i class="fa fa-arrow-circle-left fa-lg"></i> Retour</button></a>
                         
                            <hr>
                            
                            <div class="text-center">
                       
                           
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

        <script>

        function change_valeur() {

        select = document.getElementById("specialite");
        choice = select.selectedIndex;
        valeur = select.options[choice].value;

        $.ajax({
    url : 'bb.php', // La ressource ciblée
    type : 'GET' ,
    data : 'specialite=' + valeur,
    dataType : 'json',
    success : function(data,i){
            for(i=0; i<data.length; i++){
                $("#medecin").append(
                    "<option value="+ data[i]['nom']+">"
                                +'DR '+data[i]['nom']+ 
                    "</option>"
                );
            }
        },
});

            }
            /*
            $("#specialite").click(function(){
                $("#medecin").append("<option value=""></option>");
        });*/
    </script>


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