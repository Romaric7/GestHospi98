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

<?php include("adminsidebar.php");?>

</nav>
        <!-- End of Sidebar -->

            
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste des corps médicaux</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          
                            <h7 class="m-0 font-weight-bold text-primary" style="font-size:15px">GESTOUAGA ADMINISTRATEUR</h7>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="120%">
                                <?php
                                require('config.php');

                                  // Create connection
                                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                                    // Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $sql = "SELECT * FROM corps_medical ORDER BY pk_corps_medical DESC";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        echo "
                                             <thead>
                                                <tr>
                                                    <th><i class='fa fa-user-md'></i> Nom</th>
                                                    <th><i class='fa fa-user-md'></i> Prénom</th>
                                                    <th><i class='fa fa-mars-double'></i> Sexe</th>
                                                    <th><i class='fa fa-medkit'></i> Spécialité</th>
                                                    <th><i class='fa fa-home'></i> Adresse</th>
                                                    <th><i class='fa fa-phone'></i> Téléphone</th>                                                 
                                                    <th><i class='fa fa-calendar'></i> Date de naissance</th>
                                                    <th><i class='fa fa-map-marker'></i> Région</th>
                                                    <th><i class='fa fa-envelope-open'></i> Adresse mail</th>
                                                    <th><i class='fa toggle-on'></i> Statut</th>
                                                    <th><i class='fa fa-expeditedssl'></i> Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th><i class='fa fa-user-md'></i> Nom</th>
                                                    <th><i class='fa fa-user-md'></i> Prénom</th>
                                                    <th><i class='fa fa-mars-double'></i> Sexe</th>
                                                    <th><i class='fa fa-medkit'></i> Spécialité</th>
                                                    <th><i class='fa fa-home'></i> Adresse</th>
                                                    <th><i class='fa fa-phone'></i> Téléphone</th>                                                 
                                                    <th><i class='fa fa-calendar'></i> Date de naissance</th>
                                                    <th><i class='fa fa-map-marker'></i> Région</th>
                                                    <th><i class='fa fa-envelope-open'></i> Adresse mail</th>
                                                    <th><i class='fa toggle-on'></i> Statut</th>
                                                    <th><i class='fa fa-expeditedssl'></i> Actions</th>
                                                </tr>
                                                </tfoot>";
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result))  {

                                            if($row['statut']=='1'){
                                                $statut_actif = "Actif";
                                                $row['statut']= $statut_actif;
                                            }

                                            if($row['statut']=='0'){
                                                $statut_actif = "Inactif";
                                                $row['statut']= $statut_actif;
                                            }

                                            echo "<tbody><tr><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td>".$row["sexe"]."</td><td>".$row["specialite"]."</td><td>".$row["adresse"]."</td><td>".$row["telephone"]."</td><td>".$row["date_naissance"]."</td><td>".$row["region_origine"]."</td><td>".$row["email"]."</td><td style='color:green;font-size:18px;'>".$row["statut"]."</td><td style='width:150px'><a href='activateacccount.php?id=".$row["pk_corps_medical"]."'><button class='btn btn-primary' title='Activer compte' style='background-color:green; border:1px solid green'>Activer</button></a>
                                            <a href='desactivateaccount.php?id=".$row["pk_corps_medical"]."'><button class='btn btn-primary' title='Désactiver compte' style='background-color:red; border:1px solid red'>Désactiver</button></a></td></tr>";
                                        }
                                        echo "</tbody></table>";
                                        }else {
                                            echo "0 results";
                                        }
                                        mysqli_close($conn);

                                ?>
                                <!--
                                                                                                                               
                                    </tbody>
                                </table>-->
                                <br>
                                <a href="responsable.php"><button class="btn btn-primary" type="button"><i class="fa fa-arrow-circle-left fa-lg"></i> Retour</button></a>
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