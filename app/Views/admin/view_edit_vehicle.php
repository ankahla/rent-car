<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-title">
    <div class="title_left">
        <h3>Mettre à jour le véhicule #<?php echo $vehicle->vehicle_id ?></h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php echo form_open_multipart(base_url('admin/vehicles/'.$vehicle->vehicle_id.'/edit')); ?>
        <input type="hidden" name="id" value="<?php echo $vehicle->vehicle_id ?>"/>
        <fieldset>
            <div class="row">
                <div class="col-xs-6">
                    <label>Marque</label>
                    <select class="form-control" name="manufacturer_id" id="parent_cat">
                        <?php foreach ($manufacturers as $manufacturer): ?>
                            <option
                                <?php if ($vehicle->manufacturer_id == $manufacturer['id']): ?>selected<?php endif; ?>
                                value="<?php echo $manufacturer['id']; ?>"><?php echo $manufacturer['manufacturer_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <label>Modèle</label>
                    <select class="form-control" name="model_id">
                        <?php foreach ($models as $model): ?>
                            <option <?php if ($vehicle->model_id == $model['id']): ?>selected<?php endif; ?>
                                    value="<?php echo $model['id']; ?>"><?php echo $model['model_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-xs-6">
                    <label>Category</label>
                    <select class="form-control" name="category">
                        <?php foreach ($categories as $category): ?>
                            <option <?php if ($vehicle->category == $category['name']): ?>selected<?php endif; ?>
                                    value="<?php echo $category['name'] ?>"><?php echo $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <label for="gear">Transmission:</label>
                    <select name="gear" id="gear" class="form-control">
                        <option <?php if ($vehicle->gear == 'auto'): ?>selected<?php endif; ?> value="auto">Auto
                        </option>
                        <option <?php if ($vehicle->gear == 'manual'): ?>selected<?php endif; ?> value="manual">
                            Manuelle
                        </option>
                    </select>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-6">
                    <label for="seats">Nombre de places:</label>
                    <input type="number" class="form-control" name="seats" placeholder="Nombre de places"
                           value="<?php echo $vehicle->seats ?>" required>
                </div>
                <div class="col-xs-6">
                    <label for="mileage">Kilométrage:</label>
                    <input type="text" step="any" class="form-control" name="mileage" placeholder="Kilométrage(km)"
                           value="<?php echo $vehicle->mileage ?>" required>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-6">
                    <label for="e_no">Immatriculation:</label>
                    <input class="form-control" name="e_no" placeholder="Immatriculation"
                           value="<?php echo $vehicle->engine_no ?>" required/>
                </div>
                <div class="col-xs-6">
                    <label for="c_no">Carte grise:</label>
                    <input class="form-control" name="c_no" placeholder="Carte grise"
                           value="<?php echo $vehicle->chesis_no ?>"/>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-6">
                    <label for="insurance_id">Assurance info</label>
                    <input type="text" class="form-control" name="insurance_id" placeholder="Assurance info"
                           title="Doit être un numéro" value="<?php echo $vehicle->insurance_id ?>">
                </div>
                <div class="col-xs-6">
                    <label for="insurer">Assureur</label>
                    <input type="text" class="form-control" name="insurer" placeholder="Assureur"
                           value="<?php echo $vehicle->insurer ?>"/>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xs-6">
                    <label for="insurance_date">Date Assurance</label>
                    <input type="text" class="form-control datepicker" name="insurance_date"
                           placeholder="Date Assurance" value="<?php echo $vehicle->insurance_date ?>"/>
                </div>
                <div class="col-xs-6">
                    <label for="v_color">Couleur</label>
                    <input type="text" class="form-control" name="v_color" placeholder="Couleur"
                           value="<?php echo $vehicle->color ?>" required/>
                </div>
            </div>
            <br>

            <div class="row">

                <div class="col-xs-6">
                    <label for="tank">Capacité du réservoir</label>
                    <input type="number" step="any" class="form-control" name="tank"
                           placeholder="Capacité du réservoir (litres)" value="<?php echo $vehicle->tank ?>" required/>
                </div>
                <div class="col-xs-6">
                    <label for="gear">Mettre en vedette ? (Afficher sur le site ?)</label>
                    <select name="featured" id="featured" class="form-control">
                        <option <?php if (!$vehicle->featured): ?>selected<?php endif; ?> value="0">Non</option>
                        <option <?php if ($vehicle->featured): ?>selected<?php endif; ?> value="1">Oui</option>
                    </select>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xs-6">
                    <label for="image">Image du véhicule</label>
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xs-6">
                    <label for="image">Image chassis face</label>
                    <input type="file" class="form-control" name="front_frame_image">
                </div>
                <div class="col-xs-6">
                    <label for="image">Image chassis arrière</label>
                    <input type="file" class="form-control" name="back_frame_image">
                </div>
            </div>
            <br>
            <br>
            <input class="btn btn-primary col-sm-6 col-md-offset-3" type="submit" name="buttonSubmit"
                   value="Mettre à jour"/>

        </fieldset>
        </form>

    </div>
</div> <!-- /row -->
<div class="clearfix"></div>
<br>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('input.datepicker').datepicker({
            format: 'dd/mm/yyyy',
        })
    });
</script>

<?= $this->endSection() ?>
