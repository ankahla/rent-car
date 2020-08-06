<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="page-title">
        <div class="title_left">
            <h3>Mettre à jour la date de dernière visite</h3>
            <h4><?php echo $vehicle['manufacturer_name']; ?><?php echo $vehicle['model_name']; ?><?php echo $vehicle['category']; ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>

    <hr>

    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div>
            <?php echo form_open_multipart('admin/vehicles/' . $vehicle['v_id'] . '/last_control_at'); ?>
            <fieldset>

                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="last_control_at">Date dernière visite</label>
                        <input autocomplete="false" type="text" class="form-control datepicker"
                               value="<?php echo $vehicle['last_control_at'] ?>" name="last_control_at"
                               placeholder="Date dernière visite">
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