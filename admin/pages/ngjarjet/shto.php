<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>

<?php
$stafi = new \Admin\Lib\Stafi();
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$ngjarjet = new Admin\Lib\Ngjarjet();
if (isset($_POST['btnSave'])) {
    $ngjarjet->setTitulli($_POST['titulli']);
    $ngjarjet->stafiId=$_SESSION['user_id'];
    $ngjarjet->setPermbajtja($_POST['permbajtja']);
    $ngjarjet->setOra($_POST['ora']);
    $ngjarjet->setData(date("Y-m-d"));

    $ngjarjet->create();
    $session->message("Ngjarja është shtuar me sukses!");
    header("Location: ngjarjet.php");  
    }
 
?>

<div class="content-wrapper" >
    <div class="content-header">
        <div class="container-fluid">

        <div class="row mb-4 bg-white p-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark pl-2">Ngjarjet</h3>
            </div><!-- /.col -->
            <div class="col-sm-6 pr-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="ngjarjet.php"><i class="nav-icon fas fa-file-export"></i> Ngjarjet</a></li>
                    <li class="breadcrumb-item active"> Shto ngjarjet</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card-body">
                <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" action="" novalidate>
                    <fieldset class="card card-body mx-5">
                        <legend class="h6 alert  text-center alert-secondary">Shto Ngjarjen</legend>
                        <div class="form-row">
                            <div class="container-fluid">
                                
                                <label for="titulli">Titulli:</label>
                                <input type="text" class="form-control" id="titulli" name="titulli" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni titullin.
                                </div>
                              
                                
                                <label for="permbajtja">Përmbajtja:</label>
                                <textarea name="permbajtja" id="permbajtja" class="form-control" placeholder="Shkruaj 300 karaktere maximumi" cols="10" rows="10" required></textarea>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni përmbajtjen.
                                </div>

                                <label for="ora">Ora:</label>
                                <input type="text" class="form-control" id="ora" minlength="6" name="ora" placeholder="eg. 13:23:12" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni orën.
                                </div>
                               
                                <label for="data">Data:</label>
                                <input type="date" class="form-control" id="data" minlength="2" name="data" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni datën.
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 mt-4" name="btnSave" type="submit">Shto ngjarjen</button>
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