<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/is_admin.php');


$stafi = new \Admin\Lib\Stafi();
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if ($_GET['id']) {
    $stafi=$stafi->find_id($_GET['id']);
}

if (isset($_POST["submit"]) ) {
 
      $stafi->setEmri($_POST['emri']);
      $stafi->setMbiemri($_POST['mbiemri']);
      $stafi->setAdresa($_POST['adresa']);
      $stafi->setEmail($_POST['email']);
      $stafi->setTelefoni($_POST['telefoni']);
    //   $stafi->setPassword($_POST['password']);
      $stafi->setRoli($_POST['roli']);
     
      $stafi->update();
      $session->message("Stafi është modifikuar me sukses!");
     // echo "<meta http-equiv='refresh' content='0'; url='stafi.php'/>";
     header('location: stafi.php');
   
}

?>

<?php
if($_SESSION['roli']==1){
?>



<html>

<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4 bg-white p-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark pl-2">Modifiko Stafi</h3>
          </div><!-- /.col -->
          <div class="col-sm-6 pr-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="../dashboard/index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li class="breadcrumb-item "><a href="stafi.php"> Stafi</a></li>
              <li class="breadcrumb-item active"> Modifiko </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" novalidate>
          <div class="row">

              <div class="col-md-12 p-2 ">
                <div class="m-2 p-2 bg-light">
                    
                  <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Emri</label>
                                    <input type="text" class="form-control" id="name" minlength="1" name="emri"
                                           value="<?php if(!empty($stafi->emri)) echo htmlspecialchars($stafi->emri); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni emrin.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="lastname">Mbiemri</label>
                                    <input type="text"  name="mbiemri" class="form-control" id="lastname"
                                           value="<?php if(!empty($stafi->mbiemri)) echo htmlspecialchars($stafi->mbiemri); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni mbiemrin.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           value="<?php if(!empty($stafi->email)) echo htmlspecialchars($stafi->email); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni email-in.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="tel">Telefoni</label>
                                    <input type="text" class="form-control" name="telefoni" id="tel" 
                                           value="<?php if(!empty($stafi->telefoni)) echo htmlspecialchars($stafi->telefoni); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni numrin e telefonit.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="roli">Roli</label>
                                    <select name="roli"  class="form-control" id="id" aria-describedby="adminTypeHelp" required>
                                            
                                            <option value="<?php echo $stafi->id ?>"><?php echo $stafi->roli?></option>
                                            <?php
                                                        if($stafi->roli==1){
                                                            ?>
                                                       <option value="">0</option>
                                                     <?php
                                                        }else{
                                                            ?>
                                                              <option value="">1</option>
                                                            <?php
                                                        }                                   
                                                ?>
                                        </select>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni rolin.
                                    </div>
                                </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="useri">Adresa</label>
                                        <input type="text" class="form-control" name="adresa" id="useri" 
                                               value="<?php if(!empty($stafi->adresa)) echo htmlspecialchars($stafi->adresa); ?>" required>
                                        <div class="invalid-feedback">
                                            Ju lutem plotësoni adresen.
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="password">Fjalekalimi</label>
                                    <input name="password" class="form-control" id="password" type="password" 
                                           value="<?php if(!empty($stafi->password)) echo htmlspecialchars($stafi->password); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni fjalekalimin.
                                    </div>
                                </div>
                            </div> -->
                                </div>
                            </div>
                     
                            <input type="submit" class="btn btn-primary w-100 " style="border-radius: 10px;" name="submit" value="Modifiko Stafin" class="btnSubmit">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}else{
    header('location:../dashboard/index.php');
}
?>
<?php
require_once("../../non-pages/footer.php")
?>