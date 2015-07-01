<div id="slide">
    <link rel="stylesheet" href="<?php echo DOMAIN ?>files/lishowslider/css/nivo-slider.css" type="text/css" media="screen" />
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php $slideshow = $this->requestAction("Comment/slideshow");
                    foreach($slideshow as $slideshows){?>
                <a href="<?php echo $slideshows['Slideshow']['link'] ?>"><img style=" height: 350px !important;"src="<?php echo DOMAINIMG.$slideshows['Slideshow']['images'] ?>" data-thumb="<?php echo DOMAINIMG.$slideshows['Slideshow']['images'] ?>" alt="" title="<?php echo DOMAINIMG.$slideshows['Slideshow']['name'] ?>" /></a>
                <?php } ?>
            </div>
        </div>
    <script type="text/javascript" src="<?php echo DOMAIN ?>files/lishowslider/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
    </script>
</div>