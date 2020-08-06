<?php
$session = \Config\Services::session();
$user = $session->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent a car</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet">
    <!--date picker -->
    <link href="<?php echo base_url("assets/datepicker3.css"); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.css"); ?>"/>
    <!-- Font Awesome -->
    <link href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- sweet-alert -->
    <link href="<?php echo base_url("assets/vendors/sweetalert/sweetalert.css"); ?>" rel="stylesheet">

    <link href="<?php echo base_url("assets/css/pnotify.css"); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?= base_url('admin/dashboard'); ?>" class="site_title"><i class="fa fa-paw"></i> <span>MAHDIA <font
                                    style="font-size:14px">RENT A CAR</font></span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?= base_url('assets/images/pp.svg'); ?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenue,</span>
                        <h2><?= $user['first_name']; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> Tableau de bord
                                </a></li>
                            <?php if ($user['type'] == "admin") : ?>
                                <li><a><i class="fa fa-edit"></i> Gérer utilisateurs <span
                                                class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url('admin/employee/add'); ?>">Nouveau</a></li>
                                        <li><a href="<?= base_url('admin/employee'); ?>">List</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a><i class="fa fa-desktop"></i>Marques &amp; Modèles <span
                                                class="fa fa-chevron-down"></span></a>

                                    <ul class="nav child_menu">
                                        <li><a href="<?php echo base_url('admin/manufacturers'); ?>">Gestion des
                                                marques</a></li>
                                        <li><a href="<?php echo base_url('admin/car_model'); ?>">Gestion des
                                                modèles</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li><a><i class="fa fa-table"></i> Véhicules <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= base_url('admin/vehicles'); ?>">Tous les véhicules</a></li>
                                    <li><a href="<?= base_url('admin/vehicles/newVehicle'); ?>">Ajouter nouveau</a></li>
                                    <li><a href="<?= base_url('admin/vehicles/soldlist'); ?>">Locations en cours</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-user"></i> Clients <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="<?= base_url('admin/customer'); ?>">Tous les clients</a></li>
                                    <li><a href="<?= base_url('admin/customer/add'); ?>">Ajouter un client</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!--             <div class="sidebar-footer hidden-small">
                              <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                              </a>
                            </div> -->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <?= $user['first_name']; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">

                                <li><a href="<?php echo base_url('logout'); ?>"><i
                                                class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <?= \Config\Services::validation()->listErrors('errors_list') ?>

            <?= $this->renderSection('content') ?>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?> "></script>
<!-- daterangepicker -->
<script src="<?php echo base_url("assets/vendors/moment/moment.js"); ?> "></script>
<script src="<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js"); ?> "></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js'); ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js'); ?>"></script>
<!-- sweetalert -->
<script src="<?php echo base_url('assets/vendors/sweetalert/sweetalert.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pnotify.js'); ?>"></script>
<!-- Chart.js -->
<script src="<?php echo base_url('assets/js/Chart.min.js'); ?>"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<script src="<?php echo base_url("assets/bootstrap-datepicker.js"); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {

        jQuery('input.datepicker').datepicker({
            format: 'dd/mm/yyyy',
        }).on('changeDate', function (ev) {
            $(this).datepicker("hide");
        });;

        $('input.dateRangePicker').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePickerIncrement: 15,
                timePicker24Hour: true,
                locale: {
                    format: 'DD/MM/YYYY HH:mm'
                }
            },
            function (start, end, label) {
                console.log(start, end, label);
            });
    });
</script>

<?php if ($session->get('message') != NULL) : ?>
    <script>
        swal({
            title: "Success",
            text: "<?php echo $session->get('message') ?>",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });
    </script>
<?php endif ?>
<?= $this->renderSection('javascripts') ?>
</body>
</html>

