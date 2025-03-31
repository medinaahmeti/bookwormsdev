<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');

$student = new \Admin\Lib\Studentet();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if ($_GET['id']) {
    $student=$student->find_id($_GET['id']);
}

if (isset($_POST["submitProfile"]) ) {
    
      $student->setEmri($_POST['emri']);
       $student->setNrSerik($_POST['nr_serik']);
      $student->setMbiemri($_POST['mbiemri']);
      $student->setAdresa($_POST['adresa']);
      $student->setEmail($_POST['email']);
      $student->setTelefoni($_POST['telefoni']);
      $student->setPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
      
     
      $student->update();
      $session->message("Profili është modifikuar me sukses!");
      header('location: ../dashboard/index.php');
   
}
?>

<html>
<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4 bg-white p-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark pl-2">Profili</h3>
          </div><!-- /.col -->
          <div class="col-sm-6 pr-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="../dashboard/index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
              <li class="breadcrumb-item ">Studentët</li>
              <li class="breadcrumb-item active"> Profili </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="d-flex justify-content-center">
        <form class="needs-validation w-50 " name="registration" id="registration_form" method="post" role="form"  novalidate>
          <div class="row">

              <div class="col-md-12 p-2 ">
                <div class="m-2 p-2 bg-light">
                    
                  <div class="form-row">
                                 <div class="col-md-12 mb-3">
                                    <label for="nr_serik">Nr. rendor</label>
                                    <input type="number" class="form-control" id="nr_serik" minlength="1" name="nr_serik"
                                           value="<?php if(!empty($student->nr_serik)) echo htmlspecialchars($student->nr_serik); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni nr. rendor.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="name">Emri</label>
                                    <input type="text" class="form-control" id="name" minlength="1" name="emri"
                                           value="<?php if(!empty($student->emri)) echo htmlspecialchars($student->emri); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni emrin.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="lastname">Mbiemri</label>
                                    <input type="text"  name="mbiemri" class="form-control" id="lastname"
                                           value="<?php if(!empty($student->mbiemri)) echo htmlspecialchars($student->mbiemri); ?>"  required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni mbiemrin.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           value="<?php if(!empty($student->email)) echo htmlspecialchars($student->email); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni email-in.
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="tel">Telefoni</label>
                                    <input type="text" class="form-control" name="telefoni" id="tel" 
                                           value="<?php if(!empty($student->telefoni)) echo htmlspecialchars($student->telefoni); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni numrin e telefonit.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                               
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="useri">Adresa</label>
                                        <input type="text" class="form-control" name="adresa" id="useri" 
                                               value="<?php if(!empty($student->adresa)) echo htmlspecialchars($student->adresa); ?>" required>
                                        <div class="invalid-feedback">
                                            Ju lutem plotësoni adresën.
                                        </div>
                                    </div>
                                </div>
                                                           
                                <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="password">Fjalekalimi</label>
                                    <input name="password" class="form-control" id="password" type="password"  minlength="8"
                                           value="<?php if(!empty($student->password)) echo htmlspecialchars($_SESSION['password']); ?>" required>
                                    <div class="invalid-feedback">
                                        Ju lutem plotësoni fjalëkalimin.
                                    </div>
                                </div>
                            </div>
                           
                            </div>
                            
                     
                            <input type="submit" class="btn btn-primary w-100 " style="border-radius: 10px;" name="submitProfile" value="Ruaj ndryshimet" class="btnSubmit">
                        
                    </div>
                </form>
                  </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once("../../non-pages/footer.php")
?>