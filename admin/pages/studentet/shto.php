<?php

use Admin\Lib\Studentet;
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>

<?php
$stafi = new \Admin\Lib\Stafi();

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$student = new \Admin\Lib\Studentet();
if (isset($_POST['btnSave'])) {
     $student->nr_serik=$_POST['nr_serik'];
    $student->emri=$_POST['emri'];
    $student->mbiemri=$_POST['mbiemri'];
    $student->adresa=$_POST['adresa'];
    $student->email=$_POST['email'];
    $student->telefoni=$_POST['telefoni'];
    $student->stafiId=$_SESSION['user_id'];
    $student->password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $student->roli= 2;
  

    if($student->user_exist($_POST['email'])){
        $session->message("Ky email është i zënë. Përdorni një email tjetër!");
        header("Location: studentet.php");
    
      }else{
      $student->create();
      
      $session->message("Studenti " . $student->emri." ".$student->mbiemri . " është shtuar me sukses!");
      header("Location: studentet.php");
      }
    
}
 
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 bg-white p-2">
        <div class="col-sm-6">
          <h3 class="m-0 text-dark pl-2">Studentët</h3>
        </div><!-- /.col -->
        <div class="col-sm-6 pr-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item "><a href="../dashboard/index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li class="breadcrumb-item "><a href="studentet.php"> Studentët</a></li>
            <li class="breadcrumb-item active"> Shto studentin</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="card">
        <div class="card-body">
            <form class="needs-validation" name="registration" enctype="multipart/form-data" id="registration_form"  method="post" role="form" novalidate>
          
                <legend class="h6 alert  text-center alert-secondary">Shto studentin</legend>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="nr_serik">Nr. rendor</label>
                        <input type="number" class="form-control" id="nr_serik" minlength="1" name="nr_serik"  required>
                        <div class="invalid-feedback">
                            Ju lutem plotësoni numrin rendor.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="name">Emri</label>
                        <input type="text" class="form-control" id="name" minlength="1" name="emri"  required>
                        <div class="invalid-feedback">
                            Ju lutem plotësoni emrin.
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="lastname">Mbiemri</label>
                        <input type="text"  name="mbiemri" class="form-control" id="mbiemri" required>
                        <div class="invalid-feedback">
                            Ju lutem plotësoni mbiemrin.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <div class="invalid-feedback">
                            Ju lutem plotësoni email-in.
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="tel">Telefoni</label>
                        <input type="text" class="form-control" name="telefoni" id="tel" required>
                        <div class="invalid-feedback">
                            Ju lutem plotësoni numrin e telefonit.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="adresa">Adresa</label>
                        <input name="adresa" class="form-control" id="adresa" type="text" required>
                        <div class="invalid-feedback">
                            Ju lutem plotësoni adresën.
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                  <label for="password">Fjalekalimi</label>
                  <input type="password" name="password" class="form-control" minlength="8" id="password" placeholder="" required>
                  <div class="invalid-feedback">
                    Ju lutem plotësoni fjalëkalimin.
                  </div>
                </div>
                    
                </div>
                            <button class="btn btn-primary w-100 mt-4" name="btnSave" type="submit">Shto Student</button>
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