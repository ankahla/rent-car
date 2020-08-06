<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-sm-6">
            <div class="page-header">
                <h3>Client : <?php echo $customer['cf_name']; ?> <?php echo $customer['cl_name']; ?> <a
                            href="<?php echo base_url('admin/customer/'.$customer['c_id'].'/edit'); ?>"
                            class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editer</a></h3>
            </div>

            <ul class="list-group">
                <li class="list-group-item"><b class="col-sm-3">Prénom
                        :</b><span>&nbsp;<?php echo $customer['cf_name']; ?></span></li>
                <li class="list-group-item"><b class="col-sm-3">Nom
                        :</b><span>&nbsp;<?php echo $customer['cl_name']; ?></span></li>
                <li class="list-group-item"><b class="col-sm-3">Mobile
                        :</b><span>&nbsp;<?php echo $customer['c_mobile']; ?></span></li>
                <li class="list-group-item"><b class="col-sm-3">N° cin/passport
                        :</b><span>&nbsp;<?php echo $customer['cin']; ?></span></li>
                <li class="list-group-item"><b class="col-sm-3">N° de permis
                        :</b><span>&nbsp;<?php echo $customer['drive_license_number']; ?></span></li>
                <li class="list-group-item"><b class="col-sm-3">Adresse email
                        :</b><span>&nbsp;<?php echo $customer['c_email']; ?></span></li>
                <li class="list-group-item"><b class="col-sm-3">Adresse :</b>
                    <p>&nbsp;<?php echo $customer['c_address']; ?></p></li>
            </ul>

        </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Cin</h3>
            </div>
            <div class="panel-body">
                <?php if ($customer['cin_file']): ?>
                    <img class="img-responsive img-thumbnail"
                         src="<?php echo base_url('uploads/' . $customer['cin_file']); ?>">
                <?php else: ?>
                    <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200"
                         style="width: 200px; height: 200px;"
                         src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNjNlMDY3N2E3YyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2M2UwNjc3YTdjIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9Ijc0LjA1NDY4NzUiIHk9IjEwNC41Ij4yMDB4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+"
                         data-holder-rendered="true">
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Permis de conduire</h3>
            </div>
            <div class="panel-body">
                <?php if ($customer['drive_license_file']): ?>
                    <img class="img-responsive img-thumbnail"
                         src="<?php echo base_url('uploads/' . $customer['drive_license_file']); ?>">
                <?php else: ?>
                    <img data-src="holder.js/200x200" class="img-thumbnail" alt="200x200"
                         style="width: 200px; height: 200px;"
                         src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzIwMHgyMDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNjNlMDY3N2E3YyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE2M2UwNjc3YTdjIj48cmVjdCB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9Ijc0LjA1NDY4NzUiIHk9IjEwNC41Ij4yMDB4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+"
                         data-holder-rendered="true">
                <?php endif; ?>
            </div>
        </div>
    </div>



<?php $this->endSection() ?>