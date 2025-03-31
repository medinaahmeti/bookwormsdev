<?php

if (!isset($_SESSION['user_id']) || (($_SESSION['roli']) != 1)) {
    header('location:../dashboard/index.php');
  }

  ?>