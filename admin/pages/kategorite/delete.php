
<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";

?>

<?php

include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');

$kategorite = new Admin\Lib\Kategorite();
if (isset($_REQUEST['empid'])) {
  $kategorite->setId($_REQUEST['empid']);
  $kategorite->delete();
  $session->message("Kategoria u fshi me sukses!");
} else {
  $session->message("Kategoria nuk fshi me sukses!");
  
}


?>