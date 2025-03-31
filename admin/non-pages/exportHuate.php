
<?php  

require_once('../autoloader.php');

use Admin\Lib\Huate;
use Admin\Lib\Librat;
use Admin\Lib\Stafi;
use Admin\Lib\Studentet;


$output = '';
if(isset($_POST["exportHuate"]))
{
    $studentet = new Studentet();
    $stafi = new Stafi();
    $huate = new Huate();
    $libri = new Librat();


  $output .= '
   <table class="table" border="1">  
            <tr>  
            <th>Id</th>
            <th>Libri</th>  
            <th>Stafi</th>  
            <th>Studenti</th>  
            <th>Data e marrjes</th>
            <th>Data e kthimit</th>
            <th>Statusi</th>
            </tr>
  ';

    foreach($huate->find_all() as $huaja){
      
    $stafi =$stafi->find_id($huaja->stafiId);
    $libri =$libri->find_id($huaja->libriId);
    $studentet =$studentet->find_id($huaja->studentiId);

   $output .= '
    <tr>  
                        <td>'.$huaja->getId().'</td> 
                        <td>'.$libri->getTitulli().'</td> 
                        <td>'.$stafi->getEmri().' '.$stafi->getMbiemri().'</td> 
                        <td>'.$studentet->getEmri().' '.$studentet->getMbiemri().'</td>  
                        <td>'.$huaja->getDataEMarrjes().'</td> 
                        <td>'.$huaja->getDataEKthimit().'</td> 
                        <td>'.$huaja->getStatusi().'</td> 
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=huate.xls');
  echo $output;
 
}
?>
