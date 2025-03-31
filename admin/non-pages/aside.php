<body id="page-top">
<?php
ob_start();
$session= new Admin\Lib\Session();
?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">SMB</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../../pages/dashboard/index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <?php 
      if($_SESSION['roli'] == 1 || $_SESSION['roli'] == 0){
      ?>
      <!-- Nav Item - Stuudentet Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-users"></i>
          <span>Studentët</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Veprimet</h6>
            <a class="collapse-item" href="../../pages/studentet/studentet.php">Shiko Studentët</a>
            <a class="collapse-item" href="../../pages/studentet/shto.php">Shto Student</a>
          </div>
        </div>
      </li>
      <?php 
        }
      ?>
      
      <?php 
      if($_SESSION['roli'] == 1 || $_SESSION['roli'] == 0){
      ?>
      <!-- Nav Item - Kategorite Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-list"></i>
          <span>Kategoritë</span>
        </a>
        <div id="collapseNine" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Veprimet</h6>
            <a class="collapse-item" href="../../pages/kategorite/kategorite.php">Shiko kategoritë</a>
            <a class="collapse-item" href="../../pages/kategorite/shto.php">Shto kategoritë</a>
        </div>
      </li>
      <?php 
      }
      ?>

      <?php 
      if($_SESSION['roli'] == 1 || $_SESSION['roli'] == 0){
      ?>
      <!-- Nav Item - Librat Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-book"></i>
          <span>Librat</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Veprimet</h6>
            <a class="collapse-item" href="../../pages/librat/librat.php">Shiko librat</a>
            <a class="collapse-item" href="../../pages/librat/shto.php">Shto libra</a>
        </div>
      </li>
      <?php 
      }
      ?>
      
       <!-- Nav Item - Huate Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-hands"></i>
          <span>Huatë</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Veprimet</h6>
            <a class="collapse-item" href="../../pages/huat/huat.php">Shiko huatë</a>
            <?php 
            if($_SESSION['roli'] == 1 || $_SESSION['roli'] == 0){
            ?>
            <a class="collapse-item" href="../../pages/huat/shto.php">Shto huatë</a>
            <?php 
              }
            ?>
        </div>
      </li>

      <?php 
      if($_SESSION['roli'] == 1 || $_SESSION['roli'] == 0){
      ?>
      <!-- Nav Item - Ngjarjet Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-calendar-week"></i>
          <span>Ngjarjet</span>
        </a>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Veprimet</h6>
            <a class="collapse-item" href="../../pages/ngjarjet/ngjarjet.php">Shiko ngjarjet</a>
            <a class="collapse-item" href="../../pages/ngjarjet/shto.php">Shto ngjarjet</a>
        </div>
      </li>
      <?php 
      }
      ?>
      

       <?php 
      if($_SESSION['roli'] == 1){
      ?>
       <!-- Nav Item - Stafi Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-user"></i>
          <span>Stafi</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Veprimet</h6>
            <a class="collapse-item" href="../../pages/stafi/stafi.php">Shiko stafin</a>
            <a class="collapse-item" href="../../pages/stafi/shto.php">Shto staf</a>
        </div>
      </li>
      <?php
      }
      ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

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
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['fullname'];?></span>
                <i class="fas fa-user-cog"></i>
               </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#"> -->

                <a class='dropdown-item' style='text-decoration:none;' href='../../../index.php'><i class='fas fa-window-restore fa-sm fa-fw mr-2 text-gray-400'></i> Ballina</a>

                <?php
                  if($_SESSION['roli'] == 1 || $_SESSION['roli'] == 0){
                  
                 echo "<a class='dropdown-item' style='text-decoration:none;' href='../stafi/profile.php?id=" . $_SESSION['user_id'] .  "'><i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i> Profili</a>";                               
                   }else{
                    echo "<a class='dropdown-item' style='text-decoration:none;' href='../studentet/profile.php?id=" . $_SESSION['user_id'] .  "'><i class='fas fa-user fa-sm fa-fw mr-2 text-gray-400'></i> Profili</a>";                               

                   } ?>
                                 
                <div class="dropdown-divider"></div>
                <a href="../../logout.php" class="dropdown-item dropdown-footer"><i class="fas fa-sign-out-alt mr-2 text-gray-400"></i>Dilni</a>

              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
