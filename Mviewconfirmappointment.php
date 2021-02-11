<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
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

    <title>GestOuaga - liste des patients</title>

   
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

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="icon" href="img/img.png"/>

</head>

<body id="page-top">

<?php include("medicalsidebar.php")?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
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
                             <!--  Dropdown - Messages -->
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 big" style="font-size:18px"><?php echo " DR"." ".$_SESSION['nom_medecin'] ." ". $_SESSION['prenom_medecin'];?></span>
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste des rendez-vous approuvés pour <?php echo "DR"." ".$_SESSION['nom_medecin']." ".$_SESSION['prenom_medecin'];?>
                                </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          
                            <h7 class="m-0 font-weight-bold text-primary" style="font-size:20px">GESTOUAGA Service <?php echo $_SESSION['specialite_medecin'];?></h7>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%">
                                <?php
                                require('config.php');
                                     $id_medecin=$_SESSION['pk_medecin'];

                                    $conn=new mysqli("localhost","root","","gesthospi");

                                    $sql = "SELECT * FROM rendez_vous WHERE statut='2' AND fk_corps_medical= $id_medecin";
                                    $result = mysqli_query($conn, $sql);
                                 


                                    if (mysqli_num_rows($result) > 0) {
                                        echo "
                                             <thead>
                                                <tr>
                                                    <th><i class='fa fa-user-injured'></i> Patient sollicitant</th>
                                                    <th><i class='fa fa-calendar'></i> Date du rendez-vous</th>
                                                    <th><i class='fa fa-clock'></i> Heure du rendez-vous</th>
                                                    <th><i class='fa fa-pencil-square-o'></i> Motif</th> 
                                                    <th><i class='fa fa-toggle-on'></i> Statut</th>                                               
                                                    <th><i class='fa fa-expeditedssl'></i> Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th><i class='fa fa-user-md'></i> Patient sollicitant</th>
                                                    <th><i class='fa fa-calendar'></i> Date du rendez-vous</th>
                                                    <th><i class='fa fa-clock'></i> Heure du rendez-vous</th>
                                                    <th><i class='fa fa-pencil-square-o'></i> Motif</th> 
                                                    <th><i class='fa fa-toggle-on'></i> Statut</th>                                               
                                                    <th><i class='fa fa-expeditedssl'></i> Actions</th>                                             
                                                
                                                </tr>
                                                </tfoot>";
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result))  {


                                            if($row['statut']=='2'){
                                                $statut_attente = "Approuvé";
                                                $row['statut']= $statut_attente;
                                            }

                                            $pk_medecin = $row["fk_corps_medical"];
                                            $pk_patient = $row["fk_patient"];
                                             //Récupération du nom et du prenom du médécin
                                            $sql2 = "SELECT nom,prenom FROM patient WHERE pk_patient='$pk_patient'";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            $nom_patient = $row2["nom"];
                                            $prenom_patient = $row2["prenom"];

                            
                                            echo "<tbody><tr><td>" .$nom_patient." ".$prenom_patient."</td><td>".$row["specialite"]."</td><td>".$row["date_rendez_vous"]."</td><td>".$row["heure_rendez_vous"]."</td><td>".$row["motif"]."</td><i><td style='color:green;font-size:18px'>".$row["statut"]."</td></i><td><a href='rejectappointment.php?id=".$row["pk_rendez_vous"]."'><button class='btn btn-primary' title='Rejeter' style='background-color:red; border:1px solid red'><i class='fa fa fa-trash'></i></button></a></td></tr>";
                                    
                                        }
                                        echo "</tbody></table>";
                                        }else {
                                            echo "<h2><i class='fa fa-bell-slash fa-lg'></i>Aucun rendez-vous approuvés</h2><br><br>";
                                        }
                                        mysqli_close($conn);

                                ?>
                                <!--
                                                                                                                               
                                    </tbody>
                                </table>-->
                                <br>
                                <a href="corps_medical.php"><button class="btn btn-primary" type="button"><i class="fa fa-arrow-circle-left fa-lg"></i> Retour</button></a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>