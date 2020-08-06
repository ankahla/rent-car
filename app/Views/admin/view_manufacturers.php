<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="page-title">
        <div class="title_left">
            <h3>Marques</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($manufacturers as $manufacturer): ?>
                        <tr>
                            <td><?php echo $manufacturer['manufacturer_name'] ?></td>
                            <td><?php echo $manufacturer['manufacturer_logo'] ?></td>
                            <th>
                                <a href="<?= base_url('admin/manufacturers/deleteManufacturer/'. $manufacturer['id'] ) ?>"
                                   class="btn btn-danger btn-xs" onclick=" return confirm('Are you sure to delete')">Supprimer</a>
                                <a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#form<?php echo $manufacturer['id'] ?>">Editer</a>
                                <div id="form<?php echo $manufacturer['id'] ?>" class="modal fade" tabindex="-1" role="dialog"
                                     aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <?php
                                                echo view(
                                                    'admin/partials/admin_manufacturer_form.php',
                                                    [
                                                        'manufacturer' => [
                                                            'id' => $manufacturer['id'],
                                                            'manufacturer_name' => $manufacturer['manufacturer_name']
                                                        ]
                                                    ]
                                                );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- /content -->
            </div><!-- /x-panel -->
        </div> <!-- /col -->

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter nouveau</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <?php echo form_open_multipart('admin/manufacturers/addManufacturer'); ?>
                    <fieldset>
                        <div class="form-group">
                            <label for="manufacturer_name"> Nom de la marque:</label>
                            <input class="form-control" name="manufacturer_name" id="manufacturer_name" type="text"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="manufacturer_logo">Logo</label>
                            <input type="file" class="form-control" name="manufacturer_logo" id="manufacturer_logo">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value="Ajouter">
                        </div>
                    </fieldset>
                    </form>

                </div> <!-- /content -->
            </div><!-- /x-panel -->
        </div> <!-- /col -->
    </div> <!-- /row -->
    </div>

    <div class="hidden">

    </div>
<?= $this->endSection() ?>