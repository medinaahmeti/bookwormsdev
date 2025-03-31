<?php

if (!isset($_SESSION['user_id']) || ((($_SESSION['roli']) != 1) && ($_SESSION['roli']) != 0)) {
  header('location:../dashboard/index.php');
}

  ?>