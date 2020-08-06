<?php echo form_open_multipart('admin/manufacturers/updateManufacturer'); ?>
<input name="id" type="hidden" value="<?php echo $manufacturer['id'] ?>">
<fieldset>
    <div class="form-group">
        <label for="manufacturer_name"> Nom de la marque:</label>
        <input class="form-control" name="manufacturer_name" id="manufacturer_name" type="text"
               value="<?php echo $manufacturer['manufacturer_name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="manufacturer_logo">Logo</label>
        <input type="file" class="form-control" name="manufacturer_logo" id="manufacturer_logo">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Enregistrer">
    </div>
</fieldset>
</form>