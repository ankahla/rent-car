<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Employees</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Manage Employees (you can't update/delete these 2 users ;) )</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <tr>
                            <th>
                                Employee Id
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Mobile
                            </th>

                            <th>
                                Position
                            </th>
                            <th>
                                Gender
                            </th>
                            <th>
                                Access
                            </th>
                            <th colspan="2">
                                Actions
                            </th>
                        </tr>
                        <?php foreach ($employees as $emp): ?>
                            <tr>
                                <td><?php echo $emp->id ?></td>
                                <td><?php echo $emp->first_name ?><?php echo $emp->last_name ?></td>
                                <td><?php echo $emp->email ?></td>
                                <td><?php echo $emp->mobile ?></td>
                                <td><?php echo $emp->position ?></td>
                                <td><?php echo $emp->gender ?></td>
                                <td><?php echo $emp->type ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/employee/' . $emp->id . '/edit'); ?>"
                                       class="btn btn-primary btn-xs">Edit</a>
                                    <?php if (1 != $emp->su): ?>
                                    <a onclick="return confirm('All records will be deleted, continue?')"
                                       href="<?php echo base_url('admin/employee/' . $emp->id . '/delete'); ?>"
                                       class="btn btn-danger btn-xs">Delete</a>
                                       <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div> <!-- /content -->
            </div><!-- /x-panel -->
        </div> <!-- /col -->
    </div> <!-- /row -->
</div>

<?= $this->endSection() ?>
