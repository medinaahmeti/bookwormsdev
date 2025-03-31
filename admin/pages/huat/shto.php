<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>

<?php
$huate = new Admin\Lib\Huate();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (isset($_POST['btnSave'])) {
    $huate->setStudentiId($_POST['studentiId']);
    $huate->stafiId=$_SESSION['user_id'];
    $huate->setLibriId($_POST['libriId']);
    $huate->setDataEMarrjes($_POST['dataEMarrjes']);
    $huate->setDataEKthimit($_POST['dataEKthimit']);
    $huate->setStatusi($_POST['statusi']);

    $huate->create();
    $session->message("Huaja është shtuar me sukses!");
    header("Location: huat.php");  

   
    }
 
?>

<div class="content-wrapper" >
    <div class="content-header">
        <div class="container-fluid">

        <div class="row mb-4 bg-white p-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark pl-2">Huatë</h3>
            </div><!-- /.col -->
            <div class="col-sm-6 pr-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="huate.php"><i class="nav-icon fas fa-file-export"></i> Huatë</a></li>
                    <li class="breadcrumb-item active">Shto huatë</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card-body">
                <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" action="" novalidate>
                    <fieldset class="card card-body mx-5">
                        <legend class="h6 alert  text-center alert-secondary">Shto Huatë</legend>
                        <div class="form-row">
                            <div class="container-fluid">
                               <!-- Select studentin -->
                               <label>Studenti:</label>
                                    <select name="studentiId" value="<?php echo $huate->getStudentiId(); ?>" class="form-control" id="studentiId" aria-describedby="adminTypeHelp" required>
                                            <option value=''>Zgjedh Studentin</option>
                                            <?php
                                             $studenti = new \Admin\Lib\Studentet();
                                                foreach ($studenti->find_all() as $student) {
                                                    echo "<option value='" . $student->id . "'> "
                                                        . $student->nr_serik. ' | ' . $student->emri . " " . $student->mbiemri . "</option>";
                                                }
                                                ?>
                                        </select>

                                <div class="invalid-feedback">
                                    Ju lutem plotësoni studentin.
                                </div>
                                
                                 <!-- Select librin -->
                                 <label>Libri:</label>
                                    <select name="libriId" value="<?php echo $huate->getLibriId(); ?>" class="form-control" id="libriId" aria-describedby="adminTypeHelp" required>
                                            <option value=''>Zgjedh Librin</option>
                                            <?php
                                                $libri = new \Admin\Lib\Librat();
                                                foreach ($libri->find_all() as $l) {
                                                    echo "<option value='" . $l->id . "'> "
                                                        . $l->titulli . "</option>";
                                                }
                                                ?>
                                        </select>

                                <div class="invalid-feedback">
                                    Ju lutem plotësoni libri .
                                </div>
                              
                                
                                <label for="dataEMarrjes">Data e marrjes:</label>
                                <input type="date" class="form-control" id="dataEMarrjes" minlength="2" name="dataEMarrjes" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni datën.
                                </div>
                               
                                <label for="dataEKthimit">Data e skadimit:</label>
                                <input type="date" class="form-control" id="dataEKthimit" minlength="2" name="dataEKthimit" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni datën.
                                </div>

                                <label for="statusi">Statusi:</label>
                                    <select name="statusi" id="statusi" class="form-control" required>
                                        <option value="">Zgjedh statusin</option>
                                        <option value="e kthyer">e kthyer</option>
                                        <option value="e marr">e marr</option>
                                    </select>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni statusin.
                                </div>

                            </div>
                            <button class="btn btn-primary w-100 mt-4" name="btnSave" type="submit">Shto huanë</button>
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