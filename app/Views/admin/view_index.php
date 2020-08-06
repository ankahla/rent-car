<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row tile_count">
                        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="glyphicon glyphicon-bed"></i> Total Véhicules </span>
                            <div class="count"><?php echo count($vehicles); ?></div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="glyphicon glyphicon-bed"></i> Véhicules réservés
                            <div class="count"><?php echo count($customers); ?></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="glyphicon glyphicon-bed"></i> Chiffre d'affaire ce mois-ci</span>
                            <div class="count">
                                <?php
                                $price = isset($graphData[$currentYear][date('m')]['gain']) ? $graphData[$currentYear][date('m')]['gain'] : 0;

                                ?>
                                <?= 'DT ' . number_format($price, 3) ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- /col -->
            </div> <!-- /row -->

            <div class="row">
                <div>
                    <div class="x_panel tile">
                        <div class="x_title">
                            <h2>Retour des véhicules (<?php echo count($vehiclesBack) ?>)</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table display">
                                <thead>
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
                                </thead>
                                <tbody>
                                <?php foreach ($vehiclesBack as $vehicle): ?>
                                    <?php
                                    $startDate = new DateTime($vehicle['w_start']);
                                    $endDate = new DateTime($vehicle['w_end']);
                                    ?>
                                    <tr>
                                        <td><?php echo "Nom: " . $vehicle['cf_name'] . " " . $vehicle['cl_name'] . "<br>Mobile: " . $vehicle['c_mobile']; ?></td>
                                        <td><?php echo $vehicle['manufacturer_name']; ?></td>
                                        <td><?php echo $vehicle['model_name']; ?></td>
                                        <td><?php echo number_format($vehicle['totalPrice'], 3) . ' DT' ?></td>
                                        <td><?php echo $startDate->format('d/m/Y'); ?></td>
                                        <td><?php echo $endDate->format('d/m/Y'); ?></td>

                                        <td><?php echo $vehicle['engine_no']; ?></td>
                                        <td>
                                            <?php echo form_open('admin/vehicles/deleteReservation'); ?>
                                            <input type="hidden" name="v_id"
                                                   value="<?php echo $vehicle['vehicle_id']; ?>">
                                            <input type="hidden" name="redirect" value="admin/dashboard">

                                            <button onclick="return confirm('Voulez vous supprimer la location associée à ce véhicule '.$vehicle['manufacturer_name'].' '.$vehicle['model_name'] . '?')"
                                                    class="btn btn-xs btn-danger" type="submit" name="btn-delete">
                                                Retourné
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <div class="x_panel tile">
                        <div class="x_title">
                            <h2>Nécessite un contrôle</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table display">
                                <thead>
                                <tr>
                                    <th>Marque</th>
                                    <th>Modèle</th>
                                    <th>Statut</th>
                                    <th>Date dernier contrôle</th>
                                    <th>Immatriculation</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($vehicles as $vehicle): ?>
                                    <?php
                                    if (!$vehicle->control_alert) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $vehicle->manufacturer_name; ?></td>
                                        <td><?php echo $vehicle->model_name; ?></td>
                                        <td><?php echo ($vehicle->status == "available") ? 'Disponible' : 'Loué'; ?></td>
                                        <td><?php echo $vehicle->last_control_at; ?></td>
                                        <td><?php echo $vehicle->engine_no; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/vehicles/'.$vehicle->vehicle_id.'/last_control_at'); ?>"
                                               class="btn btn-xs btn-danger"
                                               title="cliquez ici pour mettre à jour la nouvelle date de la dernière visite">Visite
                                                faite</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <div class="x_panel tile">
                        <div class="x_title">
                            <h2>Nécessite vidange</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table display">
                                <thead>
                                <tr>
                                    <th>Marque</th>
                                    <th>Modèle</th>
                                    <th>Statut</th>
                                    <th>Date dernier contrôle</th>
                                    <th>Immatriculation</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($vehicles as $vehicle): ?>
                                    <?php
                                    if (!$vehicle->oil_must_change) {
                                        continue;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $vehicle->manufacturer_name; ?></td>
                                        <td><?php echo $vehicle->model_name; ?></td>
                                        <td><?php echo ($vehicle->status == "available") ? 'Disponible' : 'Loué'; ?></td>
                                        <td><?php echo $vehicle->last_control_at; ?></td>
                                        <td><?php echo $vehicle->engine_no; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/vehicles/reset_mileage_counter/' . $vehicle->vehicle_id . '?redirect=admin/dashboard') ?>"
                                               class="btn btn-xs btn-danger"
                                               title="cliquez ici pour ne plus voir cette alert">Vidange faite</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="x_panel tile">
                        <div class="x_title">
                            <h2>Nombre de véhicules par marque</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php $subtotal = 0; ?>
                            <?php foreach ($manufacturers_group as $manufacturer) : ?>
                                <?php $subtotal += $manufacturer->total; ?>
                            <?php endforeach; ?>

                            <?php foreach ($manufacturers_group as $manufacturer) : ?>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span><?= $manufacturer->manufacturer_name; ?></span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width: <?php echo ($manufacturer->total / $subtotal) * 100; ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?= $manufacturer->total; ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <?php endforeach; ?>

                        </div> <!-- /content -->
                    </div> <!-- /panel -->
                </div> <!-- /col -->

                <div class="col-md-6 col-xs-12">
                    <div class="x_panel tile">
                        <div class="x_title">
                            <h2>Véhicules actuellement loués</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php $subtotal = 0; ?>
                            <?php foreach ($manufacturers_group_sold as $manufacturer) : ?>
                                <?php $subtotal += $manufacturer->total; ?>
                            <?php endforeach; ?>

                            <?php foreach ($manufacturers_group_sold as $manufacturer) : ?>
                                <div class="widget_summary">
                                    <div class="w_left w_25">
                                        <span><?= $manufacturer->manufacturer_name; ?></span>
                                    </div>
                                    <div class="w_center w_55">
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width: <?php echo ($manufacturer->total / $subtotal) * 100; ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w_right w_20">
                                        <span><?= $manufacturer->total; ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <?php endforeach; ?>

                        </div> <!-- /content -->
                    </div> <!-- /panel -->
                </div> <!-- /col -->
            </div><!-- /row -->

            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Session <?php echo $currentYear ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <canvas id="mybarChart"></canvas>
                        </div>
                    </div> <!-- /panel -->
                </div>
            </div><!-- /row -->
        </div>
<?= $this->endSection() ?>

<?= $this->section('javascripts') ?>
<?php
$gains = [];
$buyings = [];
for ($m = 1; $m <= 12; $m++) {
    $m = $m < 9 ? '0' . $m : '' . $m;
    $gains[] = isset($graphData[$currentYear][$m]['gain']) ? $graphData[$currentYear][$m]['gain'] : 0;
    $buyings[] = isset($graphData[$currentYear][$m]['buying']) ? $graphData[$currentYear][$m]['buying'] : 0;
}
?>
    <script>
        /*var graphData = <?php echo json_encode($graphData) ?>;*/
        // Bar chart
        var ctx = document.getElementById("mybarChart");
        var mybarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                datasets: [{
                    label: 'Achats DT',
                    backgroundColor: "#26B99A",
                    data: <?php echo json_encode($buyings) ?>
                }, {
                    label: 'Location DT',
                    backgroundColor: "#03586A",
                    data: <?php echo json_encode($gains) ?>
                }]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>

    <!-- <script type="text/javascript">
    PNotify.prototype.options.styling = "fontawesome";
    PNotify.prototype.options.type = "error";
      $(function(){
        new PNotify({
          title: 'Regular Notice',
          text: 'Check me out! I\'m a notice.'
        });
      });
    </script> -->
<?= $this->endSection() ?>