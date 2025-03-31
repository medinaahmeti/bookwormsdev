<?php
session_start();

include "../../non-pages/header.php";
include "../../non-pages/aside.php";
include_once('../../non-pages/urlQasja.php');

?>

<div class="content-wrapper " style="min-height: 80%!important;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 bg-white p-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark pl-2">Huatë</h3>
                </div><!-- /.col -->
                <div class="col-sm-6 pr-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="../../../index.php"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Huatë</li>
                        <li class="breadcrumb-item active">Lista e huave</li>
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
                    <form method="post" action="">

                        <div class="card p-3">
                            <!-- /.card-header -->
                            <div class="table-responsive">

                                <?php
                                $huate = new Admin\Lib\Huate();
                                $student = new \Admin\Lib\Studentet();
                                $stafi = new \Admin\Lib\Stafi();
                                $librat = new \Admin\Lib\Librat();
                                ?>

                                <?php

                                if ($_SESSION['roli'] == 0 || $_SESSION['roli'] == 1) {
                                ?>

                                    <table id="example1" class="table table-bordered table-hover tblListForm" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th>Nr. serik i std.</th>
                                                <th>Studenti</th>
                                                <th>Stafi</th>
                                                <th>Libri</th>
                                                <th>Data e marrjes</th>
                                                <th>Data e kthimit</th>
                                                <th>Statusi</th>
                                                <th>Modifiko</th>
                                                <th>Fshij</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($huate->find_all() as $h) {
                                            ?>

                                                <tr>
                                                    <td>
                                                        <?php
                                                        $studenti = $student->find_id($h->getStudentiId());
                                                        echo htmlspecialchars($studenti->getNrSerik());
                                                        ?>
                                                    </td>
                                                    <td><?php $studenti = $student->find_id($h->getStudentiId());
                                                        echo htmlspecialchars($studenti->getEmri() . ' ' . $studenti->getMbiemri()); ?>
                                                    </td>
                                                    <td><?php $staf = $stafi->find_id($h->getStafiId());
                                                        echo htmlspecialchars($staf->getEmri() . ' ' . $staf->getMbiemri()); ?>
                                                    </td>
                                                    <td><?php $libri = $librat->find_id($h->getLibriId());
                                                        echo htmlspecialchars($libri->getTitulli()); ?></td>
                                                    <td><?php echo htmlspecialchars($h->getDataEMarrjes()); ?> </td>
                                                    <td><?php echo htmlspecialchars($h->getDataEKthimit()); ?></td>
                                                    <th class="statusi"><?php echo htmlspecialchars($h->getStatusi()); ?></th>
                                                    <?php
                                                    echo "<td class='text-center'><a style='text-decoration:none;' href='modifiko.php?id=" . $h->getId() . "'><i class='fas fa-edit mr-2'></i> </a></td>";

                                                    ?>
                                                    <td class="text-center">
                                                        <a class="delete" data-emp-id="<?php echo $h->getId(); ?>" href="javascript:void(0);" style="color:red;">
                                                            <i class="far fa-trash-alt"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                ?>

                                    <table id="example1" class="table table-bordered table-hover tblListForm" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Stafi</th>
                                                <th>Libri</th>
                                                <th>Data e marrjes</th>
                                                <th>Data e kthimit</th>
                                                <th>Statusi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $huate = new Admin\Lib\Huate();
                                            $student = new \Admin\Lib\Studentet();
                                            $stafi = new \Admin\Lib\Stafi();
                                            $librat = new \Admin\Lib\Librat();
                                            $me = $_SESSION['user_id'];
                                            foreach ($huate->find_huat_studentid($me) as $h) {
                                            ?>
                                                <tr>
                                                    <td><?php $staf = $stafi->find_id($h->stafiId);
                                                        echo htmlspecialchars($staf->getEmri() . ' ' . $staf->getMbiemri()); ?>
                                                    </td>
                                                    <td><?php $libri = $librat->find_id($h->libriId);
                                                        echo htmlspecialchars($libri->getTitulli()); ?></td>
                                                    <td><?php echo htmlspecialchars($h->dataEMarrjes); ?> </td>
                                                    <td><?php echo htmlspecialchars($h->dataEKthimit); ?></td>
                                                    <th class="statusi"><?php echo htmlspecialchars($h->statusi); ?></th>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                }
                                ?>

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
                message: "A jeni të sigurt që dëshironi ta fshini huanë?",
                title: "<i class='far fa-trash-alt' style='color:red;'></i><span style='color:black;margin-left:5px; font-weight:500;'> Fshirja e Huasë</span>",
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
                        callback: function() {}
                    }
                }
            });
        });
    });

    setTimeout(function() {
        $('#remove').remove();
    }, 8000);
</script>