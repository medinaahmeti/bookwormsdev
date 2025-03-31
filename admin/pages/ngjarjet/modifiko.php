<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');

$ngjarjet = new Admin\Lib\Ngjarjet();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_GET['id'])){
    $ngjarjet = $ngjarjet->find_id($_GET['id']);
}
if (isset($_POST["submit"])) {
   
    $ngjarjet->setTitulli($_POST['titulli']);
    $ngjarjet->setPermbajtja($_POST['permbajtja']);
    $ngjarjet->setOra($_POST['ora']);
    $ngjarjet->setData(date("Y-m-d"));

    $ngjarjet->update();
    $session->message("Ngjarjet është modifikuar me sukses!");
     header("Location:ngjarjet.php");
     
    
}
?>

<html>
<body>
    <div class="content-wrapper ">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-4 bg-white p-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark pl-2">Modifiko ngjarjet</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 pr-4">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item "><a href="../../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="ngjarjet.php">Ngjarjet</a></li>
                        <li class="breadcrumb-item active">Modifiko </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" novalidate>

              <div class="col-md-12 p-2 ">
                <div class="m-2 p-2 bg-light">
                    <?php
                         $studenti = new \Admin\Lib\Studentet();
                    ?>
                  <div class="form-row">
                                
                                <div class="col-md-12 mb-3">
                                    <label for="titulli">Titulli</label>
                                    <input type="text"  name="titulli" class="form-control" id="titulli"
                                           value="<?php if(!empty($ngjarjet->titulli)) echo htmlspecialchars($ngjarjet->titulli); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni titullin.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="Permbajtja">Përmbajtja</label>
                                      <textarea name="permbajtja" class="form-control" id="data"  maxlength="300" cols="10" rows="10" required><?php if(!empty($ngjarjet->permbajtja)) echo htmlspecialchars($ngjarjet->permbajtja); ?></textarea>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni përmbajtjen.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="ora">Ora</label>
                                    <input type="text" class="form-control" name="ora" id="ora" 
                                           value="<?php if(!empty($ngjarjet->ora)) echo htmlspecialchars($ngjarjet->ora); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni orën.
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="data">Data</label>
                                    <input type="date" class="form-control" name="data" id="data" 
                                           value="<?php if(!empty($ngjarjet->data)) echo htmlspecialchars($ngjarjet->data); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni datën.
                                    </div>
                                </div>
                            </div>
                            
                                </div>
                            </div>
                     
                            <input type="submit" class="btn btn-primary m-2 w-100" style="border-radius: 10px;" name="submit" value="Modifiko ngjarjen" class="btnSubmit">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php
require_once("../../non-pages/footer.php")
?>