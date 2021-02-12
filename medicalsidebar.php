
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                <img src="img/img.png" style="width: 50px; height: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3" style="color:white; cursor:pointer">GestOuaga Medical</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

         

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
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
                        
                        <a class="collapse-item" href="Mviewpatient.php">Liste des patients</a>
                       <!-- <a class="collapse-item" href="cards.html">Dossiers médicaux</a>-->
                    </div>
                </div>
            </li>
          
            <!-- Divider -->
            <hr class="sidebar-divider">

             <!-- Heading -->
             <div class="sidebar-heading">
                
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
                       
                        <a class="collapse-item" href="Mviewmedical.php">Liste des corps médicaux</a>
                    </div>
                </div>
            </li>

               <!-- Divider -->
               <hr class="sidebar-divider">

               <!-- Heading -->
               <div class="sidebar-heading">
                  
              </div>
  
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                      aria-expanded="true" aria-controls="collapseTwo">
                      <i class="fa fa-2x fa-user-plus"></i>
                      <span> CONSULTATIONS</span>
                  </a>
                  <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">

                          <a class="collapse-item" href="Mviewconsultation.php">Liste des consultations</a>
                          <a class="collapse-item" href="Mviewcomingconsultation.php">consultations en attente</a>
                          <a class="collapse-item" href="Mviewendconsultation.php">consultations terminés</a>
                      </div>
                  </div>
              </li>

               <!-- Divider -->
               <hr class="sidebar-divider">

               <!-- Heading -->
               <div class="sidebar-heading">
                 
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
                  <a class="collapse-item" href="Mappointment.php">Liste des rendez-vous</a>
                  <a class="collapse-item" href="Mviewcomingappointment.php">Rendez-vous en attente</a>
                  <a class="collapse-item" href="Mviewconfirmappointment.php">Rendez-vous approuvés</a>
                  <a class="collapse-item" href="Mviewrejectappointment.php">Rendez-vous rejetés</a>
                 <!-- <a class="collapse-item" href="Mviewappointment.php">Rendez-vous critiques</a>-->
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