
<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>
<?php

$libri = new Admin\Lib\Librat();
if (isset($_REQUEST['empid'])) {
  $libri->setId($_REQUEST['empid']);
  $libri->delete();
  $session->message("Libri u fshi me sukses!");
} else {
  $session->message("Libri nuk fshi me sukses!");
}


?>