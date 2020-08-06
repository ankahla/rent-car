<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

        <div class="page-title">
            <div class="title_left">
                <h3>Modèles</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <hr>

        <!-- add new model -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".model-form">Ajouter nouveau</button>

        <div class="modal fade model-form" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridSystemModalLabel">Ajouter/Editer Modèle</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('admin/car_model/addEditModel'); ?>
                        <input type="hidden" name="id">
                        <fieldset>
                            <div class="form-group">
                                <label for="model_name">Nom du modèle:</label>
                                <input type="text" class="form-control" name="model_name">
                            </div>
                            <div class="form-group">
                             <label for="manufacturer_id"> Marque:</label>
                             <select name="manufacturer_id" id="manufacturer_id" class="form-control">
                                 <?php foreach ($manufacturers as $manufacturer): ?>
                                <option value="<?php echo $manufacturer['id'] ?>" ><?php echo $manufacturer['manufacturer_name'] ?></option>
                                 <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="model_description">Description:</label>
                            <textarea name="model_description" id="model_description"  rows="10" class="form-control summernote"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="buttonSubmit" value="Enregistrer">
                        </div>
                    </fieldset>         
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- /add-new-model --> 

<!-- all models --> 
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Tous les modèles</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Modèle</th>
                            <th>Marque</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($models as $model): ?>
                        <tr>
                            <td><?php echo $model['model_name'] ?></td>
                            <td><?php echo $model['manufacturer_name'] ?></td>
                            <td><?php echo $model['model_description'] ?></td>

                            <td>
                                <ul class="list-inline">
                                  <!--  <li><a href="#" class="btn btn-primary btn-xs">Edit</a></li>  -->
                                  <li><a href="<?= base_url('admin/car_model/'.$model['id'].'/deleteModel'); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Ête vous sûre de vouloir supprimer ?')">Supprimer</a></li>
                                  <li>
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".model-form" onclick="fillEditForm('<?php echo $model['id'] ?>','<?php echo $model['manufacturer_id'] ?>','<?php echo $model['model_name'] ?>','<?php echo $model['model_description'] ?>')">Editer</button>
                                </li>
                            </ul>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- /content --> 
    </div><!-- /x-panel --> 
</div> <!-- /col -->
</div> <!-- /row --> 

<script type="text/javascript">
    $('.modal.model-form').on('hidden.bs.modal', function (e) {
        $('.modal.model-form form')[0].reset()
    });

    function fillEditForm(id, manufacturer, modelName, description)
    {
        var form = $('.modal.model-form form')[0];
        form.id.value = id;
        form.manufacturer_id.value = manufacturer;
        form.model_name.value = modelName;
        form.model_description.value = description;
    }
</script>
<?= $this->endSection() ?>