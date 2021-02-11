 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15" >
        <img src="img/img.png" style="width: 50px; height: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3" style="color:white; cursor:pointer">GestOuaga ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0"  style="background-color:white">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="responsable.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bords</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    GESTION DES PATIENTS
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-2x fa-address-card"></i>
            <span>PATIENTS</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">GESTION DES PATIENTS</h6>-->
                <a class="collapse-item" href="Aviewpatient.php">Liste des patients</a>
                <a class="collapse-item" href="cards.html">Dossiers médicaux</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
     GESTION DES CORPS MÉDICAUX
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-3x fa-user-md"></i>
            <span>CORPS MÉDICAL</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               
                <a class="collapse-item" href="Addmedical.php">Ajouter un corps médical</a>
                <a class="collapse-item" href="Addspecialite.php">Ajouter une spécialité</a>
                <a class="collapse-item" href="Aviewmedical.php">Liste des corps médicaux</a>

            </div>
        </div>
    </li>

    <!-- Divider 
    <hr class="sidebar-divider">-->

     <!-- Heading 
     <div class="sidebar-heading">
     GESTION DES CENTRES MÉDICAUX
    </div>

   Nav Item - Pages Collapse Menu
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-2x fa-hospital"></i>
            <span>CENTRES MÉDICAUX</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                
                <a class="collapse-item" href="Aviewcenter.php">Liste des centres </a>
            </div>
        </div>
    </li> -->


       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
       GESTION DES CONSULTATIONS
      </div>

      <!-- Nav Item - Pages Collapse Menu-->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fa fa-2x fa-user-plus"></i>
              <span> CONSULTATIONS</span>
          </a>
          <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="Aviewconsultation.php">Liste des consultations</a>
              </div>
          </div>
      </li> 

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
       GESTION DES RENDEZ-VOUS
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
              aria-expanded="true" aria-controls="collapseTwo">
              <i class="fa fa-2x fa-calendar-check-o"></i>
              <span> RENDEZ-VOUS</span>
          </a>
          <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="Aviewcomingappointment.php">Rendez-vous à venir</a>
                  <a class="collapse-item" href="Aviewappointment.php">Rendez-vous critiques</a>
              </div>
          </div>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

   

</ul>
<!-- End of Sidebar -->

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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 big"><?php echo $_SESSION['username']; ?></span>
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
