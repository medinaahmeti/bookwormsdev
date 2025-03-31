
<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>
<?php

$student = new Admin\Lib\Studentet();
if (isset($_REQUEST['empid'])) {
  $student->setId($_REQUEST['empid']);
  $student->delete();
  $session->message("Studenti u fshi me sukses!");
} else {
  $session->message("Studenti nuk fshi me sukses!");
  
}


?>