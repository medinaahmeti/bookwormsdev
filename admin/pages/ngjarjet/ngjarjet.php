<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 bg-white p-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark pl-2">Ngjarjet</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 pr-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="../../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Ngjarjet</li>
                        <li class="breadcrumb-item active">Lista e ngjarjeve</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <?php if (!empty($session->message)) : ?>
                    <div class="alert alert-success" id="remove">
                        <?php echo $session->message;  ?>
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION['message']); ?>

                <div class="card-body">
                    <div class="mesazhi" id="remove"></div>
                    <form  method="post" action="">
                       
                        <div class="card p-3">
                            <!-- /.card-header -->
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover tblListForm" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Stafi</th>
                                            <th>Titulli</th>
                                            <th>Përmbajtja</th>
                                            <th>Ora</th>
                                            <th>Data</th>
                                            <th>Modifiko</th>
                                            <th>Fshij</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        $ngjarjet = new Admin\Lib\Ngjarjet();
                                        $stafi =new \Admin\Lib\Stafi();
                                        foreach ($ngjarjet->find_all() as $n) { 
                                            if($_SESSION['roli'] == 0 || $_SESSION['roli']==1){
                                               
                                            ?>
                                            <tr>
                                                <td><?php $staf = $stafi->find_id($n->getStafiId()); 
                                                     echo htmlspecialchars($staf->getEmri() . ' '. $staf->getMbiemri()); ?></td>
                                                <td><?php echo htmlspecialchars($n->getTitulli()); ?> </td>
                                                <td><?php echo htmlspecialchars($n->getPermbajtja()); ?> </td>
                                                <td><?php echo htmlspecialchars($n->getOra()); ?></td>
                                                <td><?php echo htmlspecialchars($n->getData()); ?></td>
                                                <?php
                                               echo "<td class='text-center'><a style='text-decoration:none;' href='modifiko.php?id=" . $n->getId() . "'><i class='fas fa-edit mr-2'></i> </a></td>";
                                               
                                                ?>
                                                  <td class="text-center">
                                            <a class="delete" data-emp-id="<?php echo $n->getId(); ?>"
                                                href="javascript:void(0);" style="color:red;">
                                                <i class="far fa-trash-alt"></i> </a> </td>
                                            </tr>
                                        <?php } 
                                                                                   
                                       
                                    ?>
                                     
                                            <?php
                                       
                                    }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once("../../non-pages/footer.php")
?>

<!-- //Delete me ajax -->

<script>
$(document).ready(function() {
    $('.delete').click(function(e) {
        e.preventDefault();
        var empid = $(this).attr('data-emp-id');
        var parent = $(this).parent("td").parent("tr");
        bootbox.dialog({
            message: "A jeni të sigurt që dëshironi ta fshini ngjarjen?",
            title: "<i class='far fa-trash-alt' style='color:red;'></i><span style='color:black;margin-left:5px; font-weight:500;'> Fshirja e Ngjarjes</span>",
            buttons: {
                danger: {
                    label: "Po",
                    className: "btn-danger px-4",
                    callback: function() {
                        $.ajax({
                                type: 'POST',
                                url: 'delete.php',
                                data: 'empid=' + empid
                            })
                            .done(function(response) {
                                window.location.reload(true);
                                $('#message').show();
                            })
                            .fail(function() {
                                bootbox.alert('Error....');
                            })
                    }
                },
                success: {
                    label: "Jo",
                    className: "btn-primary px-4",
                    callback: function() {
                    }
                }
            }
        });
    });
});

setTimeout(function() {
    $('#remove').remove();
}, 8000);


</script>
