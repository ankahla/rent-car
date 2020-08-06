<?= $this->extend('public/layout') ?>
<?php
$url = base_url() . 'pages/show/' . $vehicle['v_id'];
$title = $vehicle['manufacturer_name'] . ' ' . $vehicle['model_name'] . ' ' . $vehicle['category'];
$img = base_url() . 'uploads/' . $vehicle['image'];
$metaTags = [
    ['property' => 'og:url', 'content' => $url],
    ['property' => 'og:type', 'content' => 'article'],
    ['property' => 'og:title', 'content' => $title],
    ['property' => 'og:image', 'content' => $img],
];
?>
<?= $this->section('metatags') ?>

<?php if (isset($metaTags)): ?>
    <?php foreach ($metaTags as $tag): ?>
        <meta property="<?php echo $tag['property'] ?>" content="<?php echo $tag['content'] ?>">
    <?php endforeach ?>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <!-- grow -->
    <div class="grow">
        <div class="container">
            <h2><?php echo $vehicle['model_name'] ?></h2>
        </div>
    </div>
    <!-- grow -->
    <div class="product">
        <div class="container">
            <div class="product-price1">
                <div class="top-sing">
                    <div class="col-md-7 single-top">
                        <div class="flexslider">
                            <ul class="slides list-unstyled">
                                <li data-thumb="images/si.jpg">
                                    <div class="thumb-image"><img
                                                src="<?= base_url(); ?>/uploads/<?php echo $vehicle['image'] ?>"
                                                data-imagezoom="true" class="img-responsive"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <!-- slide -->
                    </div>
                    <div class="col-md-5 single-top-in simpleCart_shelfItem">
                        <div class="single-para ">
                            <h4><?php echo $vehicle['model_name'] ?></h4>
                            <hr>
                            <!-- <p>{model_description}</p> -->
                            <p>Marque: <span><?php echo $vehicle['manufacturer_name'] ?></span></p>
                            <p>Catégorie: <span><?php echo $vehicle['category'] ?></span></p>
                            <br><br>
                            <h4>Partager</h4>
                            <hr>
                            <div id="share-buttons">
                                <!-- Facebook -->
                                <a href="http://www.facebook.com/sharer.php?u=<?= $url ?>" target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/facebook.png"
                                         alt="Facebook"/>
                                </a>
                                <span>&nbsp;</span>
                                <!-- Pinterest -->
                                <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','https://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                                    <img src="https://simplesharebuttons.com/images/somacro/pinterest.png"
                                         alt="Pinterest"/>
                                </a>
                                <span>&nbsp;</span>
                                <!-- Reddit -->
                                <a href="http://reddit.com/submit?url=<?= $url ?>title={manufacturer_name} {model_name} {category}"
                                   target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit"/>
                                </a>
                                <span>&nbsp;</span>
                                <!-- Tumblr-->
                                <a href="http://www.tumblr.com/share/link?url=<?= $url ?>&amp;title=<?= $title ?>"
                                   target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr"/>
                                </a>
                                <span>&nbsp;</span>
                                <!-- Twitter -->
                                <a href="https://twitter.com/share?url=<?= $url ?>&amp;text=<?= $title ?>&amp;hashtags=mahdiarentcar"
                                   target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter"/>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- rent-car -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-6055501393456016"
                             data-ad-slot="8724182262"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="available">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?= $this->endSection() ?>