<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>

<?php
$librat = new Admin\Lib\Librat();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (isset($_POST['btnSave'])) {
    move_uploaded_file($_FILES['foto']['tmp_name'],"../../non-pages/images/".$_FILES['foto']['name']);

    $librat->setKategoriaId($_POST['kategoriaId']);
    $librat->setTitulli($_POST['titulli']);
    $librat->setAutori($_POST['autori']);
    $librat->setDataEPublikimit(date("Y-m-d"));
    $librat->setFoto($_FILES['foto']['name']);
    $librat->setIsbn($_POST['isbn']);
    $librat->setRafti($_POST['rafti']);
    $librat->setVendiBotimit($_POST['vendi_botimit']);
    $librat->setFaqet($_POST['faqet']);
    $librat->stafiId=$_SESSION['user_id'];
    $librat->setSignatura($_POST['signatura']);
   
    $librat->create();
    $session->message("Libri është shtuar me sukses!");
    header("Location: http://www.biblotekaelipjanit.com/admin/pages/librat/librat.php");
    
    
}
 
?>

<div class="content-wrapper" >
    <div class="content-header">
        <div class="container-fluid">

        <div class="row mb-4 bg-white p-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark pl-2">Librat</h3>
            </div><!-- /.col -->
            <div class="col-sm-6 pr-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="librat.php"><i class="nav-icon fas fa-file-export"></i> Librat</a></li>
                    <li class="breadcrumb-item active"><i class="fas fa-plus-circle nav-icon "></i> Shto librat</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card-body">
                <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" action="" novalidate enctype="multipart/form-data">
                    <fieldset class="card card-body mx-5">
                        <legend class="h6 alert  text-center alert-secondary">Shto Liber</legend>
                        <div class="form-row">
                            <div class="container-fluid">
                                <input type="hidden" class="form-control" id="id" minlength="1" name="id" placeholder="" required>

                                <label for="titulli">Titulli:</label>
                                <input type="text" class="form-control" id="name" minlength="2" name="titulli" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni titullin.
                                </div>

                                <!-- Select kategorite -->
                                <label for="kategoria">Kategoria:</label>
                                    <select name="kategoriaId" value="<?php echo $librat->getKategoriaId(); ?>" class="form-control" id="kategoria" aria-describedby="adminTypeHelp" required>
                                            <option value=''>Zgjedh Kategorine</option>
                                            <?php
                                                $kategoria = new \Admin\Lib\Kategorite();
                                                //$studentet = $studenti->find_all();
                                                foreach ($kategoria->find_all() as $k) {
                                                    echo "<option value='" . $k->id . "'> "
                                                        . $k->emri . "</option>";
                                                }
                                                ?>
                                        </select>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni kategorine.
                                </div>
                                
                                <label for="autori">Autori:</label>
                                <input type="text" class="form-control" id="autori" name="autori" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni autorin.
                                </div>

                                
                                <label for="foto">Foto:</label>
                                <input type="file" class="form-control-file" id="foto"  name="foto" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni foton.
                                </div>

                                <label for="isbn">ISBN:</label>
                                <input type="number" class="form-control" id="isbn" minlength="16" name="isbn" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni isbn.
                                </div>
                                
                                    <label for="rafti">Rafti</label>
                                    <input type="text" class="form-control" name="rafti" id="rafti" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni raft-in.
                                    </div>

                                    <label for="vendi_botimit">Vendi i botimit</label>
                                    <input type="text" class="form-control" name="vendi_botimit" id="vendi_botimit" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni vendin e botimit.
                                    </div>

                                    <label for="faqet">Nr. i faqeve</label>
                                    <input type="number" class="form-control" name="faqet" id="faqet" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni numrin e faqeve.
                                    </div>

                                    <label for="signatura">Signatura</label>
                                    <input type="text" class="form-control" name="signatura" id="signatura" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni signaturen.
                                    </div>
                               
                                <label for="dataEPublikimit">Data:</label>
                                <input type="date" class="form-control" id="autori" name="dataEPublikimit" placeholder="" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni daten.
                                </div>
                               
                            </div>
                            <button class="btn btn-primary w-100 mt-4" name="btnSave" type="submit">Shto librin</button>
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