<?= $this->extend('public/layout') ?>

<?= $this->section('content') ?>
    <div class="banner">
        <!-- 		<video width="100%" autoplay loop>
                    <source src="assets/motors-landing.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                </video> -->
        <div class="container">
            <!-- 		<script src="<?= base_url('public/assets/js/responsiveslides.min.js'); ?>"></script>
		<script>
		$(function () {
		$("#slider").responsiveSlides({
			auto: true,
			nav: true,
			speed: 500,
		namespace: "callbacks",
		pager: true,
		});
		});
		</script> -->
            <div id="top" class="callbacks_container">
                <ul class="rslides" id="slider">
                    <li>

                        <div class="banner-text">
                            <h3>Découvrez toutes nos gammes de voitures.</h3>
                        </div>

                    </li>
                    <li>

                        <div class="banner-text">
                            <h3>Profitez du weekend</h3>
                            <p>Louez une voiture citadine, berline ...</p>

                        </div>

                    </li>
                    <li>
                        <div class="banner-text">
                            <h3>Sed ut perspiciatis</h3>
                            <p>Lorem Ipsum is not simply random text. Contrary to popular belief, It has roots in a
                                piece of classical Latin literature from 45 BC.</p>

                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--content-->
    <div class="container">
        <div class="cont">
            <div class="content">
                <?php if (count($featured)): ?>
                    <div class="content-top-bottom">
                        <h2>En vedette</h2>
                        <?php foreach ($featured as $feature) : ?>
                            <div class="col-md-4 men">
                                <a href="<?php echo base_url('pages/show') . '/' . $feature->vehicle_id; ?> "
                                   class="b-link-stripe b-animate-go  thickbox">
                                    <img style="height: 260px;" class="img-responsive"
                                         src="<?= base_url('uploads'); ?>/<?php echo $feature->image; ?>" alt="">
                                    <div class="b-wrapper">
                                        <h3 class="b-animate b-from-top top-in   b-delay03 ">
                                            <span><?php echo $feature->model_name; ?></span>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                <?php endif ?>
                <div class="content-top">
                    <h1>NOUVEAUX</h1>

                    <div class="grid-in">
                        {vehicles}
                        <div class="col-md-3 grid-top simpleCart_shelfItem">
                            <a href="<?= base_url(); ?>pages/show/{vehicle_id}"
                               class="b-link-stripe b-animate-go  thickbox">
                                <img class="img-responsive" src="<?= base_url('uploads/'); ?>/{image}" alt="">
                                <div class="b-wrapper">
                                    <h3 class="b-animate b-from-left    b-delay03 ">
                                        <span>{model_name}</span>

                                    </h3>
                                </div>
                            </a>

                            <p><a href="single.html">{model_name}</a></p>
                        </div>
                        {/vehicles}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?= $this->endSection() ?>