<?php

use Admin\Lib\Stafi;
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/is_admin.php');
?>

<?php

$stafi = new Stafi;

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (isset($_POST['addstafi'])) {

  $stafi->emri=$_POST['emri'];
  $stafi->mbiemri=$_POST['mbiemri'];
  $stafi->adresa=$_POST['adresa'];
  $stafi->email=$_POST['email'];
  $stafi->telefoni=$_POST['telefoni'];
  $stafi->password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $stafi->roli=$_POST['roli'];

  

  if($stafi->user_exist($_POST['email'])){
    $session->message("Ky email është i zënë. Përdorni një email tjetër!");
    header("Location: stafi.php");

  }else{
  $stafi->create();
  
  $session->message("Stafi " . $stafi->emri." ".$stafi->mbiemri . " është shtuar me sukses!");
  header("Location: stafi.php");
  }

 ?>
 
 <meta http-equiv="refresh" content="0;url=stafi.php">
 <?php
}
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 bg-white p-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark pl-2">Stafi</h3>
        </div><!-- /.col -->
        <div class="col-sm-6 pr-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="../dashboard/index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="breadcrumb-item "><a href="stafi.php"> Stafi</a></li>
            <li class="breadcrumb-item active"> Shto stafin</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="card">
        <div class="card-body">
          <form class="needs-validation" name="registration" id="registration_form" method="post" role="form" novalidate>
            <fieldset class="card card-body mx-5">
              <legend class="h6 alert  text-center alert-secondary">Shto stafin</legend>
              
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="emri">Emri</label>
                  <input name="emri" class="form-control" id="emri" type="text" placeholder="" required>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni emrin.
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="mbiemri">Mbiemri</label>
                  <input name="mbiemri" class="form-control" id="mbiemri" type="text" placeholder="" required>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni mbiemrin.
                  </div>
                </div>
              </div>
              <div class="form-row">
               
                <div class="col-md-12 mb-3">
                  <label for="firstAddress">Adresa</label>
                  <input type="text" class="form-control" name="adresa" id="adresa" aria-describedby="firstAddressHelp" placeholder="" required>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni adresen.
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="state">Telefoni</label>
                  <input type="text" class="form-control" name="telefoni" id="telefoni" aria-describedby="stateHelp" placeholder="" required>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni telefoni.
                  </div>
                </div>
               

              </div>

              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="" required>
                  <div id="uname_response" style="position: absolute; top: 30px; left: 10px;"></div>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni email-in.
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="password">Fjalekalimi</label>
                  <input type="password" name="password" class="form-control" minlength="8" id="password" placeholder="" required>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni password.
                  </div>
                </div>
              </div>
              <div class="form-row">
              <div class="col-md-12 mb-3">
                  <label for="roli">Roli</label>
                  <select name="roli" id="" class="form-control" required>
                    <option value="">Zgjedh rolin</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                  </select>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni rolin.
                  </div>
                </div>
              </div>
             
            </fieldset>
            <fieldset style="margin:30px 0;" class="card card-body mx-5">
              <button class="btn btn-primary w-100 mt-4" id="emReg" name="addstafi" type="submit">Shto Stafin</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
require_once("../../non-pages/footer.php");

?>