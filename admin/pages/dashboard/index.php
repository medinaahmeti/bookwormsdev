<?php
session_start();
include_once('../../non-pages/header.php');
?>

<?php
include_once('../../non-pages/aside.php');
include_once('../../non-pages/urlQasja.php');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
    <?php
    if($_SESSION['roli']==1){
      ?>
    <form method="post" action="../../non-pages/exportHuate.php">
     <input type="submit" name="exportHuate" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value="Raporte për huatë" />
    </form>
    <form method="post" action="../../non-pages/exportStudent.php">
     <input type="submit" name="exportStudent" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" value="Raporte për studentët" />
    </form>
    <?php
    }
    ?>
  </div>

  <!-- Content Row -->
  <div class="row">

  <?php $librat = new Admin\Lib\Librat();?>
    <!-- Numri total i stafit -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Librat</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $librat->find_all_books();?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $students = new Admin\Lib\Studentet();?>
    <!-- Numri total i studenteve -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Studentet</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $students->find_all_students();?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $stafi = new Admin\Lib\Stafi();?>
    <!-- Numri total i stafit -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Stafi</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stafi->find_all_stafi();?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php $huate = new Admin\Lib\Huate();?>

    <!-- Numri total i huave-->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Huate</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $huate->find_all_huate();?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hands fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

   

    <!-- Pie Chart -->
    <div class="col-xl-12 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Galleri</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <img src="../../template/img/books.jpg" class="img-fluid" width="24%" alt="">
          <img src="../../template/img/background02.jpg" class="img-fluid" width="24%" alt="">
          <img src="../../template/img/book.jpg" class="img-fluid" width="24%" alt="">
          <img src="../../template/img/old-books.jpg" class="img-fluid" width="24%" alt="">

        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-lg-12 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Rregullat</h6>
        </div>
        <div class="card-body">
        <ol type="I">
            <li>Stafi regjistron studentin, librat dhe huatë.</li>
             <li>Studenti sheh huatë e tij.</li>
          </ol>
        </div>
      </div>

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Historia</h6>
        </div>
        <div class="card-body">
              <p>Ky sistem i menaxhimit të të dhënave të biblotekës u krijua ne vitin 2020 nga Book Worms Devs.<br>
              Qëllimi i tij është që të ruaj të dhënat e biblotekës në mënyrë digjitale.</p>
      </div>
      </div>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include_once('../../non-pages/footer.php');
?>