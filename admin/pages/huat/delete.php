
<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";

?>

<?php

include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');

$huate = new Admin\Lib\Huate();
if (isset($_REQUEST['empid'])) {
  $huate->setId($_REQUEST['empid']);
  $huate->delete();
  $session->message("Huaja u fshi me sukses!");
} else {
  $session->message("Huaja nuk fshi me sukses!");
  
}


?>