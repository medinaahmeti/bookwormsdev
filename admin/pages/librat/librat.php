<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');
include_once('../../non-pages/is_admin_or_staf.php');

?>

<div class="content-wrapper" style="min-height: 80%!important;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 bg-white p-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark pl-2">Librat</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 pr-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="../../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Librat</li>
                        <li class="breadcrumb-item active">Lista e librave</li>
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
                    <form  method="post" action="">
                       
                        <div class="card p-3">
                            <!-- /.card-header -->
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover tblListForm" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kategoria</th>
                                            <th>Titulli</th>
                                            <th>Autori</th>
                                            <!-- <th>Foto</th> -->
                                            <th>ISBN</th>
                                            <th>Rafti</th>
                                            <th>Vendi i botimit</th>
                                            <th>Faqet</th>
                                            <th>Signatura</th>
                                            <th>Data e botimit</th>
                                            <th>Modifiko</th>
                                            <th>Fshij</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        $librat = new Admin\Lib\Librat();
                                        $kategorite = new \Admin\Lib\Kategorite();
                                        foreach ($librat->find_all() as $l) { 
                                            if($_SESSION['user_id'] == $l->stafiId || $_SESSION['roli'] == 1){
                                            ?>
                                            <tr>
                                                <td><?php $kategoria = $kategorite->find_id($l->getKategoriaId()); 
                                                     echo htmlspecialchars($kategoria->getEmri()); ?></td>
                                                <td><?php echo htmlspecialchars($l->getTitulli()); ?></td>
                                                <td><?php echo htmlspecialchars($l->getAutori()); ?> </td>
                                                <!-- <td><?php// echo htmlspecialchars($l->getFoto()); ?> </td> -->
                                                <td><?php echo htmlspecialchars($l->getIsbn()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getRafti()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getVendiBotimit()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getFaqet()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getSignatura()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getDataEPublikimit()); ?></td>
                                                <?php
                                               echo "<td class='text-center'><a style='text-decoration:none;' href='modifiko.php?id=" . $l->getId() . "'><i class='fas fa-edit mr-2'></i> </a></td>";
                                               
                                                ?>
                                                  <td class="text-center">
                                            <a class="delete" data-emp-id="<?php echo $l->getId(); ?>"
                                                href="javascript:void(0);" style="color:red;">
                                                <i class="far fa-trash-alt"></i> </a> </td>
                                            </tr>
                                        <?php }
                                        else{
                                            ?>
                                            <tr>
                                                <td><?php $kategoria = $kategorite->find_id($l->getKategoriaId()); 
                                                     echo htmlspecialchars($kategoria->getEmri()); ?></td>
                                                <td><?php echo htmlspecialchars($l->getTitulli()); ?></td>
                                                <td><?php echo htmlspecialchars($l->getAutori()); ?> </td>
                                                <!-- <td><?php// echo htmlspecialchars($l->getFoto()); ?> </td> -->
                                                <td><?php echo htmlspecialchars($l->getIsbn()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getRafti()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getVendiBotimit()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getFaqet()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getSignatura()); ?> </td>
                                                <td><?php echo htmlspecialchars($l->getDataEPublikimit()); ?></td>
                                                <?php
                                               echo "<td class='text-center'><a style='text-decoration:none;'><i class='fas fa-ban mr-2'></i> </a></td>";
                                                ?>
                                                <td class="text-center"><a class="delete"> <i class="fas fa-ban"></i> </a> </td>
                                            </tr>
                                            <?php
                                        } 
                                    }?>
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
            message: "A jeni të sigurt që dëshironi ta fshini librin?",
            title: "<i class='far fa-trash-alt' style='color:red;'></i><span style='color:black;margin-left:5px; font-weight:500;'> Fshirja e Librit</span>",
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
