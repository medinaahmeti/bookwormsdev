<?php
 

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');

$librat = new Admin\Lib\Librat();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_GET['id'])){
    $librat = $librat->find_id($_GET['id']);
}
if (isset($_POST["submit"])) {
      // move_uploaded_file($_FILES['foto']['tmp_name'],"../../non-pages/images/".$_FILES['foto']['name']);

          $librat->setKategoriaId($_POST['kategoriaId']);
          $librat->setTitulli($_POST['titulli']);
          $librat->setAutori($_POST['autori']);
       //   $librat->setFoto($_FILES['foto']['name']);
           $librat->setDataEPublikimit(date("Y-m-d"));
          $librat->setIsbn($_POST['isbn']);
          $librat->setRafti($_POST['rafti']);
          $librat->setVendiBotimit($_POST['vendi_botimit']);
          $librat->setFaqet($_POST['faqet']);
          $librat->setSignatura($_POST['signatura']);

          $librat->update();
          $session->message("Libri është modifikuar me sukses!");
            header("Location: librat.php");
           
  
}
?>

<html>
<body>
    <div class="content-wrapper ">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-4 bg-white p-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark pl-2">Modifiko Librat</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 pr-4">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="librat.php">Librat</a></li>
                        <li class="breadcrumb-item active">Modifiko </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" novalidate>
          <div class="row">

              <div class="col-md-12 p-2 ">
                <div class="m-2 p-2 bg-light">
                    
                  <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Titulli</label>
                                    <input type="text" class="form-control" id="name" minlength="1" name="titulli"
                                           value="<?php if(!empty($librat->titulli)) echo htmlspecialchars($librat->titulli); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni emrin.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="autori">Autori</label>
                                    <input type="text"  name="autori" class="form-control" id="autori"
                                           value="<?php if(!empty($librat->autori)) echo htmlspecialchars($librat->autori); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni mbiemrin.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="isbn">ISBN</label>
                                    <input type="number" class="form-control" name="isbn" id="isbn"
                                           value="<?php if(!empty($librat->isbn)) echo htmlspecialchars($librat->isbn); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni isbn-in.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="rafti">Rafti</label>
                                    <input type="text" class="form-control" name="rafti" id="rafti"
                                           value="<?php if(!empty($librat->rafti)) echo htmlspecialchars($librat->rafti); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni raft-in.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="vendi_botimit">Vendi i botimit</label>
                                    <input type="text" class="form-control" name="vendi_botimit" id="vendi_botimit"
                                           value="<?php if(!empty($librat->vendi_botimit)) echo htmlspecialchars($librat->vendi_botimit); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni vendin e botimit.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="faqet">Nr. i faqeve</label>
                                    <input type="number" class="form-control" name="faqet" id="faqet"
                                           value="<?php if(!empty($librat->faqet)) echo htmlspecialchars($librat->faqet); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni numrin e faqeve.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="signatura">Signatura</label>
                                    <input type="text" class="form-control" name="signatura" id="signatura"
                                           value="<?php if(!empty($librat->signatura)) echo htmlspecialchars($librat->signatura); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni signaturen.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="data">Data e publikimit</label>
                                    <input type="date" class="form-control" name="dataEPublikimit" id="data" 
                                           value="<?php if(!empty($librat->dataEPublikimit)) echo htmlspecialchars($librat->dataEPublikimit); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni numrin e telefonit.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                              <!-- <div class="col-md-12 mb-3">
                            <label for="foto">Foto:</label>
                                <input type="file" class="form-control-file" id="foto"  name="foto" 
                                 value="<?php //if(!empty($librat->foto)) echo htmlspecialchars($librat->foto); ?>" required>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni foton.
                                </div>
                            </div> -->
                                <div class="col-md-12 mb-3">
                                    <label for="kategoria">Kategoria</label>
                                    <select name="kategoriaId"  class="form-control" id="kategoria" aria-describedby="adminTypeHelp" required>
                                            <?php
                                                $kategorite = new \Admin\Lib\Kategorite();
                                                    foreach ($kategorite->find_all() as $k){
                                                        if($k->id==$librat->kategoriaId){
                                                        echo "<option value='".$k->id ."'> "
                                                            .$k->emri . "</option>";
                                                        }
                                                    }
                                                    foreach ($kategorite->find_all() as $k){
                                                        if($k->id!=$librat->kategoriaId){
                                                        echo "<option value='".$k->id ."'> "
                                                            .$k->emri . "</option>";
                                                        }
                                                    }
                                                ?>
                                        </select>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni kategorine.
                                    </div>
                                </div>
                               
                                </div>
                            </div>
                            
                                </div>
                            </div>
                     
                            <input type="submit" class="btn btn-primary m-2 w-100" style="border-radius: 10px;" name="submit" value="Modifiko librin" class="btnSubmit">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
require_once("../../non-pages/footer.php")
?>