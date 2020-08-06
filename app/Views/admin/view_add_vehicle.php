<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-title">
    <div class="title_left">
        <h3>Ajouter un nouveau véhicule</h3>
    </div>
</div>
<div class="clearfix"></div>

<hr>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php echo $this->include('admin/partials/admin_vehicle_form.php'); ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('javascripts') ?>

<script src="<?php echo base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jszip.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/pdfmake/build/pdfmake.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/pdfmake/build/vfs_fonts.js"); ?>"></script>

<?= $this->endSection() ?>
