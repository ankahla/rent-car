<?php echo form_open_multipart('admin/vehicles/add'); ?>
<fieldset>
    <div class="row">
        <div class="col-xs-6">
            <label>Marque</label>
            <select class="form-control" name="manufacturer_id" id="parent_cat">
                <?php foreach($manufacturers as $manufacturer): ?>
                <option value="<?php echo $manufacturer['id'] ?>"><?php echo $manufacturer['manufacturer_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-xs-6">
            <label>Modèle</label>
            <select class="form-control" name="model_id">
                <?php foreach($models as $model): ?>
                <option value="<?php echo $model['id'] ?>"><?php echo $model['model_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-xs-6">
            <label>Category</label>
            <select class="form-control" name="category">
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['name'] ?>"><?php echo $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-xs-6">
            <label for="gear">Transmission:</label>
            <select name="gear" id="gear" class="form-control">
                <option value="auto">Auto</option>
                <option value="manual">Manuelle</option>
            </select>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-xs-6">
            <label for="seats">Nombre de places:</label>
            <input type="number" class="form-control" name="seats" placeholder="Nombre de places" required>
        </div>
        <div class="col-xs-6">
            <label for="mileage">Kilométrage:</label>
            <input type="text" step="any" class="form-control" name="mileage" placeholder="Kilométrage(km)" required>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-xs-6">
            <label for="e_no">Immatriculation:</label>
            <input class="form-control" name="e_no" placeholder="Immatriculation" required>
        </div>
        <div class="col-xs-6">
            <label for="c_no">Carte grise:</label>
            <input class="form-control" name="c_no" placeholder="Carte grise"/>
        </div>
    </div>

    <br>

    <div class="row">
        <input type="hidden" class="form-control" name="add_date" value="<?php echo date("Y-m-d"); ?>">
    </div>

    <div class="row">
        <div class="col-xs-6">
            <label for="insurance_id">Assurance info</label>
            <input type="text" class="form-control" name="insurance_id" placeholder="Assurance info"
                   title="Doit être un numéro">
        </div>
        <div class="col-xs-6">
            <label for="insurer">Assureur</label>
            <input type="text" class="form-control" name="insurer" placeholder="Assureur">
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-6">
            <label for="insurance_date">Date Assurance</label>
            <input type="text" class="form-control datepicker" name="insurance_date" placeholder="Date Assurance">
        </div>
        <div class="col-xs-6">
            <label for="v_color">Couleur</label>
            <input type="text" class="form-control" name="v_color" placeholder="Couleur" required>
        </div>
    </div>
    <br>

    <div class="row">

        <div class="col-xs-6">
            <label for="tank">Capacité du réservoir</label>
            <input type="number" step="any" class="form-control" name="tank"
                   placeholder="Capacité du réservoir (litres)" required>
        </div>
        <div class="col-xs-6">
            <label for="insurance_date">Date dernier contrôle</label>
            <input type="text" class="form-control datepicker" name="last_control_at"
                   placeholder="Date dernier contrôle">
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-xs-6">
            <label for="image">Image du véhicule</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="col-xs-6">
            <label for="gear">Mettre en vedette ? (Afficher sur le site ?)</label>
            <select name="featured" id="featured" class="form-control">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
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
    <input class="btn btn-primary" type="submit" name="buttonSubmit" value="Ajouter"/>

</fieldset>
<?php echo form_close(); ?>
