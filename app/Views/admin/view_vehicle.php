<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <div class="page-title">
        <div class="title_left">
            <h3>Tous les véhicules</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <hr>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
       aria-controls="collapseExample"> Ajouter un nouveau véhicule</a>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="collapse" id="collapseExample">

                <?php view('admin/partials/admin_vehicle_form.php'); ?>

            </div>
        </div>
    </div> <!-- /row -->

    <!-- all models -->
    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>All Car Models</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                           cellspacing="0" width="100%">
                        <?php
                        $fields = [
                            'Image',
                            'Marque',
                            'Modèle',
                            'Catégorie',
                            'Kilométrage',
                            'Statut',
                            'Action',
                            'Alerts',
                        ];
                        $header = '<th>' . implode('</th><th>', $fields) . '</th>';
                        ?>
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <?php echo $header ?>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <?php echo $header ?>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $now = new DateTime('now');

                        foreach ($vehicles as $vehicle) : ?>
                            <tr class="<?php if ($vehicle->status != "available") echo 'danger'; else echo 'success' ?>">
                                <td width="10"><a
                                            href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/mileage') ?>"
                                            title="Mettre à jour le kilométrage"><i class="fa fa-2x fa-wrench"></i></a>
                                </td>
                                <td width="10">
                                    <a href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/insurance_date') ?>"
                                       title="Mettre à jour date assurance"><i class="fa fa-2x fa-calendar"></i></a>

                                </td>
                                <td width="10">
                                    <a href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/last_control_at') ?>"
                                       title="Mettre à jour date de dernière visite"><i
                                                class="fa fa-2x fa-gear"></i></a>

                                </td>
                                <td width="100">
                                    <img class="img-responsive"
                                         src="<?php echo base_url('uploads/' . $vehicle->image); ?>"></td>
                                <td><?php echo $vehicle->manufacturer_name; ?></td>
                                <td><?php echo $vehicle->model_name; ?></td>
                                <td><?php echo $vehicle->category; ?></td>
                                <td><?php echo $vehicle->mileage; ?></td>

                                <td><?php echo ($vehicle->status == "available") ? 'Disponible' : 'Loué'; ?></td>
                                <td>
                                    <a class="btn btn-xs btn-primary col-sm-6"
                                       href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/show'); ?>">Voir</a>
                                    <a class="btn btn-xs btn-primary col-sm-6"
                                       href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/edit'); ?>">Editer</a>
                                    <?php if ($vehicle->status == "available") : ?>
                                        <?php echo form_open('admin/vehicles/sell/'); ?>
                                        <input type="hidden" name="vehicle_id"
                                               value="<?php echo $vehicle->vehicle_id; ?>">
                                        <button class="btn btn-xs btn-success" type="submit" name="btn-sell">Louer
                                        </button>
                                        </form>
                                    <?php endif ?>

                                    <?php if (session('type') == "admin") : ?>

                                        <?php echo form_open('admin/vehicles/deleteVehicle'); ?>
                                        <input type="hidden" name="vehicle_id"
                                               value="<?php echo $vehicle->vehicle_id; ?>">
                                        <button onclick="return confirm('Ce véhicule sera supprimé, continuer?')"
                                                class="btn btn-xs btn-danger col-sm-6" type="submit" name="btn-delete">
                                            Supprimer
                                        </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($vehicle->insurance_alert): ?>
                                        <a href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/insurance_date'); ?>"
                                           class="btn btn-xs btn-danger"
                                           title="cliquez ici pour mettre à jour date assurance">Rappel assurance</a>
                                    <?php endif; ?>

                                    <?php if ($vehicle->control_alert): ?>
                                        <a href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/last_control_at'); ?>"
                                           class="btn btn-xs btn-danger"
                                           title="cliquez ici pour mettre à jour la nouvelle date de la dernière visite">Rappel
                                            visite</a>
                                    <?php endif; ?>

                                    <?php if ($vehicle->oil_must_change): ?>
                                        <a href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/reset_mileage_counter') ?>"
                                           class="btn btn-xs btn-danger"
                                           title="cliquez ici pour ne plus voir cette alert">Rappel vidange</a>
                                    <?php endif; ?>

                                    <?php if ($vehicle->must_return && session('type') == "admin"): ?>
                                        <?php echo form_open('admin/vehicles/deleteReservation'); ?>
                                        <input type="hidden" name="c_id" value="<?php echo $vehicle->c_id; ?>">
                                        <input type="hidden" name="v_id" value="<?php echo $vehicle->vehicle_id; ?>">
                                        <input type="hidden" name="redirect" value="admin/vehicles">

                                        <button onclick="return confirm('Voulez vous supprimer la location associée à ce véhicule ?')"
                                                class="btn btn-xs btn-danger" type="submit" name="btn-delete">Rappel
                                            Retour
                                        </button>
                                        <?php echo form_close() ?>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
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
    <!-- <script src="<?php echo base_url("assets/vendors/datatables.net-scroller/js/datatables.scroller.min.js"); ?>"></script> -->
    <script src="<?php echo base_url("assets/vendors/jszip/dist/jszip.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/pdfmake.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/vendors/pdfmake/build/vfs_fonts.js"); ?>"></script>

    <script>
        $(document).ready(function () {
            var handleDataTableButtons = function () {
                if ($("#datatable-responsive").length) {
                    $("#datatable-responsive").DataTable({
                        "language": {
                            "url": "../assets/build/js/datatable.french.json"
                        },
                        aaSorting: [[0, 'desc']],

                        dom: "Blfrtip",
                        buttons: [
                            {
                                extend: "copy",
                                className: "btn-sm",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: "csv",
                                className: "btn-sm",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: "excel",
                                className: "btn-sm",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: "pdf",
                                className: "btn-sm",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: "print",
                                className: "btn-sm",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                        ],
                        responsive: true,
                    });
                }
            };

            TableManageButtons = function () {
                "use strict";
                return {

                    init: function () {
                        handleDataTableButtons();
                    }
                };
            }();

            TableManageButtons.init();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            jQuery('input.datepicker').datepicker({
                format: 'dd/mm/yyyy',
            });

            $("#parent_cat").change(function () {
                $(this).after();
                $.get('<?php echo base_url('controller_vehicle/getsub/'); ?>' + $(this).val(), function (data) {
                    $("#sub_cat").html(data);
                    $('#loader').slideUp(200, function () {
                        $(this).remove();
                    });
                });
            });

        });
    </script>
<?= $this->endsection() ?>