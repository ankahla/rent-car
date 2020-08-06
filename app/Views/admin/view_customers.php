<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <div class="page-title">
        <div class="title_left">
            <h3>Clients</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Clients</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped">
                        <thead>
                        <tr>
                            <th>
                                Nom
                            </th>
                            <th>
                                Mobile
                            </th>
                            <th>
                                Adresse
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($customers as $customer): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo base_url('admin/customer/' . $customer['c_id'] . '/show'); ?>"><?php echo $customer['cf_name'] ?> <?php echo $customer['cl_name'] ?></a>
                                </td>
                                <td><?php echo $customer['c_mobile'] ?></td>
                                <td><?php echo $customer['c_address'] ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/customer/' . $customer['c_id'] . '/show'); ?>"
                                       class="btn btn-primary btn-xs">Voir</a>
                                    <a href="<?php echo base_url('admin/customer/' . $customer['c_id'] . '/edit'); ?>"
                                       class="btn btn-primary btn-xs">Editer</a>
                                    <a onclick="return confirm('êtes vous sûr de vouloir supprimer ce client, continuer?')"
                                       href="<?php echo base_url('admin/customer/' . $customer['c_id'] . '/delete'); ?>"
                                       class="btn btn-danger btn-xs">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>
                                Nom
                            </th>
                            <th>
                                Mobile
                            </th>
                            <th>
                                Adresse
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div> <!-- /content -->
            </div><!-- /x-panel -->
        </div> <!-- /col -->
    </div> <!-- /row -->

    <script src="<?php echo base_url("assets/bootstrap-datepicker.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"); ?>"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#datatable-responsive').dataTable({
                "language": {
                    "url": "../assets/build/js/datatable.french.json"
                }
            });
        });
    </script>
<?= $this->endSection() ?>