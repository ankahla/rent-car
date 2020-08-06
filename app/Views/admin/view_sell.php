<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<!-- page content -->
<div class="page-title">
    <div class="title_left">
        <h3>Clients</h3>
    </div>
</div>
<div class="clearfix"></div>
<hr>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height: auto;">
            <div class="x_title collapse-link" style="cursor: pointer">
                <h2>Sélectionner un client existant</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none;">

                <form method="post">
                    <fieldset>
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Client</h5>
                                <select class="form-control" name="c_id" required>
                                    <option>Selectionnez</option>
                                    <?php foreach ($customers as $customer): ?>
                                        <option value="<?php echo $customer['c_id'] ?>"><?php echo $customer['cf_name'] ?> <?php echo $customer['cl_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Tarif par jour</h5>
                                <input class="form-control" name="s_price" value="<?php echo set_value('s_price'); ?>"
                                       placeholder="Tarif par jour">
                            </div>
                            <div class="col-xs-6">
                                <h5>Méthodes de paiement</h5>
                                <select class="form-control" name="payment_type" required>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Virement">Virement</option>
                                    <option value="Visa/Master Card">Visa/Master Card</option>
                                    <option value="Wire Transfer">Wire Transfer</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-xs-6">
                                Date de début:
                                <input type="text" class="dateRangePicker form-control" name="w_start"
                                       value="<?php echo date("d/m/Y"); ?>">
                            </div>
                            <div class="col-xs-6">
                                Date de fin:
                                <input type="text" class="dateRangePicker form-control" name="w_end">
                            </div>
                        </div>
                        <br/><br/>
                        <input type="hidden" name="v_id" value="<?php if (isset($cid)) {
                            echo $cid;
                        } ?> <?php echo set_value('v_id'); ?>">
                        <input type="submit" name="buttonSubmitExist" value="Confirmer réservation"
                               class="btn btn-success"/>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <br>
    <center>OU</center>
    <br>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height: auto;">
            <div class="x_title collapse-link" style="cursor: pointer">
                <h2>Créer un nouveau client</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none;">
                <form method="post">
                    <fieldset>
                        <div class="row">
                            <div class="col-xs-6">
                                <input name="cf_name" type="text" value="<?php echo set_value('cf_name'); ?>"
                                       class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col-xs-6">
                                <input name="cl_name" type="text" value="<?php echo set_value('cl_name'); ?>"
                                       class="form-control" placeholder="Nom">
                            </div>
                        </div>
                        <br>

                        <!--                                 <div class="row">
                                
                                    <div class="col-xs-6">
                                        <input name="c_email" class="form-control" value="<?php echo set_value('c_email'); ?>"  placeholder="Email" >
                                    </div>
                                </div> -->
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Téléphone mobile</h5>
                                <input type="text" class="form-control" name="c_mobile"
                                       value="<?php echo set_value('c_mobile'); ?>" placeholder="Téléphone mobile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Tarif par jour</h5>
                                <input class="form-control" name="s_price" value="<?php echo set_value('s_price'); ?>"
                                       placeholder="Tarif par jour">
                            </div>
                            <div class="col-xs-6">
                                <h5>Méthodes de paiement</h5>
                                <select class="form-control" name="payment_type" required>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Virement">Virement</option>
                                    <option value="Visa/Master Card">Visa/Master Card</option>
                                    <option value="Wire Transfer">Wire Transfer</option>
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-xs-6">
                                Date de début:
                                <input type="text" class="dateRangePicker form-control" name="w_start"
                                       value="<?php echo date("d/m/Y"); ?>">
                            </div>
                            <div class="col-xs-6">
                                Date de fin:
                                <input type="text" class="dateRangePicker form-control" name="w_end">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <!--                                     <div class="col-xs-12">
                                                                    <input type="text" class="form-control" name="c_pass" value="Deafult Password : 1234" disabled>
                                                                </div> -->
                        </div>
                        <br/><br/>
                        <input type="hidden" name="v_id" value="<?php if (isset($cid)) {
                            echo $cid;
                        } ?> <?php echo set_value('v_id'); ?>">
                        <input type="submit" name="buttonSubmits" value="Confirmer location" class="btn btn-success"/>

                    </fieldset>
                </form>
                <br/>

            </div> <!-- /content -->
        </div><!-- /x-panel -->
    </div> <!-- /col -->
</div> <!-- /row -->


<?= $this->endSection() ?>
