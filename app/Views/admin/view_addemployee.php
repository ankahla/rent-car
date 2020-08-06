<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="page-title">
    <div class="title_left">
        <h3>All Employees</h3>
    </div>
</div>
<div class="clearfix"></div>
<hr>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add a new Employee</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="post">
                    <fieldset>
                        <div class="form-group">
                            Email : <input class="form-control" placeholder="E-mail" name="email" id="username"
                                           type="email"><span id="user-availability-status"></span>
                        </div>
                        <div class="form-group">
                            Password : <input class="form-control" placeholder="Password" name="password"
                                              type="password">
                        </div>
                        <div class="form-group">
                            First Name : <input class="form-control" placeholder="First Name" name="first_name"
                                                type="text">
                        </div>
                        <div class="form-group">
                            Last Name : <input class="form-control" placeholder="Last Name" name="last_name"
                                               type="text">
                        </div>
                        <div class="form-group">
                            Mobile : <input class="form-control" placeholder="Mobile" name="mobile" type="number">
                        </div>
                        <div class="form-group">
                            Position : <input class="form-control" placeholder="Position" name="position" type="text">
                        </div>
                        <div class="form-group">
                            Gender : <input type="radio" name="gender" value="male"> Male
                            <input type="radio" name="gender" value="female"> Female
                        </div>
                        <div class="form-group">
                            Date of Birth:<input type="date" name="birthday">
                        </div>
                        <div class="form-group">
                            Address: <textarea rows="3" cols="10" class="form-control" name="address"></textarea>
                        </div>
                        <div class="form-group">
                            User Type:
                            <input type="radio" name="type" value="admin"> Admin
                            <input type="radio" name="type" value="employee"> Employee
                        </div>
                        <br/>
                        <input type="submit" name="buttonSubmit" value="Comfirm" class="btn btn-success"/>
                    </fieldset>
                </form>
            </div> <!-- /content -->
        </div><!-- /x-panel -->
    </div> <!-- /col -->
</div> <!-- /row -->

<?= $this->endSection() ?>

