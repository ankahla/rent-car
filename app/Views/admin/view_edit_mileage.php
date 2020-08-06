<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="page-title">
        <div class="title_left">
            <h3>Mettre à jour le kilométrage</h3>
            <h4><?php echo $vehicle['manufacturer_name']; ?><?php echo $vehicle['model_name']; ?><?php echo $vehicle['category']; ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>

    <hr>

    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div>
            <?php echo form_open_multipart('admin/vehicles/' . $vehicle['v_id'] . '/mileage'); ?>
            <fieldset>

                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="mileage">Kilométrage:</label>
                        <input type="text" step="any" class="form-control" name="mileage"
                               value="<?php echo $vehicle['mileage'] ?>" placeholder="Kilométrage(km)" required>
                    </div>
                </div>

                <br>
                <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Mettre à jour"/>

            </fieldset>
            </form>
            <br>
        </div>
    </div> <!-- /row -->


<?= $this->endSection() ?>