<?php
session_start();

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "bibloteka"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
?>

<?php
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['email'])){
   $email = $_POST['email'];

   $query = "select count(*) as cntUser from stafi where email='".$email."'";

   $result = mysqli_query($con,$query);
   $response = "<span style='color: green;'></span>";
   $vlera=0;
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<p style='color: red; font-size:12px;'>Email nuk eshte valid!</p>";
          $vlera=1;
         
      }
   }

   echo $response;
  
   die;
}