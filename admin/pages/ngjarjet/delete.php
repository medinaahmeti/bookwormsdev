
<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>
<?php

$ngjarjet = new Admin\Lib\Ngjarjet();
if (isset($_REQUEST['empid'])) {
  $ngjarjet->setId($_REQUEST['empid']);
  $ngjarjet->delete();
  $session->message("Ngjarja u fshi me sukses!");
} else {
 $session->message("Ngjarja nuk fshi me sukses!");
  
}


?>