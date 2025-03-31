<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');


$huate = new Admin\Lib\Huate();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_GET['id'])){
    $huate = $huate->find_id($_GET['id']);
}
if (isset($_POST["submit"])) {
    $huate->setStudentiId($_POST['studentiId']);
    $huate->stafiId=$_SESSION['user_id'];
    $huate->setLibriId($_POST['libriId']);
    $huate->setDataEMarrjes(date("Y-m-d"));
    $huate->setDataEKthimit(date("Y-m-d"));
    $huate->setStatusi($_POST['statusi']);

    $huate->update();
    $session->message("Huaja është modifikuar me sukses!");
     header("Location:huat.php");
     
    
}
?>

<html>
<body>
    <div class="content-wrapper ">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-4 bg-white p-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark pl-2">Modifiko huatë</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 pr-4">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="huat.php">Huatë</a></li>
                        <li class="breadcrumb-item active">Modifiko </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" action="" novalidate>
          <div class="row">

              <div class="col-md-12 p-2 ">
                <div class="m-2 p-2 bg-light">
                    <?php
                         $studenti = new \Admin\Lib\Studentet();
                    ?>
                  <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Studenti</label>
                                    <select name="studentiId"  class="form-control" id="studentiId" aria-describedby="adminTypeHelp" required>
                                            <?php
                                               // $studenti = new \Admin\Lib\Studentet();
                                                    foreach ($studenti->find_all() as $s){
                                                        if($s->id==$huate->studentiId){
                                                        echo "<option value='".$s->id ."'> "
                                                            .$s->emri . ' ' .$s->mbiemri . "</option>";
                                                        }
                                                    }
                                                    foreach ($studenti->find_all() as $s){
                                                        if($s->id!=$huate->studentiId){
                                                            echo "<option value='".$s->id ."'> "
                                                                .$s->emri . ' ' .$s->mbiemri .  "</option>";
                                                        }
                                                    }
                                                ?>
                                        </select>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni studentin.
                                </div>
                                </div>

                                <!-- Select librin -->
                                <label for="libri">Libri:</label>
                                <select name="libriId"  class="form-control" id="libri" aria-describedby="adminTypeHelp" required>
                                            <?php
                                                $libri = new \Admin\Lib\Librat();
                                                    foreach ($libri->find_all() as $l){
                                                        if($l->id==$huate->libriId){
                                                        echo "<option value='".$l->id ."'> "
                                                            .$l->titulli . "</option>";
                                                        }
                                                    }
                                                    foreach ($libri->find_all() as $l){
                                                        if($l->id!=$huate->libriId){
                                                        echo "<option value='".$l->id ."'> "
                                                            .$l->titulli . "</option>";
                                                        }
                                                    }
                                                ?>
                                        </select>
                                <div class="invalid-feedback">
                                    Ju lutem plotësoni libri .
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="data">Data e marrjes</label>
                                    <input type="date" class="form-control" name="dataEMarrjes" id="data" 
                                           value="<?php if(!empty($huate->dataEMarrjes)) echo htmlspecialchars($huate->dataEMarrjes); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni datën e marrjes.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="data">Data e kthimit</label>
                                    <input type="date" class="form-control" name="dataEKthimit" id="data"  
                                           value="<?php if(!empty($huate->dataEKthimit)) echo htmlspecialchars($huate->dataEKthimit); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni datën e kthimit.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="statusi">Statusi</label>
                                    <select name="statusi"  class="form-control" id="statusi" aria-describedby="adminTypeHelp" required>
                                     <option value="<?php if(!empty($huate->id))  echo htmlspecialchars($huate->statusi); ?>"><?php echo $huate->statusi?></option>
                                            <?php
                                                        if($huate->statusi=="e kthyer"){
                                                            ?>
                                                       <option value="e marr">e marr</option>
                                                     <?php
                                                        }else{
                                                            ?>
                                                              <option value="e kthyer">e kthyer</option>
                                                            <?php
                                                        }                                   
                                                ?>
                                        </select>        

                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni statusin.
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