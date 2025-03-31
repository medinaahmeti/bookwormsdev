
<?php  

require_once('../autoloader.php');

use Admin\Lib\Stafi;
use Admin\Lib\Studentet;

$output = '';
if(isset($_POST["exportStudent"]))
{
    $studentet = new Studentet();
    $stafi = new Stafi();

  $output .= '
   <table class="table" border="1">  
                    <tr>  
                          <th>Id</th> 
                         <th>Stafi</th>  
                         <th>Emri</th>  
                        <th>Mbiemri</th>
                        <th>Telefoni</th>
                        <th>Adresa</th>
                    </tr>
  ';

    foreach($studentet->find_all() as $studenti){
      
    $stafi =$stafi->find_id($studenti->stafiId);

   $output .= '
    <tr>  
                        <td>'.$studenti->getId().'</td> 
                        <td>'.$stafi->getEmri().' '.$stafi->getMbiemri().'</td>  
                        <td>'.$studenti->getEmri().'</td> 
                        <td>'.$studenti->getMbiemri().'</td> 
                        <td>'.$studenti->getTelefoni().'</td> 
                        <td>'.$studenti->getAdresa().'</td> 
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=studentet.xls');
  echo $output;
 
}
?>
