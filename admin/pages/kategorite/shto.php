<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>

<?php
$kategorite = new Admin\Lib\Kategorite();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (isset($_POST['btnSave'])) {
    
    $kategorite->setEmri($_POST['emri']);

    $kategorite->create();
    $session->message("Kategoria është shtuar me sukses!");
    header("Location: kategorite.php");  

   
    }
 
?>

<div class="content-wrapper" >
    <div class="content-header">
        <div class="container-fluid">

        <div class="row mb-4 bg-white p-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark pl-2">Kategoritë</h3>
            </div><!-- /.col -->
            <div class="col-sm-6 pr-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="kategorite.php"><i class="nav-icon fas fa-file-export"></i> Kategoritë</a></li>
                    <li class="breadcrumb-item active">Shto kategoritë</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card-body">
                <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" action="" novalidate>
                    <fieldset class="card card-body mx-5">
                        <legend class="h6 alert  text-center alert-secondary">Shto kategoritë</legend>
                        <div class="form-row">
                            <div class="container-fluid">
                                
                                <input type="hidden" class="form-control" id="id" minlength="1" name="id" placeholder="" required>

                              
                                <label for="emri">Kategoria:</label>
                                <input type="text" class="form-control" id="emri" minlength="2" name="emri" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni kategorinë.
                                </div>

                            </div>
                            <button class="btn btn-primary w-100 mt-4" name="btnSave" type="submit">Shto kategorinë</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require_once("../../non-pages/footer.php")
?>