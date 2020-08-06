<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administration</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
</head>

<body>
    <div class="loginPage">    
        <header style="font-family: 'Helvetica Neue', Roboto, Arial, 'Droid Sans', sans-serif">
            <h2>RENT A CAR</h2>
        </header>
        <?= \Config\Services::validation()->listErrors('errors_list') ?>
        
        <?php echo form_open('login/checklogin'); ?>
            <input placeholder="Email" type="email" name="email">
            <input placeholder="Password" type="password" name="password">
            <section class="links">
                <button class="button"><span>LOGIN</span></button>
                <br><br>
            </section>
        </form>
    </div>
    <footer style="position: absolute; bottom: 0px">
        <center>
            <img src="<?php echo base_url('assets/images/logo.svg'); ?>" style="max-height: 100px;">
            <div>Copyright <?php echo date('Y'); ?></div>
        </center>
    </footer>
</body>
</html>