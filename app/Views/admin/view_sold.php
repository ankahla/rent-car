<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-title">
    <div class="title_left">
        <h3>Locations en cours</h3>
    </div>
</div>
<div class="clearfix"></div>

<hr>
<!-- all models -->
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tous les modèles</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div style="padding-left: 25%">
                    <div style="display:inline">Filtrer par date</div>
                    <div class="input-append date datepicker inline" id="datepicker"
                         style="margin:0px;padding:0px;display:inline">
                        <input type="text" class="datepicker input-small validation rightBorderNone otherTabs"
                               id="fromDate" name="displayDate" placeholder="De" data-format="dd/mm/yyyy"/>
                        <button class="btn leftBorderNone" type="button"><i class="glyphicon glyphicon-calendar"></i>
                        </button>
                    </div>
                    <div class="input-append date datepicker inline" id="datepicker"
                         style="margin:0px;padding:0px;padding-left:4px;;display:inline">
                        <input type="text" placeholder="À"
                               class="datepicker input-small validation rightBorderNone otherTabs" id="toDate"
                               name="displayDate"/>
                        <button class="btn leftBorderNone" type="button"><i class="glyphicon glyphicon-calendar"></i>
                        </button>
                    </div>
                </div>


                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Marque<br></th>
                        <th>Modèle<br></th>
                        <th>Prix</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Immatriculation</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Client</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Prix</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Immatriculation</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($cus as $vehicle) {
                        $startDate = new DateTime($vehicle['w_start']);
                        $endDate = new DateTime($vehicle['w_end']);
                        ?>

                        <td><?php echo "Nom: " . $vehicle['cf_name'] . " " . $vehicle['cl_name'] . "<br>Mobile: " . $vehicle['c_mobile']; ?></td>
                        <td><?php echo $vehicle['manufacturer_name']; ?></td>
                        <td><?php echo $vehicle['model_name']; ?></td>
                        <td><?php echo number_format($vehicle['totalPrice'], 3) . ' DT' ?></td>
                        <td><?php echo $startDate->format('d/m/Y H:i'); ?></td>
                        <td><?php echo $endDate->format('d/m/Y H:i'); ?></td>

                        <td><?php echo $vehicle['engine_no']; ?></td>
                        <td>
                            <?php if (session('type') == "admin") : ?>
                                <?php echo form_open('admin/vehicles/deleteReservation'); ?>
                                <input type="hidden" name="c_id" value="<?php echo $vehicle['c_id']; ?>">
                                <input type="hidden" name="v_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                                <button onclick="return confirm('Cette location sera supprimé, continue?')"
                                        class="btn btn-xs btn-danger" type="submit" name="btn-delete">Supprimer
                                </button>
                                </form>
                            <?php endif; ?>
                            <a href="<?php echo base_url('admin/vehicles/'.$vehicle['c_id'].'/invoice/html'); ?>"
                               class="btn btn-primary btn-xs">Voir facture</a>
                            <a target="_blank"
                               href="<?php echo base_url('admin/vehicles/'.$vehicle['c_id'].'/invoice/pdf'); ?>"
                               class="btn btn-primary btn-xs"><i class="fa fa-file-pdf-o"></i></a>
                        </td>

                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div> <!-- /content -->
        </div><!-- /x-panel -->
    </div> <!-- /col -->
</div> <!-- /row -->
<?= $this->endSection() ?>

<?= $this->section('javascripts') ?>

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
<script src="<?php echo base_url("assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/jszip/dist/jszip.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/pdfmake/build/pdfmake.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/vendors/pdfmake/build/vfs_fonts.js"); ?>"></script>

<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-responsive").length) {
                $("#datatable-responsive").DataTable({
                    "language": {
                        "url": "<?php base_url('assets/build/js/datatable.french.json') ?>"
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
            } else {

                $(document).ready(function () {
                    $('#datatable-responsive').DataTable({
                        initComplete: function () {
                            this.api().columns([2, 3]).every(function () {
                                var column = this;
                                var select = $('<select><option value=""></option></select>')
                                    .appendTo($(column.header()))
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                        );

                                        column
                                            .search(val ? '^' + val + '$' : '', true, false)
                                            .draw();
                                    });

                                column.data().unique().sort().each(function (d, j) {
                                    if (column.search() === '^' + d + '$') {
                                        select.append('<option value="' + d + '" selected="selected">' + d + '</option>')
                                    } else {
                                        select.append('<option value="' + d + '">' + d + '</option>')
                                    }
                                });
                            });
                        }
                    });
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


    $(function () {

        $(document).on('change', '#fromDate, #toDate', function () {
            $('#datatable-responsive').dataTable().DataTable().draw();
        });

    });

    function stringToDate(dateString)
    {
        if (dateString !== '') {
            var parts = (dateString.split(' '))[0].split("/");

            return new Date(parts[2], parts[1] - 1, parts[0], 0, 0, 0, 0);
        }

        return null;
    }

    $.fn.dataTableExt.afnFiltering.push(
        function (oSettings, aData, iDataIndex) {
            let from = $('#fromDate');
            let to = $('#toDate');

            if ((from.size() > 0 && from.val() !== '') || (to.size() > 0 && to.val() !== '')) {
                let min = stringToDate(from.val());
                let max = stringToDate(to.val());

                let iDate = stringToDate(aData[5]);

                if (min === null && max === null) {
                    return true;
                } else if (min === null && iDate < max) {
                    return true;
                } else if (max === null && iDate >= min) {
                    return true;
                } else if (min <= iDate && iDate <= max) {
                    return true;
                }

                return false;
            }

            return true;
        });
</script>
<?= $this->endSection() ?>
