<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="page-title">
    <div class="title_left">
        <h3>Clients</h3>
    </div>
</div>
<div class="clearfix"></div>
<hr>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nouveau client</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo form_open_multipart('admin/customer/add'); ?>
                <fieldset>
                    <div class="form-group">
                        Prénom : <input class="form-control" placeholder="Prénom" name="cf_name" type="text">
                    </div>
                    <div class="form-group">
                        Nom : <input class="form-control" placeholder="Nom" name="cl_name" type="text">
                    </div>
                    <div class="form-group">
                        Mobile : <input class="form-control" placeholder="Mobile" name="c_mobile" type="text">
                    </div>
                    <div class="form-group">
                        Email : <input class="form-control" placeholder="Email" name="c_email" type="text">
                    </div>
                    <div class="form-group">
                        N° de permis : <input class="form-control" name="drive_license_number" type="text"/>
                    </div>
                    <div class="form-group">
                        CIN / PASSPORT n° : <input class="form-control" placeholder="cin / passport" name="cin"
                                                   type="text">
                    </div>
                    <div class="form-group">
                        Address: <textarea rows="3" cols="10" class="form-control" name="c_address"></textarea>
                    </div>
                    <div class="form-group">
                        Cin (max 2mo) : <input class="form-control" placeholder="Cin" name="cin_file" type="file">
                    </div>
                    <div class="form-group">
                        Permis de conduire (max 2mo) : <input class="form-control" placeholder="Permis de conduire"
                                                              name="drive_license_file" type="file">
                    </div>
                    <br/>
                    <input type="submit" name="buttonSubmit" value="Comfirmer" class="btn btn-success"/>
                </fieldset>
                </form>
            </div> <!-- /content -->
        </div><!-- /x-panel -->
    </div> <!-- /col -->
</div> <!-- /row -->

<?= $this->endSection() ?>
