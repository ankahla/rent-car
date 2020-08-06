<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="page-title">
        <div class="title_left">
            <h3>Mettre à jour la date d'assurance</h3>
            <h4><?php echo $vehicle['manufacturer_name']; ?><?php echo $vehicle['model_name']; ?><?php echo $vehicle['category']; ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>

    <hr>

    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div>
            <?php echo form_open_multipart('admin/vehicles/'.$vehicle['v_id'].'/insurance_date'); ?>
            <fieldset>

                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <label for="insurance_date">Date Assurance</label>
                        <input autocomplete="false" type="text" class="form-control datepicker"
                               value="<?php echo $vehicle['insurance_date'] ?>" name="insurance_date"
                               placeholder="Date Assurance">
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