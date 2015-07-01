<style type="text/css" media="screen">
#slider {
    width: 754px; /* important to be same as image width */
    height: 320px !important; /* important to be same as image height */
    position: relative; /* important */
    overflow: hidden; /* important */
}

#sliderContent {
    width: 754px; /* important to be same as image width or wider */
    position: absolute;
    top: 0;
    margin-left: 0;
}
#sliderContent img{
    width: 754px; /* important to be same as image width */
    height: 320px !important; /* important to be same as image height */
}
.sliderImage {
    float: left;
    position: relative;
    display: none;
}
.sliderImage span {
    position: absolute;
    font: 10px/15px Arial, Helvetica, sans-serif;
    padding: 10px 13px;
    width: 760px;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
    -khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
}
.sliderImage span strong {
    font-size: 14px;
}
.top {
    top: 0;
    left: 0;
}
.bottom {
    bottom: 0;
    left: 0;
}
.slider-wrapper img {height: 320px !important; width: 754px !important; }
</style>

          <?php
           $slideshow = $this->requestAction('/plugin/slideshow');
           $default = array(
                'width'=>'754px',
                'height'=>'320px',
                'class' => 'slider-wrapper',
            );
            echo $this->Help->nivo_slides($slideshow, $default);
          ?>
					  

