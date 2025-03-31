
<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/is_admin.php');
?>
<?php

$stafi = new Admin\Lib\Stafi();
if (isset($_REQUEST['empid'])) {
  $stafi->setId($_REQUEST['empid']);
  $stafi->delete();
  $session->message("Stafi u fshi me sukses!");
} else {
  $session->message("Stafi nuk fshi me sukses!");
  
}


?>