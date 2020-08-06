<!DOCTYPE html>
<html>
<head>
    <title>RENT A CAR</title>
    <link href="<?= base_url('assets/css/bootstrap.css'); ?> " rel="stylesheet"
          type="text/css" media="all"/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <?= $this->renderSection('metatags') ?>

    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--fonts-->
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet'
          type='text/css'><!--//fonts-->
    <!-- start menu -->
    <link href="<?= base_url('assets/css/memenu.css'); ?>" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="<?= base_url('assets/js/memenu.js'); ?>"></script>
    <script>$(document).ready(function () {
            $(".memenu").memenu();
        });</script>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-6055501393456016",
            enable_page_level_ads: true
        });
    </script>

</head>
<body>
<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="social">
                <ul>
                    <li><a href="https://www.facebook.com/MAHDIA.RENT.A.CAR.OFFICIEL/"><i class="facebok"> </i></a></li>
                    <!-- <li><a href="#"><i class="twiter"> </i></a></li>-->
                    <li><a href="https://www.instagram.com/makrammahdia/"><i class="goog"> </i></a></li>
                    <li><a href="#"><i class="inst"> </i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="header-left">


                <!-- search-scripts -->
                <script src="<?= base_url('assets/js/classie.js'); ?>"></script>
                <!-- 					<script src="<?= base_url('assets/js/uisearch.js'); ?>"></script>
						<script>
							new UISearch( document.getElementById( 'sb-search' ) );
						</script> -->
                <!-- //search-scripts -->


                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="head-top">
            <div class="logo">
                <h1><a href="<?= base_url(); ?>">RENT A CAR</a></h1>
            </div>
            <div class=" h_menu4">
                <ul class="memenu skyblue">
                    <li><a class="color8" href="<?php echo base_url('/'); ?>">ACCUEIL</a></li>
                    <li><a class="color4" href="<?php echo base_url('login'); ?>">ADMINISTRATION</a></li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?= $this->renderSection('content') ?>

<div class="footer w3layouts">
    <div class="container">
        <div class="footer-top-at w3">

            <div class="col-md-2">
                <!-- 				<h4>MORE INFO</h4>
                                <ul class="nav-bottom">
                                    <li><a href="#">How to order</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="contact.html">Location</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Membership</a></li>
                                </ul> -->
                <img src="<?= base_url('assets/images/logo.jpg'); ?>" style="max-width: 100%;">
            </div>
            <div class="col-md-3 amet-sed w3ls">
                <!-- <h4>CATEGORIES</h4>
                <ul class="nav-bottom">
                    <li><a href="#">Bed linen</a></li>
                    <li><a href="#">Cushions</a></li>
                    <li><a href="#">Duvets</a></li>
                    <li><a href="#">Pillows</a></li>
                    <li><a href="#">Protectors</a></li>
                </ul> -->
                <h4>Adresse</h4>
                <p>Appatement n h 5 - 1 résidence emroude</p>
                <p>Aouina la marsa 2046 tunis</p>
            </div>

            <div class="col-md-3 amet-sed agileits-w3layouts">
                <h4>Adresse mahdia</h4>
                <p>Complexe mahdia centre route de la corniche 5100</p>
            </div>

            <div class="col-md-3 amet-sed agileits-w3layouts">
                <h4>Contact</h4>
                <p>Mobile : 26 041407 - 99 408394 <br> 29 063407 - 98 777570</p>
                <p>Email : mahdiarentcar@gmail.com</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer-class w3-agile">
        <p>© <?php echo date('Y'); ?>. Tous les droits sont réservés</p>
    </div>
</div>

</body>
</html>