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
                <h2>Editer les informations sur le client</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php echo form_open_multipart('admin/customer/'.$customer['c_id'].'/edit'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <div class="form-group">
                                Prénom : <input class="form-control" placeholder="Prénom" name="cf_name" type="text"
                                                value="<?php echo $customer['cf_name']; ?>">
                            </div>
                            <div class="form-group">
                                Nom : <input class="form-control" placeholder="Nom" name="cl_name" type="text"
                                             value="<?php echo $customer['cl_name']; ?>">
                            </div>
                            <div class="form-group">
                                Mobile : <input class="form-control" placeholder="Mobile" name="c_mobile" type="text"
                                                value="<?php echo $customer['c_mobile']; ?>">
                            </div>
                            <div class="form-group">
                                CIN / PASSPORT n°: <input class="form-control" placeholder="cin / passport" name="cin"
                                                          type="text" value="<?php echo $customer['cin']; ?>">
                            </div>
                            <div class="form-group">
                                Adresse: <textarea rows="3" cols="10" class="form-control"
                                                   name="c_address"><?php echo $customer['c_address']; ?></textarea>
                            </div>

                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <div class="form-group">
                                Email : <input class="form-control" placeholder="E-mail" name="c_email" id="username"
                                               type="email" value="<?php echo $customer['c_email']; ?>"><span
                                        id="user-availability-status"></span>
                            </div>
                            <div class="form-group">
                                Cin (max 2Mo) : <input class="form-control" placeholder="Cin" name="cin_file"
                                                       type="file">
                            </div>
                            <div class="form-group">
                                Numero de permis : <input class="form-control"
                                                          placeholder="Numero de permis de conduire"
                                                          name="drive_license_number" type="text"
                                                          value="<?php echo $customer['drive_license_number']; ?>">
                            </div>
                            <div class="form-group">
                                Permis de conduire (max 2Mo) : <input class="form-control"
                                                                      placeholder="Permis de conduire"
                                                                      name="drive_license_file" type="file">
                            </div>
                        </fieldset>
                    </div>
                </div>
                <br/>
                <input type="hidden" name="c_id" value="<?php echo $customer['c_id']; ?>"/>
                <input type="submit" name="buttonSubmit" value="Comfirmer" class="btn btn-success"/>

                </form>
            </div> <!-- /content -->
        </div><!-- /x-panel -->
    </div> <!-- /col -->
</div> <!-- /row -->

<?= $this->endSection() ?>
