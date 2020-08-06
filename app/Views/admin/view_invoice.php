<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>


<div><a target="_blank" href="<?php echo base_url('admin/vehicles/'.$vehicle['c_id'].'/invoice/pdf'); ?>"><i
                class="fa fa-file-pdf-o"></i> Version pdf</a></div>
<?php echo $this->include('admin/partials/admin_invoice.php') ?>

<?= $this->endSection() ?>
