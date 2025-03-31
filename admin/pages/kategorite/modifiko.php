<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');


$kategorite = new Admin\Lib\Kategorite();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_GET['id'])){
    $kategorite = $kategorite->find_id($_GET['id']);
}
if (isset($_POST["submit"])) {
    $kategorite->setEmri($_POST['emri']);

    $kategorite->update();
    $session->message("Kategoria është modifikuar me sukses!");
     header("Location:kategorite.php");
     
    
}
?>

<html>
<body>
    <div class="content-wrapper ">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-4 bg-white p-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark pl-2">Modifiko kategoritë</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 pr-4">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="kategorite.php">Kategoritë</a></li>
                        <li class="breadcrumb-item active">Modifiko </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" action="" novalidate>
          <div class="row">

              <div class="col-md-12 p-2 ">
                <div class="m-2 p-2 bg-light">
                           
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="emri">Emri</label>
                                    <input type="text" class="form-control" name="emri" id="emri"  
                                           value="<?php if(!empty($kategorite->emri)) echo htmlspecialchars($kategorite->emri); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni kategorinë.
                                    </div>
                                </div>
                            </div>
                           </div>
                          </div>
                     

                            <input type="submit" class="btn btn-primary m-2 w-100" style="border-radius: 10px;" name="submit" value="Modifiko kategorinë" class="btnSubmit">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
require_once("../../non-pages/footer.php")
?>