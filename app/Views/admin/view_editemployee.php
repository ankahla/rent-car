<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Employee</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Employee</h2>
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
                                    First Name : <input class="form-control" placeholder="First Name" name="name" type="text" value="<?php echo $userRow->first_name; ?>" required>
                                </div>
                                <div class="form-group">
                                    Last Name : <input class="form-control" placeholder="Last Name" name="name" type="text" value="<?php echo $userRow->last_name; ?>" required>
                                </div>
                                <div class="form-group">
                                    Mobile : <input class="form-control" placeholder="Mobile" name="mobile" type="text" value="<?php echo $userRow->mobile; ?>" required>
                                </div>
                                <div class="form-group">
                                    Position : <input class="form-control" placeholder="Position" name="position" type="text" value="<?php echo $userRow->position; ?>" required>
                                </div>
                                <div class="form-group">
                                    Password : <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div class="form-group">
                                    Gender : <?php
                                    if(strcmp("male", $userRow->gender) == 0)
                                        echo '<input type="radio" name="gender" value="male" checked> Male';
                                    else
                                        echo '<input type="radio" name="gender" value="male"> Male';
                                    if(strcmp("female",$userRow->gender) == 0)
                                        echo ' &nbsp<input type="radio" name="gender" value="female" checked> Female';
                                    else
                                        echo '&nbsp <input type="radio" name="gender" value="female"> Female';
                                    ?>
                                </div>

                                <div class="form-group">
                                    Date of Birth:<input type="date"  value="<?php echo $userRow->birthday; ?>" name="bday">
                                </div>
                                
                                <div class="form-group">
                                    Address: <textarea rows="3" cols="10" class="form-control"  name="address"><?php echo $userRow->address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <?php if('admin' === \Config\Services::session()->get('type')): ?>
                                        User Type
                                    <input type="radio" name="type" value="admin" <?php if ('admin' === $userRow->type): ?>checked<?php endif; ?>> Admin
                                    &nbsp;
                                    <input type="radio" name="type" value="employee" <?php if ('employee' === $userRow->type): ?>checked<?php endif; ?>> Employee

                                    <?php endif; ?>
                                </div>
                                <br/>
                                <input type="submit" name="buttonSubmit" value="Save" />
                                <input type="hidden" name="id" value="<?php echo $userRow->id ?>">
                            </fieldset>
                        </form>
                    </div> <!-- /content --> 
                </div><!-- /x-panel --> 
            </div> <!-- /col --> 
        </div> <!-- /row --> 
    </div>

<?= $this->endSection() ?>
